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
use App\Models\Country;
use Mail;
use App\Mail\SendMailable;

class CountriesController extends Controller {    
    public function __construct() {
        $this->middleware('is_adminlogin');
    }
    
    public function index(Request $request){
        $pageTitle = 'Manage Countries'; 
        $activetab = 'actcountries';
        $query = new Country();
        $query = $query->sortable();
        
        if ($request->has('chkRecordId') && $request->has('action')) {
            $idList = $request->get('chkRecordId');
            $action = $request->get('action');
            if ($action == "Activate") {
                Country::whereIn('id', $idList)->update(array('status' => 1));
                Session::flash('success_message', "Records are activated successfully.");
            } else if ($action == "Deactivate") {
                Country::whereIn('id', $idList)->update(array('status' => 0));
                Session::flash('success_message', "Records are deactivated successfully.");
            } else if ($action == "Delete") {
                Country::whereIn('id', $idList)->delete();
                Session::flash('success_message', "Records are deleted successfully.");
            } 
        }
        
        if ($request->has('keyword')) {
            $keyword = $request->get('keyword');
            $query = $query->where(function($q) use ($keyword){
                $q->where('name', 'like', '%'.$keyword.'%');
            });
        }
        
        $countries = $query->orderBy('id','DESC')->paginate(20);
        if($request->ajax()){
            return view('elements.admin.countries.index', ['allrecords'=>$countries]);
        }
        return view('admin.countries.index', ['title'=>$pageTitle, $activetab=>1,'allrecords'=>$countries]);
    }

    public function add(){
        $pageTitle = 'Add Country'; 
        $activetab = 'actcountries';
        $input = Input::all();
        if (!empty($input)) {
            $rules = array(
                'name' => 'required|unique:countries',
            );
            $validator = Validator::make($input, $rules);             
            if ($validator->fails()) {
                return Redirect::to('/admin/countries/add')->withErrors($validator)->withInput();
            } else {
                $input['name'] = ucfirst($input['name']);
                $serialisedData = $this->serialiseFormData($input);
                $serialisedData['slug'] = $this->createSlug($input['name'], 'countries');
                $serialisedData['status'] =  1;
                Country::insert($serialisedData); 
                Session::flash('success_message', "Country saved successfully.");
                return Redirect::to('admin/countries');
            }           
        }        
        return view('admin.countries.add', ['title'=>$pageTitle, $activetab=>1]);
    }
    
    public function edit($slug=null){
        $pageTitle = 'Edit Country'; 
        $activetab = 'actcountries';
        $recordInfo = Country::where('slug', $slug)->first();
        if (empty($recordInfo)) {
            return Redirect::to('admin/countries');
        }
        
        $input = Input::all();
        if (!empty($input)) {
            $rules = array(
                'name' => 'required|unique:countries,name,'.$recordInfo->id,
            );
            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                return Redirect::to('/admin/countries/edit/'.$slug)->withErrors($validator)->withInput();
            } else {
                $serialisedData = $this->serialiseFormData($input, 1); //send 1 for edit
                Country::where('id', $recordInfo->id)->update($serialisedData);
                Session::flash('success_message', "Country updated successfully.");
                return Redirect::to('admin/countries');
            }           
        }        
        return view('admin.countries.edit', ['title'=>$pageTitle, $activetab=>1, 'recordInfo'=>$recordInfo]);
    }
    
    public function activate($slug=null){
        if($slug){
            Country::where('slug', $slug)->update(array('status' => '1'));
            return view('elements.admin.update_status', ['action'=>'admin/countries/deactivate/' . $slug, 'status'=>1]);
        }
    }
    public function deactivate($slug=null){
        if($slug){
            Country::where('slug', $slug)->update(array('status' => '0'));
            return view('elements.admin.update_status', ['action'=>'admin/countries/activate/' . $slug, 'status'=>0]);
        }
    }
    
    public function delete($slug=null){
        if($slug){
            Country::where('slug', $slug)->delete();
            Session::flash('success_message', "Country deleted successfully.");
            return Redirect::to('admin/countries');
        }
    }    
}
?>