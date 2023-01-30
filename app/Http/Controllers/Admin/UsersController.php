<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Cookie;
use Session;
use Redirect;
use Input;
use Validator;
use DB;
use IsAdmin;
use App\Models\User;
use App\Models\Country;
use Mail;
use App\Mail\SendMailable;

class UsersController extends Controller {    
    public function __construct() {
        $this->middleware('is_adminlogin');
    }
    
    public function index(Request $request){
        $pageTitle = 'Manage Users'; 
        $activetab = 'actusers';
        $query = new User();
        $query = $query->sortable();
        
        if ($request->has('chkRecordId') && $request->has('action')) {
            $idList = $request->get('chkRecordId');
            $action = $request->get('action');
            if ($action == "Activate") {
                User::whereIn('id', $idList)->update(array('status' => 1, 'activation_status' => 1));
                Session::flash('success_message', "Records are activated successfully.");
            } else if ($action == "Deactivate") {
                User::whereIn('id', $idList)->update(array('status' => 0));
                Session::flash('success_message', "Records are deactivated successfully.");
            } else if ($action == "Delete") {
                User::whereIn('id', $idList)->delete();
                Session::flash('success_message', "Records are deleted successfully.");
            } 
        }
        
        if ($request->has('keyword')) {
            $keyword = $request->get('keyword');
            $query = $query->where(function($q) use ($keyword){
                $q->where('first_name', 'like', '%'.$keyword.'%')
                ->orWhere('last_name', 'like', '%'.$keyword.'%')
                ->orWhere('email_address', 'like', '%'.$keyword.'%');
            });
        }
        
        $users = $query->orderBy('id','DESC')->paginate(20);
        if($request->ajax()){
            return view('elements.admin.users.index', ['allrecords'=>$users]);
        }
        return view('admin.users.index', ['title'=>$pageTitle, $activetab=>1,'allrecords'=>$users]);
    }

    public function add(){
        $pageTitle = 'Add User'; 
        $activetab = 'actusers';
        
        $countrList = Country::getCountryList();
        $input = Input::all();
        if (!empty($input)) {
            $rules = array(
                'first_name' => 'required|max:20',
                'last_name' => 'required|max:30',
                'contact' => 'required|min:8',
                'country_id' => 'required',
                'address' => 'required',
                'email_address' => 'required|email|unique:users',
                'password' => 'required|min:8',
                'confirm_password' => 'required|same:password',
                'profile_image' => 'required|mimes:jpeg,png,jpg',
            );
            $customMessages = [
                'contact.required' => 'The contact number field is required field.',
                'country_id.required' => 'The country name field is required field.'
            ]; 
            $validator = Validator::make($input, $rules, $customMessages);             
            if ($validator->fails()) {
                return Redirect::to('/admin/users/add')->withErrors($validator)->withInput();
            } else {
                if (Input::hasFile('profile_image')) {
                    $file = Input::file('profile_image');
                    $uploadedFileName = $this->uploadImage($file, PROFILE_FULL_UPLOAD_PATH);
                    $this->resizeImage($uploadedFileName, PROFILE_FULL_UPLOAD_PATH, PROFILE_SMALL_UPLOAD_PATH, PROFILE_MW, PROFILE_MH);
                    $input['profile_image'] = $uploadedFileName;
                }else{
                    unset($input['profile_image']);
                }                
                $serialisedData = $this->serialiseFormData($input);
                $serialisedData['slug'] = $this->createSlug($input['first_name'].' '.$input['last_name'], 'users');
                $serialisedData['status'] =  1;
                $serialisedData['activation_status'] =  1;
                $serialisedData['password'] =  $this->encpassword($input['password']);
                User::insert($serialisedData); 
                
                $name = $input['first_name'] . ' ' . $input['last_name'];
                $emailId = $input['email_address'];
                $new_password = $input['password'];
               
                $emailTemplate = DB::table('emailtemplates')->where('id', 2)->first();
                $toRepArray = array('[!email!]', '[!name!]', '[!username!]', '[!password!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
                $fromRepArray = array($emailId, $name, $name, $new_password, HTTP_PATH, SITE_TITLE);
                $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
                $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
                Mail::to($emailId)->send(new SendMailable($emailBody,$emailSubject));
                
                Session::flash('success_message', "User details saved successfully.");
                return Redirect::to('admin/users');
            }           
        }        
        return view('admin.users.add', ['title'=>$pageTitle, $activetab=>1, 'countrList'=>$countrList]);
    }
    
    public function edit($slug=null){
        $pageTitle = 'Edit User'; 
        $activetab = 'actusers';
        $countrList = Country::getCountryList();
        
        $recordInfo = User::where('slug', $slug)->first();
        if (empty($recordInfo)) {
            return Redirect::to('admin/users');
        }
        
        $input = Input::all();
        if (!empty($input)) {
            $rules = array(
                'first_name' => 'required|max:20',
                'last_name' => 'required|max:30',
                'contact' => 'required|min:8',
                'country_id' => 'required',
                'address' => 'required',
                'confirm_password' => 'same:password',
                'profile_image' => 'mimes:jpeg,png,jpg',
            );
            $customMessages = [
                'contact.required' => 'The contact number field is required field.',
                'country_id.required' => 'The country name field is required field.'
            ]; 
            $validator = Validator::make($input, $rules, $customMessages);             
            if ($validator->fails()) {
                return Redirect::to('/admin/users/edit/'.$slug)->withErrors($validator)->withInput();
            } else {
                if (Input::hasFile('profile_image')) { 
                    $file = Input::file('profile_image');
                    $uploadedFileName = $this->uploadImage($file, PROFILE_FULL_UPLOAD_PATH);
                    $this->resizeImage($uploadedFileName, PROFILE_FULL_UPLOAD_PATH, PROFILE_SMALL_UPLOAD_PATH, PROFILE_MW, PROFILE_MH);
                    $input['profile_image'] = $uploadedFileName;
                    @unlink(PROFILE_FULL_UPLOAD_PATH.$recordInfo->profile_image);
                    @unlink(PROFILE_SMALL_UPLOAD_PATH.$recordInfo->profile_image);
                }else{
                    unset($input['profile_image']);
                }
                if($input['password']){
                    $input['password'] =  $this->encpassword($input['password']);
                }else{
                    unset($input['password']);
                } 
                $serialisedData = $this->serialiseFormData($input, 1); //send 1 for edit
                User::where('id', $recordInfo->id)->update($serialisedData);
                Session::flash('success_message', "User details updated successfully.");
                return Redirect::to('admin/users');
            }           
        }        
        return view('admin.users.edit', ['title'=>$pageTitle, $activetab=>1, 'countrList'=>$countrList, 'recordInfo'=>$recordInfo]);
    }
    
    public function activate($slug=null){
        if($slug){
            User::where('slug', $slug)->update(array('status' => '1', 'activation_status' => '1'));
            return view('elements.admin.update_status', ['action'=>'admin/users/deactivate/' . $slug, 'status'=>1]);
        }
    }
    public function deactivate($slug=null){
        if($slug){
            User::where('slug', $slug)->update(array('status' => '0'));
            return view('elements.admin.update_status', ['action'=>'admin/users/activate/' . $slug, 'status'=>0]);
        }
    }
    
    public function delete($slug=null){
        if($slug){
            User::where('slug', $slug)->delete();
            Session::flash('success_message', "User details deleted successfully.");
            return Redirect::to('admin/users');
        }
    }  
    
    public function deleteimage($slug=null){
        if($slug){
            User::where('slug', $slug)->update(array('profile_image' => ''));
            Session::flash('success_message', "Image deleted successfully.");
            return Redirect::to('admin/users/edit/'.$slug);
        }
    }    
}
?>