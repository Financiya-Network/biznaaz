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
use App\Models\Banner;
use App\Models\Country;
use Mail;
use App\Mail\SendMailable;

class BannersController extends Controller {    
    public function __construct() {
        $this->middleware('is_adminlogin');
    }
    
    public function index(Request $request){
        $pageTitle = 'Manage Banners'; 
        $activetab = 'actbanners';
        $query = new Banner();
        $query = $query->sortable();
        
        $banners = $query->orderBy('id','DESC')->paginate(20);
        if($request->ajax()){
            return view('elements.admin.banners.index', ['allrecords'=>$banners]);
        }
        return view('admin.banners.index', ['title'=>$pageTitle, $activetab=>1,'allrecords'=>$banners]);
    }
 public function add(){
    //echo"hello";exit;
        $pageTitle = 'Add Banner'; 
        $activetab = 'actbanners';
         $input = Input::all();
        if (!empty($input)) {
            $rules = array(
                'name' => 'required|mimes:jpeg,png,jpg',
                'type' => 'required',
                
            );
            $validator = Validator::make($input, $rules);             
            if ($validator->fails()) {
                return Redirect::to('/admin/banners/add')->withErrors($validator)->withInput();
            } else {
                if (Input::hasFile('name')) { 
                    $file = Input::file('name');
                    
                    
                    $fileinfo = getimagesize($file);
                    
                    if($input['type'] == 'logged_user'){
                        if($fileinfo[0] == '988' && $fileinfo[1] == '233'){
                            //continue
                        }else{
                            Session::flash('error_message', "Invalid image diamension! Banner size should be 825 x 195px.");
                            return Redirect::to('/admin/banners/add')->withInput();
                        }
                    }else{
                        if($fileinfo[0] == '1920' && $fileinfo[1] == '659'){
                            //continue
                        }else{
                            //echo "<pre>"; print_r($fileinfo);exit;
                            Session::flash('error_message', "Invalid image diamension! Banner size should be 1920 x 659px.");
                            return Redirect::to('/admin/banners/add')->withInput();
                        }
                    }
                    
                    
                    
                    
                    $uploadedFileName = $this->uploadImage($file, BANNER_UPLOAD_PATH);
                    $input['name'] = $uploadedFileName;
                }else{
                    unset($input['name']);
                }
                $serialisedData = $this->serialiseFormData($input);
                $serialisedData['slug'] = $this->createSlug('ban', 'banners');
                //$serialisedData['slug'] = $this->createSlug($input['name']. 'ban');
                Banner::insert($serialisedData); 
                Session::flash('success_message', "Banner saved successfully.");
                return Redirect::to('admin/banners');
                
                
            }           
        }        
        return view('admin.banners.add', ['title'=>$pageTitle, $activetab=>1]);
    }
    
    
    public function edit($slug=null){
        $pageTitle = 'Edit Banner'; 
        $activetab = 'actbanners';
        
        $recordInfo = Banner::where('slug', $slug)->first();
        if (empty($recordInfo)) {
            return Redirect::to('admin/banners');
        }
        
        $input = Input::all();
        if (!empty($input)) {
            $rules = array(
                //'name' => 'mimes:jpeg,png,jpg|dimensions:width=1920,height=659',
                'name' => 'mimes:jpeg,png,jpg',
                'type' => 'required',
            );
            $validator = Validator::make($input, $rules);             
            if ($validator->fails()) {
                return Redirect::to('/admin/banners/edit/'.$slug)->withErrors($validator)->withInput();
            } else {
                if (Input::hasFile('name')) { 
                    $file = Input::file('name');
                    
                    $fileinfo = getimagesize($file);
                    
                    if($input['type'] == 'logged_user'){
                        if($fileinfo[0] == '988' && $fileinfo[1] == '233'){
                            //continue
                        }else{
                            Session::flash('error_message', "Invalid image diamension! Banner size should be 825 x 195px.");
                            return Redirect::to('/admin/banners/edit/'.$slug)->withInput();
                        }
                    }else{
                        if($fileinfo[0] == '1920' && $fileinfo[1] == '659'){
                            //continue
                        }else{
                            //echo "<pre>"; print_r($fileinfo);exit;
                            Session::flash('error_message', "Invalid image diamension! Banner size should be 1920 x 659px.");
                            return Redirect::to('/admin/banners/edit/'.$slug)->withInput();
                        }
                    }
                    
                    $uploadedFileName = $this->uploadImage($file, BANNER_UPLOAD_PATH);
                    $input['name'] = $uploadedFileName;
                }else{
                    unset($input['name']);
                }
                
                $serialisedData = $this->serialiseFormData($input, 1); //send 1 for edit
                Banner::where('id', $recordInfo->id)->update($serialisedData);
                Session::flash('success_message', "Banner details updated successfully.");
                return Redirect::to('admin/banners');
            }           
        }        
        return view('admin.banners.edit', ['title'=>$pageTitle, $activetab=>1, 'recordInfo'=>$recordInfo]);
    }

    public function delete($slug=null){
        if($slug){
            Banner::where('slug', $slug)->delete();
            Session::flash('success_message', "Banner deleted successfully.");
            return Redirect::to('admin/banners');
        }
    }    
     
}
?>