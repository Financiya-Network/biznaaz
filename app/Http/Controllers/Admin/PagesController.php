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
use App\Models\Page;
use Mail;
use App\Mail\SendMailable;

class PagesController extends Controller {    
    public function __construct() {
        $this->middleware('is_adminlogin');
    }
    
    public function index(Request $request){
        $pageTitle = 'Manage Pages'; 
        $activetab = 'actpages';
        $query = new Page();
        $query = $query->sortable();
        
        if ($request->has('chkRecordId') && $request->has('action')) {
            $idList = $request->get('chkRecordId');
            $action = $request->get('action');
            if ($action == "Activate") {
                Page::whereIn('id', $idList)->update(array('status' => 1, 'activation_status' => 1));
                Session::flash('success_message', "Records are activated successfully.");
            } else if ($action == "Deactivate") {
                Page::whereIn('id', $idList)->update(array('status' => 0));
                Session::flash('success_message', "Records are deactivated successfully.");
            } else if ($action == "Delete") {
                Page::whereIn('id', $idList)->delete();
                Session::flash('success_message', "Records are deleted successfully.");
            } 
        }
        
        if ($request->has('keyword')) {
            $keyword = $request->get('keyword');
            $query = $query->where(function($q) use ($keyword){
                $q->where('first_name', 'like', '%'.$keyword.'%')
                ->orWhere('last_name', 'like', '%'.$keyword.'%');
            });
        }
        
        $pages = $query->orderBy('id','DESC')->paginate(20);
        if($request->ajax()){
            return view('elements.admin.pages.index', ['allrecords'=>$pages]);
        }
        return view('admin.pages.index', ['title'=>$pageTitle, $activetab=>1,'allrecords'=>$pages]);
    }

    public function edit($slug=null){
        $pageTitle = 'Edit Page'; 
        $activetab = 'actpages';
        $countrList = array('1'=>'India', '2'=>'USA', '3'=>'AUS');
        
        $recordInfo = Page::where('slug', $slug)->first();
        if (empty($recordInfo)) {
            return Redirect::to('admin/pages');
        }
        
        $input = Input::all();
        if (!empty($input)) {
            $rules = array(
               'title' => 'required|unique:pages,title,'.$recordInfo->id,
            );
            $validator = Validator::make($input, $rules);             
            if ($validator->fails()) {
                return Redirect::to('/admin/pages/edit/'.$slug)->withErrors($validator)->withInput();
            } else {
//                echo '<pre>';
//                print_r($input);exit;
                $serialisedData = $this->serialiseFormData($input, 1); //send 1 for edit
                Page::where('id', $recordInfo->id)->update($serialisedData);
                Session::flash('success_message', "Page details updated successfully.");
                return Redirect::to('admin/pages');
            }           
        }        
        return view('admin.pages.edit', ['title'=>$pageTitle, $activetab=>1, 'countrList'=>$countrList, 'recordInfo'=>$recordInfo]);
    }    
    
    public function pageimages(){ 
        $file = Input::file('upload');
        $uploadedFileName = $this->uploadImage($file, CK_IMAGE_UPLOAD_PATH);
        echo "<span style='font-size: 12px; color: #f00; font-weight: bold;'>Copy below URL and Paste it in Image Info tab and than click OK button:</span> <span style='float: left; font-size: 13px; margin: 2px 0 0; width: 100%;'>" . CK_IMAGE_DISPLAY_PATH . $uploadedFileName.'</span>'; 
        exit;
    }
    
}
?>