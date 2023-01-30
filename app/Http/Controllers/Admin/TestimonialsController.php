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
use App\Models\Testimonial;
use App\Models\Country;
use Mail;
use App\Mail\SendMailable;

class TestimonialsController extends Controller {    
    public function __construct() {
        $this->middleware('is_adminlogin');
    }
    
    public function index(Request $request){
        $pageTitle = 'Manage Testimonials'; 
        $activetab = 'acttestimonials';
        $query = new Testimonial();
        $query = $query->sortable();
        
        if ($request->has('chkRecordId') && $request->has('action')) {
            $idList = $request->get('chkRecordId');
            $action = $request->get('action');
            if ($action == "Activate") {
                Testimonial::whereIn('id', $idList)->update(array('status' => 1));
                Session::flash('success_message', "Records are activated successfully.");
            } else if ($action == "Deactivate") {
                Testimonial::whereIn('id', $idList)->update(array('status' => 0));
                Session::flash('success_message', "Records are deactivated successfully.");
            } else if ($action == "Delete") {
                Testimonial::whereIn('id', $idList)->delete();
                Session::flash('success_message', "Records are deleted successfully.");
            } 
        }
        
        if ($request->has('keyword')) {
            $keyword = $request->get('keyword');
            $query = $query->where(function($q) use ($keyword){
                $q->where('title', 'like', '%'.$keyword.'%')
                ->orWhere('client_name', 'like', '%'.$keyword.'%');
            });
        }
        
        $testimonials = $query->orderBy('id','DESC')->paginate(15);
        if($request->ajax()){
            return view('elements.admin.testimonials.index', ['allrecords'=>$testimonials]);
        }
        return view('admin.testimonials.index', ['title'=>$pageTitle, $activetab=>1,'allrecords'=>$testimonials]);
    }

    public function add(){
        $pageTitle = 'Add Testimonial'; 
        $activetab = 'acttestimonials';
        
        $input = Input::all();
        if (!empty($input)) {
            $rules = array(
                'title' => 'required|max:100',
                'client_name' => 'required|max:30',
                'country' => 'required',
                'description' => 'required',
                'image' => 'required|mimes:jpeg,png,jpg|max:'.MAX_IMAGE_UPLOAD_SIZE_VAL,
            );

            $validator = Validator::make($input, $rules);             
            if ($validator->fails()) {
                return Redirect::to('/admin/testimonials/add')->withErrors($validator)->withInput();
            } else {
                if (Input::hasFile('image')) {
                    $file = Input::file('image');
                    $uploadedFileName = $this->uploadImage($file, TESTIMONIAL_FULL_UPLOAD_PATH);
                    $this->resizeImage($uploadedFileName, TESTIMONIAL_FULL_UPLOAD_PATH, TESTIMONIAL_SMALL_UPLOAD_PATH, TESTIMONIAL_MW, TESTIMONIAL_MH);
                    $input['image'] = $uploadedFileName;
                }else{
                    unset($input['image']);
                }                
                $serialisedData = $this->serialiseFormData($input);
                $serialisedData['slug'] = $this->createSlug($input['title'], 'testimonials');
                $serialisedData['status'] =  1;
                Testimonial::insert($serialisedData); 
                
                Session::flash('success_message', "Testimonial details saved successfully.");
                return Redirect::to('admin/testimonials');
            }           
        }        
        return view('admin.testimonials.add', ['title'=>$pageTitle, $activetab=>1]);
    }
    
    public function edit($slug=null){
        $pageTitle = 'Edit Testimonial'; 
        $activetab = 'acttestimonials';
        
        $recordInfo = Testimonial::where('slug', $slug)->first();
        if (empty($recordInfo)) {
            return Redirect::to('admin/testimonials');
        }
        
        $input = Input::all();
        if (!empty($input)) {
            $rules = array(
                'title' => 'required|max:100',
                'client_name' => 'required|max:30',
                'country' => 'required',
                'description' => 'required',
                'image' => 'mimes:jpeg,png,jpg|max:'.MAX_IMAGE_UPLOAD_SIZE_VAL,
            );
            $validator = Validator::make($input, $rules);             
            if ($validator->fails()) {
                return Redirect::to('/admin/testimonials/edit/'.$slug)->withErrors($validator)->withInput();
            } else {
                if (Input::hasFile('image')) { 
                    $file = Input::file('image');
                    $uploadedFileName = $this->uploadImage($file, TESTIMONIAL_FULL_UPLOAD_PATH);
                    $this->resizeImage($uploadedFileName, TESTIMONIAL_FULL_UPLOAD_PATH, TESTIMONIAL_SMALL_UPLOAD_PATH, TESTIMONIAL_MW, TESTIMONIAL_MH);
                    $input['image'] = $uploadedFileName;
                    @unlink(CATEGORY_FULL_UPLOAD_PATH.$recordInfo->image);
                    @unlink(CATEGORY_SMALL_UPLOAD_PATH.$recordInfo->image);
                }else{
                    unset($input['image']);
                }
                $serialisedData = $this->serialiseFormData($input, 1); //send 1 for edit
                Testimonial::where('id', $recordInfo->id)->update($serialisedData);
                Session::flash('success_message', "Testimonial details updated successfully.");
                return Redirect::to('admin/testimonials');
            }           
        }        
        return view('admin.testimonials.edit', ['title'=>$pageTitle, $activetab=>1, 'recordInfo'=>$recordInfo]);
    }
    
    public function activate($slug=null){
        if($slug){
            Testimonial::where('slug', $slug)->update(array('status' => '1'));
            return view('elements.admin.update_status', ['action'=>'admin/testimonials/deactivate/' . $slug, 'status'=>1]);
        }
    }
    public function deactivate($slug=null){
        if($slug){
            Testimonial::where('slug', $slug)->update(array('status' => '0'));
            return view('elements.admin.update_status', ['action'=>'admin/testimonials/activate/' . $slug, 'status'=>0]);
        }
    }
    
    public function delete($slug=null){
        if($slug){
            Testimonial::where('slug', $slug)->delete();
            Session::flash('success_message', "Testimonial details deleted successfully.");
            return Redirect::to('admin/testimonials');
        }
    }    
}
?>