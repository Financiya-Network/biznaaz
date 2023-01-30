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
use App\Models\Category;
use Mail;
use App\Mail\SendMailable;

class CategoriesController extends Controller {    
    public function __construct() {
        $this->middleware('is_adminlogin');
    }
    
    public function index(Request $request){
        $pageTitle = 'Manage Categories'; 
        $activetab = 'actcategories';
        $query = new Category();
        $query = $query->sortable();
        $query = $query->where('parent_id', 0);   
        if ($request->has('chkRecordId') && $request->has('action')) {
            $idList = $request->get('chkRecordId');
            $action = $request->get('action');
            if ($action == "Activate") {
                Category::whereIn('id', $idList)->update(array('status' => 1));
                Session::flash('success_message', "Records are activated successfully.");
            } else if ($action == "Deactivate") {
                Category::whereIn('id', $idList)->update(array('status' => 0));
                Session::flash('success_message', "Records are deactivated successfully.");
            } else if ($action == "Delete") {
                Category::whereIn('id', $idList)->delete();
                Session::flash('success_message', "Records are deleted successfully.");
            } 
        }
        
        if ($request->has('keyword')) {
            $keyword = $request->get('keyword');
            $query = $query->where(function($q) use ($keyword){
                $q->where('name', 'like', '%'.$keyword.'%');
            });
        }
        
        $categories = $query->orderBy('id','DESC')->paginate(20);
        if($request->ajax()){
            return view('elements.admin.categories.index', ['allrecords'=>$categories]);
        }
        return view('admin.categories.index', ['title'=>$pageTitle, $activetab=>1,'allrecords'=>$categories]);
    }

    public function add(){
        $pageTitle = 'Add Category'; 
        $activetab = 'actcategories';
        $input = Input::all();
        if (!empty($input)) {
            $rules = array(
                'name' => 'required|unique:categories',
                //'sub_title' => 'required',
                'image' => 'required|mimes:jpeg,png,jpg|dimensions:width=48,height=48|max:'.MAX_IMAGE_UPLOAD_SIZE_VAL,
                'home_image' => 'required|mimes:jpeg,png,jpg|dimensions:width=222,height=294|max:'.MAX_IMAGE_UPLOAD_SIZE_VAL,
            );
            $validator = Validator::make($input, $rules);             
            if ($validator->fails()) {
                return Redirect::to('/admin/categories/add')->withErrors($validator)->withInput();
            } else {
                if (Input::hasFile('image')) {
                    $file = Input::file('image');
                    $uploadedFileName = $this->uploadImage($file, CATEGORY_FULL_UPLOAD_PATH);
                    $this->resizeImage($uploadedFileName, CATEGORY_FULL_UPLOAD_PATH, CATEGORY_SMALL_UPLOAD_PATH, CATEGORY_MW, CATEGORY_MH);
                    $input['image'] = $uploadedFileName;
                }else{
                    unset($input['image']);
                } 
                if (Input::hasFile('home_image')) {
                    $file = Input::file('home_image');
                    $uploadedFileName = $this->uploadImage($file, CATEGORY_FULL_UPLOAD_PATH);
                    $this->resizeImage($uploadedFileName, CATEGORY_FULL_UPLOAD_PATH, CATEGORY_SMALL_UPLOAD_PATH, CATEGORY_MW, CATEGORY_MH);
                    $input['home_image'] = $uploadedFileName;
                }else{
                    unset($input['home_image']);
                } 
                $input['name'] = ucfirst($input['name']);
                $serialisedData = $this->serialiseFormData($input);
                $serialisedData['slug'] = $this->createSlug($input['name'], 'categories');
                $serialisedData['status'] =  1;
                Category::insert($serialisedData); 
                Session::flash('success_message', "Category details saved successfully.");
                return Redirect::to('admin/categories');
            }           
        }        
        return view('admin.categories.add', ['title'=>$pageTitle, $activetab=>1]);
    }
    
    public function edit($slug=null){
        $pageTitle = 'Edit Category'; 
        $activetab = 'actcategories';
        $recordInfo = Category::where('slug', $slug)->first();
        if (empty($recordInfo)) {
            return Redirect::to('admin/categories');
        }
        
        $input = Input::all();
        if (!empty($input)) {
            $rules = array(
                'name' => 'required|unique:categories,name,'.$recordInfo->id,
                //'sub_title' => 'required',
                'image' => 'mimes:jpeg,png,jpg|dimensions:width=48,height=48|max:'.MAX_IMAGE_UPLOAD_SIZE_VAL,
                'home_image' => 'mimes:jpeg,png,jpg|dimensions:width=222,height=294|max:'.MAX_IMAGE_UPLOAD_SIZE_VAL,
            );
            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                return Redirect::to('/admin/categories/edit/'.$slug)->withErrors($validator)->withInput();
            } else {
                if (Input::hasFile('image')) {
                    $file = Input::file('image');
                    $uploadedFileName = $this->uploadImage($file, CATEGORY_FULL_UPLOAD_PATH);
                    $this->resizeImage($uploadedFileName, CATEGORY_FULL_UPLOAD_PATH, CATEGORY_SMALL_UPLOAD_PATH, CATEGORY_MW, CATEGORY_MH);
                    $input['image'] = $uploadedFileName;
                    @unlink(CATEGORY_FULL_UPLOAD_PATH.$recordInfo->image);
                    @unlink(CATEGORY_SMALL_UPLOAD_PATH.$recordInfo->image);
                }else{
                    unset($input['image']);
                } 
                
                if (Input::hasFile('home_image')) {
                    $file = Input::file('home_image');
                    $uploadedFileName = $this->uploadImage($file, CATEGORY_FULL_UPLOAD_PATH);
                    $this->resizeImage($uploadedFileName, CATEGORY_FULL_UPLOAD_PATH, CATEGORY_SMALL_UPLOAD_PATH, CATEGORY_MW, CATEGORY_MH);
                    $input['home_image'] = $uploadedFileName;
                    @unlink(CATEGORY_FULL_UPLOAD_PATH.$recordInfo->home_image);
                    @unlink(CATEGORY_SMALL_UPLOAD_PATH.$recordInfo->home_image);
                }else{
                    unset($input['home_image']);
                } 
                
                $serialisedData = $this->serialiseFormData($input, 1); //send 1 for edit
                Category::where('id', $recordInfo->id)->update($serialisedData);
                Session::flash('success_message', "Category details updated successfully.");
                return Redirect::to('admin/categories');
            }           
        }        
        return view('admin.categories.edit', ['title'=>$pageTitle, $activetab=>1, 'recordInfo'=>$recordInfo]);
    }
    
    public function activate($slug=null){
        if($slug){
            Category::where('slug', $slug)->update(array('status' => '1'));
            return view('elements.admin.update_status', ['action'=>'admin/categories/deactivate/' . $slug, 'status'=>1]);
        }
    }
    public function deactivate($slug=null){
        if($slug){
            Category::where('slug', $slug)->update(array('status' => '0'));
            return view('elements.admin.update_status', ['action'=>'admin/categories/activate/' . $slug, 'status'=>0]);
        }
    }
    
    public function delete($slug=null){
        if($slug){
            Category::where('slug', $slug)->delete();
            Session::flash('success_message', "Category details deleted successfully.");
            return Redirect::to('admin/categories');
        }
    } 
    
    public function subcategory($cslug=null, Request $request){
        $pageTitle = 'Manage Categories'; 
        $activetab = 'actcategories';
        $query = new Category();
        $query = $query->sortable();
        
        $catInfo = Category::where('slug', $cslug)->first();
        if(!$catInfo){
           return Redirect::to('admin/categories'); 
        }
        $query = $query->where('parent_id', $catInfo->id);        
        if ($request->has('chkRecordId') && $request->has('action')) {
            $idList = $request->get('chkRecordId');
            $action = $request->get('action');
            if ($action == "Activate") {
                Category::whereIn('id', $idList)->update(array('status' => 1));
                Session::flash('success_message', "Records are activated successfully.");
            } else if ($action == "Deactivate") {
                Category::whereIn('id', $idList)->update(array('status' => 0));
                Session::flash('success_message', "Records are deactivated successfully.");
            } else if ($action == "Delete") {
                Category::whereIn('id', $idList)->delete();
                Session::flash('success_message', "Records are deleted successfully.");
            } 
        }
        
        if ($request->has('keyword')) {
            $keyword = $request->get('keyword');
            $query = $query->where(function($q) use ($keyword){
                $q->where('name', 'like', '%'.$keyword.'%');
            });
        }
        
        $categories = $query->orderBy('id','DESC')->paginate(20);
        if($request->ajax()){
            return view('elements.admin.categories.subcategory', ['allrecords'=>$categories,'catInfo'=>$catInfo]);
        }
        return view('admin.categories.subcategory', ['title'=>$pageTitle, $activetab=>1,'allrecords'=>$categories,'catInfo'=>$catInfo]);
    }
    
    public function addsubcategory($cslug=null){
        $pageTitle = 'Add Sub Category'; 
        $activetab = 'actcategories';
        
        $catInfo = Category::where('slug', $cslug)->first();
        if(!$catInfo){
           return Redirect::to('admin/categories'); 
        }
        $input = Input::all();
        if (!empty($input)) {
            $rules = array(
                'name' => 'required|unique:categories',
            );
            $validator = Validator::make($input, $rules);             
            if ($validator->fails()) {
                return Redirect::to('/admin/categories/addsubcategory/'.$cslug)->withErrors($validator)->withInput();
            } else {
                $input['name'] = ucfirst($input['name']);
                $serialisedData = $this->serialiseFormData($input);
                $serialisedData['slug'] = $this->createSlug($input['name'], 'categories');
                $serialisedData['status'] =  1;
                $serialisedData['parent_id'] =  $catInfo->id;
                Category::insert($serialisedData); 
                Session::flash('success_message', "Sub category saved successfully.");
                return Redirect::to('admin/categories/subcategory/'.$cslug);
            }           
        }        
        return view('admin.categories.addsubcategory', ['title'=>$pageTitle, $activetab=>1,'catInfo'=>$catInfo]);
    }
    
    public function editsubcategory($cslug=null, $slug=null){
        $pageTitle = 'Edit Sub Category'; 
        $activetab = 'actcategories';
        $recordInfo = Category::where('slug', $slug)->first();
        if (empty($recordInfo)) {
            return Redirect::to('admin/categories');
        }
        $catInfo = Category::where('slug', $cslug)->first();
        if(!$catInfo){
           return Redirect::to('admin/categories'); 
        }
        $input = Input::all();
        if (!empty($input)) {
            $rules = array(
                'name' => 'required|unique:categories,name,'.$recordInfo->id,
            );
            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                return Redirect::to('/admin/categories/editsubcategory/'.$slug)->withErrors($validator)->withInput();
            } else {
                $serialisedData = $this->serialiseFormData($input, 1); //send 1 for edit
                Category::where('id', $recordInfo->id)->update($serialisedData);
                Session::flash('success_message', "Sub category updated successfully.");
                return Redirect::to('admin/categories/subcategory/'.$cslug);
            }           
        }        
        return view('admin.categories.editsubcategory', ['title'=>$pageTitle, $activetab=>1, 'recordInfo'=>$recordInfo,'catInfo'=>$catInfo]);
    }
    
    public function activatesubcategory($cslug=null, $slug=null){
        if($slug){
            Category::where('slug', $slug)->update(array('status' => '1'));
            return view('elements.admin.update_status', ['action'=>'admin/categories/deactivatesubcategory/'.$cslug.'/'. $slug, 'status'=>1]);
        }
    }
    public function deactivatesubcategory($cslug=null, $slug=null){
        if($slug){
            Category::where('slug', $slug)->update(array('status' => '0'));
            return view('elements.admin.update_status', ['action'=>'admin/categories/activatesubcategory/'.$cslug.'/'. $slug, 'status'=>0]);
        }
    }
    
    public function deletesubcategory($cslug=null, $slug=null){
        if($slug){
            Category::where('slug', $slug)->delete();
            Session::flash('success_message', "Sub category deleted successfully.");
            return Redirect::to('admin/categories/subcategory/'.$cslug);
        }
    }
}
?>