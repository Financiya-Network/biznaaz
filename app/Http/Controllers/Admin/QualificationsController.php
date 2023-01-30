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
use App\Models\Qualification;
use Mail;
use App\Mail\SendMailable;

class QualificationsController extends Controller {    
    public function __construct() {
        $this->middleware('is_adminlogin');
    }
    
    public function index(Request $request){
        $pageTitle = 'Manage Qualifications'; 
        $activetab = 'actqualifications';
        $query = new Qualification();
        $query = $query->sortable();
        
        if ($request->has('chkRecordId') && $request->has('action')) {
            $idList = $request->get('chkRecordId');
            $action = $request->get('action');
            if ($action == "Activate") {
                Qualification::whereIn('id', $idList)->update(array('status' => 1));
                Session::flash('success_message', "Records are activated successfully.");
            } else if ($action == "Deactivate") {
                Qualification::whereIn('id', $idList)->update(array('status' => 0));
                Session::flash('success_message', "Records are deactivated successfully.");
            } else if ($action == "Delete") {
                Qualification::whereIn('id', $idList)->delete();
                Session::flash('success_message', "Records are deleted successfully.");
            } 
        }
        
        if ($request->has('keyword')) {
            $keyword = $request->get('keyword');
            $query = $query->where(function($q) use ($keyword){
                $q->where('name', 'like', '%'.$keyword.'%');
            });
        }
        
        $qualifications = $query->orderBy('id','DESC')->paginate(20);
        if($request->ajax()){
            return view('elements.admin.qualifications.index', ['allrecords'=>$qualifications]);
        }
        return view('admin.qualifications.index', ['title'=>$pageTitle, $activetab=>1,'allrecords'=>$qualifications]);
    }

    public function add(){
        $pageTitle = 'Add Qualification'; 
        $activetab = 'actqualifications';
        $input = Input::all();
        if (!empty($input)) {
            $rules = array(
                'name' => 'required|unique:qualifications',
            );
            $validator = Validator::make($input, $rules);             
            if ($validator->fails()) {
                return Redirect::to('/admin/qualifications/add')->withErrors($validator)->withInput();
            } else {
                $input['name'] = ucfirst($input['name']);
                $serialisedData = $this->serialiseFormData($input);
                $serialisedData['slug'] = $this->createSlug($input['name'], 'qualifications');
                $serialisedData['status'] =  1;
                Qualification::insert($serialisedData); 
                Session::flash('success_message', "Qualification saved successfully.");
                return Redirect::to('admin/qualifications');
            }           
        }        
        return view('admin.qualifications.add', ['title'=>$pageTitle, $activetab=>1]);
    }
    
    public function edit($slug=null){
        $pageTitle = 'Edit Qualification'; 
        $activetab = 'actqualifications';
        $recordInfo = Qualification::where('slug', $slug)->first();
        if (empty($recordInfo)) {
            return Redirect::to('admin/qualifications');
        }
        
        $input = Input::all();
        if (!empty($input)) {
            $rules = array(
                'name' => 'required|unique:qualifications,name,'.$recordInfo->id,
            );
            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                return Redirect::to('/admin/qualifications/edit/'.$slug)->withErrors($validator)->withInput();
            } else {
                $serialisedData = $this->serialiseFormData($input, 1); //send 1 for edit
                Qualification::where('id', $recordInfo->id)->update($serialisedData);
                Session::flash('success_message', "Qualification updated successfully.");
                return Redirect::to('admin/qualifications');
            }           
        }        
        return view('admin.qualifications.edit', ['title'=>$pageTitle, $activetab=>1, 'recordInfo'=>$recordInfo]);
    }
    
    public function activate($slug=null){
        if($slug){
            Qualification::where('slug', $slug)->update(array('status' => '1'));
            return view('elements.admin.update_status', ['action'=>'admin/qualifications/deactivate/' . $slug, 'status'=>1]);
        }
    }
    public function deactivate($slug=null){
        if($slug){
            Qualification::where('slug', $slug)->update(array('status' => '0'));
            return view('elements.admin.update_status', ['action'=>'admin/qualifications/activate/' . $slug, 'status'=>0]);
        }
    }
    
    public function delete($slug=null){
        if($slug){
            Qualification::where('slug', $slug)->delete();
            Session::flash('success_message', "Qualification deleted successfully.");
            return Redirect::to('admin/qualifications');
        }
    }    
}
?>