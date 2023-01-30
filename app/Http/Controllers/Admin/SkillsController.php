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
use App\Models\Skill;
use Mail;
use App\Mail\SendMailable;

class SkillsController extends Controller {    
    public function __construct() {
        $this->middleware('is_adminlogin');
    }
    
    public function index(Request $request){
        $pageTitle = 'Manage Skills'; 
        $activetab = 'actskills';
        $query = new Skill();
        $query = $query->sortable();
        
        if ($request->has('chkRecordId') && $request->has('action')) {
            $idList = $request->get('chkRecordId');
            $action = $request->get('action');
            if ($action == "Activate") {
                Skill::whereIn('id', $idList)->update(array('status' => 1));
                Session::flash('success_message', "Records are activated successfully.");
            } else if ($action == "Deactivate") {
                Skill::whereIn('id', $idList)->update(array('status' => 0));
                Session::flash('success_message', "Records are deactivated successfully.");
            } else if ($action == "Delete") {
                Skill::whereIn('id', $idList)->delete();
                Session::flash('success_message', "Records are deleted successfully.");
            } 
        }
        
        if ($request->has('keyword')) {
            $keyword = $request->get('keyword');
            $query = $query->where(function($q) use ($keyword){
                $q->where('name', 'like', '%'.$keyword.'%');
            });
        }
        
        $skills = $query->orderBy('id','DESC')->paginate(20);
        if($request->ajax()){
            return view('elements.admin.skills.index', ['allrecords'=>$skills]);
        }
        return view('admin.skills.index', ['title'=>$pageTitle, $activetab=>1,'allrecords'=>$skills]);
    }

    public function add(){
        $pageTitle = 'Add Skill'; 
        $activetab = 'actskills';
        $input = Input::all();
        if (!empty($input)) {
            $rules = array(
                'name' => 'required|unique:skills',
            );
            $validator = Validator::make($input, $rules);             
            if ($validator->fails()) {
                return Redirect::to('/admin/skills/add')->withErrors($validator)->withInput();
            } else {
                $input['name'] = ucfirst($input['name']);
                $serialisedData = $this->serialiseFormData($input);
                $serialisedData['slug'] = $this->createSlug($input['name'], 'skills');
                $serialisedData['status'] =  1;
                Skill::insert($serialisedData); 
                Session::flash('success_message', "Skill saved successfully.");
                return Redirect::to('admin/skills');
            }           
        }        
        return view('admin.skills.add', ['title'=>$pageTitle, $activetab=>1]);
    }
    
    public function edit($slug=null){
        $pageTitle = 'Edit Skill'; 
        $activetab = 'actskills';
        $recordInfo = Skill::where('slug', $slug)->first();
        if (empty($recordInfo)) {
            return Redirect::to('admin/skills');
        }
        
        $input = Input::all();
        if (!empty($input)) {
            $rules = array(
                'name' => 'required|unique:skills,name,'.$recordInfo->id,
            );
            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                return Redirect::to('/admin/skills/edit/'.$slug)->withErrors($validator)->withInput();
            } else {
                $serialisedData = $this->serialiseFormData($input, 1); //send 1 for edit
                Skill::where('id', $recordInfo->id)->update($serialisedData);
                Session::flash('success_message', "Skill updated successfully.");
                return Redirect::to('admin/skills');
            }           
        }        
        return view('admin.skills.edit', ['title'=>$pageTitle, $activetab=>1, 'recordInfo'=>$recordInfo]);
    }
    
    public function activate($slug=null){
        if($slug){
            Skill::where('slug', $slug)->update(array('status' => '1'));
            return view('elements.admin.update_status', ['action'=>'admin/skills/deactivate/' . $slug, 'status'=>1]);
        }
    }
    public function deactivate($slug=null){
        if($slug){
            Skill::where('slug', $slug)->update(array('status' => '0'));
            return view('elements.admin.update_status', ['action'=>'admin/skills/activate/' . $slug, 'status'=>0]);
        }
    }
    
    public function delete($slug=null){
        if($slug){
            Skill::where('slug', $slug)->delete();
            Session::flash('success_message', "Skill deleted successfully.");
            return Redirect::to('admin/skills');
        }
    }    
}
?>