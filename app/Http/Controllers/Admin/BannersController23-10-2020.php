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
                // 'name' => 'mimes:jpeg,png,jpg',
                 'name' => 'mimes:jpeg,png,jpg|dimensions:width=1920,height=659',
            );
            $validator = Validator::make($input, $rules);             
            if ($validator->fails()) {
                return Redirect::to('/admin/banners/edit/'.$slug)->withErrors($validator)->withInput();
            } else {
                if (Input::hasFile('name')) { 
                    $file = Input::file('name');
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
     
}
?>