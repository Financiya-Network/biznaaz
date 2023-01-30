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
use App\Models\Gig;
use App\Models\User;
use Mail;
use App\Mail\SendMailable;

class GigsController extends Controller {    
    public function __construct() {
        $this->middleware('is_adminlogin');
    }
    
    public function index(Request $request){
        $pageTitle = 'Manage Gigs'; 
        $activetab = 'actgigs';
        $query = new Gig();
        $query = $query->sortable();
        
        if ($request->has('chkRecordId') && $request->has('action')) {
            $idList = $request->get('chkRecordId');
            $action = $request->get('action');
            if ($action == "Activate") {
                Gig::whereIn('id', $idList)->update(array('status' => 1));
                Session::flash('success_message', "Records are activated successfully.");
            } else if ($action == "Deactivate") {
                Gig::whereIn('id', $idList)->update(array('status' => 0));
                Session::flash('success_message', "Records are deactivated successfully.");
            } else if ($action == "Delete") {
                Gig::whereIn('id', $idList)->delete();
                Session::flash('success_message', "Records are deleted successfully.");
            } 
        }
        
        if ($request->has('keyword')) {
            $keyword = $request->get('keyword');
            $query = $query->where(function($q) use ($keyword){
                $q->where('title', 'like', '%'.$keyword.'%');
            });
        }
        
        $gigs = $query->orderBy('id','DESC')->paginate(30);
        if($request->ajax()){
            return view('elements.admin.gigs.index', ['allrecords'=>$gigs]);
        }
        return view('admin.gigs.index', ['title'=>$pageTitle, $activetab=>1,'allrecords'=>$gigs]);
    }

    public function add(){
        $pageTitle = 'Add Gig'; 
        $activetab = 'actgigs';
        $input = Input::all();
        if (!empty($input)) {
            $rules = array(
                'name' => 'required|unique:gigs',
            );
            $validator = Validator::make($input, $rules);             
            if ($validator->fails()) {
                return Redirect::to('/admin/gigs/add')->withErrors($validator)->withInput();
            } else {
                $input['name'] = ucfirst($input['name']);
                $serialisedData = $this->serialiseFormData($input);
                $serialisedData['slug'] = $this->createSlug($input['name'], 'gigs');
                $serialisedData['status'] =  1;
                Gig::insert($serialisedData); 
                Session::flash('success_message', "Gig saved successfully.");
                return Redirect::to('admin/gigs');
            }           
        }        
        return view('admin.gigs.add', ['title'=>$pageTitle, $activetab=>1]);
    }
    
    public function edit($slug=null){
        $pageTitle = 'Edit Gig'; 
        $activetab = 'actgigs';
        $recordInfo = Gig::where('slug', $slug)->first();
        if (empty($recordInfo)) {
            return Redirect::to('admin/gigs');
        }
        
        $input = Input::all();
        if (!empty($input)) {
            $rules = array(
                'name' => 'required|unique:gigs,name,'.$recordInfo->id,
            );
            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                return Redirect::to('/admin/gigs/edit/'.$slug)->withErrors($validator)->withInput();
            } else {
                $serialisedData = $this->serialiseFormData($input, 1); //send 1 for edit
                Gig::where('id', $recordInfo->id)->update($serialisedData);
                Session::flash('success_message', "Gig updated successfully.");
                return Redirect::to('admin/gigs');
            }           
        }        
        return view('admin.gigs.edit', ['title'=>$pageTitle, $activetab=>1, 'recordInfo'=>$recordInfo]);
    }
    
    public function activate($slug=null){
        if($slug){
            Gig::where('slug', $slug)->update(array('status' => '1'));
            return view('elements.admin.update_status', ['action'=>'admin/gigs/deactivate/' . $slug, 'status'=>1]);
        }
    }
    public function deactivate($slug=null){
        if($slug){
            Gig::where('slug', $slug)->update(array('status' => '0'));
            return view('elements.admin.update_status', ['action'=>'admin/gigs/activate/' . $slug, 'status'=>0]);
        }
    }
    
    public function delete($slug=null){
        if($slug){
            Gig::where('slug', $slug)->delete();
            Session::flash('success_message', "Gig deleted successfully.");
            return Redirect::to('admin/gigs');
        }
    }    
}
?>