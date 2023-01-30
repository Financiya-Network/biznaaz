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
use App\Models\Service;
use App\Models\User;
use Mail;
use App\Mail\SendMailable;

class ServicesController extends Controller {    
    public function __construct() {
        $this->middleware('is_adminlogin');
    }
    
    public function index(Request $request){
        $pageTitle = 'Manage Services'; 
        $activetab = 'actservices';
        $query = new Service();
        $query = $query->sortable();
        
        if ($request->has('chkRecordId') && $request->has('action')) {
            $idList = $request->get('chkRecordId');
            $action = $request->get('action');
            if ($action == "Activate") {
                Service::whereIn('id', $idList)->update(array('status' => 1));
                Session::flash('success_message', "Records are activated successfully.");
            } else if ($action == "Deactivate") {
                Service::whereIn('id', $idList)->update(array('status' => 0));
                Session::flash('success_message', "Records are deactivated successfully.");
            } else if ($action == "Delete") {
                Service::whereIn('id', $idList)->delete();
                Session::flash('success_message', "Records are deleted successfully.");
            } 
        }
        
        if ($request->has('keyword')) {
            $keyword = $request->get('keyword');
            $query = $query->where(function($q) use ($keyword){
                $q->where('title', 'like', '%'.$keyword.'%');
            });
        }
        
        $services = $query->orderBy('id','DESC')->paginate(30);
        if($request->ajax()){
            return view('elements.admin.services.index', ['allrecords'=>$services]);
        }
        return view('admin.services.index', ['title'=>$pageTitle, $activetab=>1,'allrecords'=>$services]);
    }

    public function add(){
        $pageTitle = 'Add Service'; 
        $activetab = 'actservices';
        $input = Input::all();
        if (!empty($input)) {
            $rules = array(
                'name' => 'required|unique:services',
            );
            $validator = Validator::make($input, $rules);             
            if ($validator->fails()) {
                return Redirect::to('/admin/services/add')->withErrors($validator)->withInput();
            } else {
                $input['name'] = ucfirst($input['name']);
                $serialisedData = $this->serialiseFormData($input);
                $serialisedData['slug'] = $this->createSlug($input['name'], 'services');
                $serialisedData['status'] =  1;
                Service::insert($serialisedData); 
                Session::flash('success_message', "Service saved successfully.");
                return Redirect::to('admin/services');
            }           
        }        
        return view('admin.services.add', ['title'=>$pageTitle, $activetab=>1]);
    }
    
    public function edit($slug=null){
        $pageTitle = 'Edit Service'; 
        $activetab = 'actservices';
        $recordInfo = Service::where('slug', $slug)->first();
        if (empty($recordInfo)) {
            return Redirect::to('admin/services');
        }
        
        $input = Input::all();
        if (!empty($input)) {
            $rules = array(
                'name' => 'required|unique:services,name,'.$recordInfo->id,
            );
            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                return Redirect::to('/admin/services/edit/'.$slug)->withErrors($validator)->withInput();
            } else {
                $serialisedData = $this->serialiseFormData($input, 1); //send 1 for edit
                Service::where('id', $recordInfo->id)->update($serialisedData);
                Session::flash('success_message', "Service updated successfully.");
                return Redirect::to('admin/services');
            }           
        }        
        return view('admin.services.edit', ['title'=>$pageTitle, $activetab=>1, 'recordInfo'=>$recordInfo]);
    }
    
    public function activate($slug=null){
        if($slug){
            Service::where('slug', $slug)->update(array('status' => '1'));
            return view('elements.admin.update_status', ['action'=>'admin/services/deactivate/' . $slug, 'status'=>1]);
        }
    }
    public function deactivate($slug=null){
        if($slug){
            Service::where('slug', $slug)->update(array('status' => '0'));
            return view('elements.admin.update_status', ['action'=>'admin/services/activate/' . $slug, 'status'=>0]);
        }
    }
    
    public function delete($slug=null){
        if($slug){
            Service::where('slug', $slug)->delete();
            Session::flash('success_message', "Service deleted successfully.");
            return Redirect::to('admin/services');
        }
    }    
}
?>