<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Cookie;
use Session;
use Redirect;
use Input;
use Validator;
use DB;
use Mail;
use App\Mail\SendMailable;
use Socialite;
use App\Models\Gig;
use App\Models\User;
use App\Models\Gigextra;
use App\Models\Gigfaq;
use App\Models\Gigrequirement;
use App\Models\Image;
use App\Models\Pdf;
use App\Models\Category;
use App\Models\Skill;
use App\Models\Review;
use App\Models\Myorder;

class GigsController extends Controller {

    public function __construct() {
        $this->middleware('is_userlogin', ['except' => ['listing', 'detail','getkeyword']]);
    }

    public function create() {
        $pageTitle = 'Create a new Gig';
        $catList = Category::getCategoryList();
        $skills = Skill::getSkillList();
        $input = Input::all();

        $user_id = Session::get('user_id');
        
        $userInfo = User::where('id', $user_id)->first();
       
        if($userInfo->first_name == '' || $userInfo->last_name == '' || $userInfo->contact == '' || $userInfo->description == '' || $userInfo->languages == '' || $userInfo->skills == '' || $userInfo->educations == ''){
           
            $error = 'Please complete profile details.';
        
            return Redirect::to('/users/dashboard')->withErrors($error);
        }
        
        if (!empty($input)) {
           
            //echo "<pre>"; print_r($input);exit;
            $rules = array(
                'title' => 'required|min:5|max:80|unique:gigs',
                'category_id' => 'required',
                //'subcategory_id' => 'required'
            );
            $customMessages = [
                'category_id.required' => 'The category name field is required field.',
                //'subcategory_id.required' => 'The sub category name field is required field.'
            ];
            $validator = Validator::make($input, $rules, $customMessages);
            if ($validator->fails()) {
                return Redirect::to('gigs/create')->withErrors($validator)->withInput();
            } else {

                $skillsArray = array();
                if (isset($input['tags'])) {
                    foreach ($input['tags'] as $skikllist) {
                        $skillinfo = Skill::where('name', $skikllist)->first();

                        if ($skillinfo && $skillinfo->id) {
                            $skillsArray[] = $skillinfo->id;
                        } else {
                            $serialisedSkillData = array();
                            $serialisedSkillData['name'] = $skikllist;
                            $serialisedSkillData['status'] = 0;
                            $serialisedSkillData['user_id'] = $user_id;
                            $serialisedSkillData['slug'] = $this->createSlug($skikllist, 'skills');
                            $skillsArray[] = Skill::insertGetId($serialisedSkillData);
                        }
                    }
                }
                //print_r($skillsArray);exit;

                $serialisedData = $this->serialiseFormData($input);
                unset($serialisedData['stepcnt']);
                $slug = $this->createSlug($input['title'], 'gigs');
                $serialisedData['slug'] = $slug;
                $serialisedData['user_id'] = $user_id;
                $serialisedData['tags'] = implode(',', $skillsArray);
                Gig::insert($serialisedData);

                Session::flash('success_message', "Gig details saved successfully.");
                return Redirect::to('gigs/edit/' . $slug);
            }
        }
       
        return view('gigs.create', ['title' => $pageTitle, 'catList' => $catList, 'skills' => $skills]);
    }

    public function edit($slug = null) {
        $pageTitle = 'Edit Gig';
        $catList = Category::getCategoryList();
        $skills = Skill::getSkillList();

        $recordInfo = Gig::where('slug', $slug)->first();
        if (empty($recordInfo)) {
            return Redirect::to('users/dashboard');
        }

        $recordFaqInfo = Gigfaq::where('gig_id', $recordInfo->id)->get();
        $recordExtInfo = Gigextra::where('gig_id', $recordInfo->id)->get();
        $recordReqInfo = Gigrequirement::where('gig_id', $recordInfo->id)->get();
        $recordImgInfo = Image::where('gig_id', $recordInfo->id)->get();
        $recordPdfInfo = Pdf::where('gig_id', $recordInfo->id)->get();

//        echo "<pre>"; print_r($recordPdfInfo);exit;
        $subCatList = array();
        if ($recordInfo->category_id) {
            $subCatList = Category::getSubCategoryList($recordInfo->category_id);
        }

        $input = Input::all();
        $user_id = Session::get('user_id');
        if (!empty($input)) {
            //echo "<pre>"; print_r($input);exit;

            if ($input['stepcnt'] == 1 || $input['stepcnt'] == 5 || $input['stepcnt'] == 6) {
                $rules = array(
                    'title' => 'required|min:5|max:80',
                    'category_id' => 'required',
                    //'subcategory_id' => 'required'
                );
                $customMessages = [
                    'category_id.required' => 'The category name field is required field.',
                    //'subcategory_id.required' => 'The sub category name field is required field.'
                ];

                $validator = Validator::make($input, $rules, $customMessages);
            } elseif ($input['stepcnt'] == 2) {
                $rules = array(
                    'basic_title' => 'required',
                    'standard_title' => 'required',
                    'premium_title' => 'required',
                    'basic_description' => 'required',
                    'standard_description' => 'required',
                    'premium_description' => 'required',
                    'basic_delivery' => 'required',
                    'standard_delivery' => 'required',
                    'premium_delivery' => 'required',
                    'basic_price' => 'required',
                    'standard_price' => 'required',
                    'premium_price' => 'required',
                );
                $validator = Validator::make($input, $rules);
            } elseif ($input['stepcnt'] == 3) {
                $rules = array(
                    'description' => 'required',
                );
                $validator = Validator::make($input, $rules);
            } elseif ($input['stepcnt'] == 4) {
                $rules = array(
                    'reqdescription' => 'required',
                );
                $validator = Validator::make($input, $rules);
            }
//            elseif ($input['stepcnt'] == 5) {
//                $rules = array(
//                    'youtube_url' => 'required',
//                );
//                $validator = Validator::make($input, $rules);
//            }

            if ($validator->fails()) {

                return response()->json(['errors' => $validator->errors()->all()]);
                //return Redirect::to('/admin/gigs/create')->withErrors($validator)->withInput();
            } else {

                $skillsArray = array();
                if (isset($input['tags'])) {
                    foreach ($input['tags'] as $skikllist) {
                        $skillinfo = Skill::where('name', $skikllist)->first();

                        if ($skillinfo && $skillinfo->id) {
                            $skillsArray[] = $skillinfo->id;
                        } else {
                            $serialisedSkillData = array();
                            $serialisedSkillData['name'] = $skikllist;
                            $serialisedSkillData['status'] = 0;
                            $serialisedSkillData['user_id'] = $user_id;
                            $serialisedSkillData['slug'] = $this->createSlug($skikllist, 'skills');
                            $skillsArray[] = Skill::insertGetId($serialisedSkillData);
                        }
                    }
                }

                $serialisedData = $this->serialiseFormData($input);

                if (!empty(array_filter($skillsArray))) {
                    $serialisedData['tags'] = implode(',', $skillsArray);
                } else {
                    $serialisedData['tags'] = '';
                }

                if ($serialisedData['stepcnt'] == 6) {
                    $serialisedData['status'] = 1;
                }

                $currentstepcount = $serialisedData['stepcnt'];
                unset($serialisedData['stepcnt']);
                unset($serialisedData['isdocupload']);
                unset($serialisedData['isdocsupload']);

                //For faq
                if (isset($serialisedData['question'])) {
                    $questionarr = $serialisedData['question'];

                    unset($serialisedData['question']);
                }
                if (isset($serialisedData['answer'])) {
                    $answerarr = $serialisedData['answer'];
                    unset($serialisedData['answer']);
                }

                //For extra
                if (isset($serialisedData['exttitle'])) {
                    $exttitlearr = $serialisedData['exttitle'];
                    unset($serialisedData['exttitle']);
                }
                if (isset($serialisedData['extdescription'])) {
                    $extdescriptionarr = $serialisedData['extdescription'];
                    unset($serialisedData['extdescription']);
                }
                if (isset($serialisedData['extdelivery'])) {
                    $extdeliveryarr = $serialisedData['extdelivery'];
                    unset($serialisedData['extdelivery']);
                }
                if (isset($serialisedData['extprice'])) {
                    $extpricearr = $serialisedData['extprice'];
                    unset($serialisedData['extprice']);
                }



                //For requirement
                if (isset($serialisedData['reqdescription'])) {
                    $requirementarr = $serialisedData['reqdescription'];
                    unset($serialisedData['reqdescription']);
                }
                if (isset($serialisedData['is_mandatory'])) {
                    $reqmandatoryarr = $serialisedData['is_mandatory'];
                    unset($serialisedData['is_mandatory']);
                }
//echo "<pre>"; print_r($serialisedData);
//                
//                //For image
                if (isset($serialisedData['files_name'])) {
                    $filearr = $serialisedData['files_name'];
                    unset($serialisedData['files_name']);
                }
                if (isset($serialisedData['image'])) {
                    $imgarr = $serialisedData['image'];
                    unset($serialisedData['image']);
                }
                if (isset($serialisedData['image_id'])) {
                    $imgidarr = $serialisedData['image_id'];
                    unset($serialisedData['image_id']);
                }
                if (isset($serialisedData['old_image'])) {
                    $oldimgarr = $serialisedData['old_image'];
                    unset($serialisedData['old_image']);
                }

                //echo "<pre>"; print_r($serialisedData);exit;
//                Gig::insert($serialisedData); 
                Gig::where('id', $recordInfo->id)->update($serialisedData);

                if ($currentstepcount == 2) {
                    Gigextra::where('gig_id', $recordInfo->id)->delete();
                    if (!empty($exttitlearr)) {
                        $i = 0;
                        foreach ($exttitlearr as $key => $gigextra) {
                            $i = $i + 1;
                            $serialisedExtData = array();
                            $serialisedExtData['gig_id'] = $recordInfo->id;
                            $serialisedExtData['user_id'] = $user_id;
                            $eslug = $this->createSlug('extra' . $recordInfo->id . $i, 'gigextras');
                            $serialisedExtData['slug'] = $eslug;
                            $serialisedExtData['title'] = $gigextra;
                            $serialisedExtData['description'] = $extdescriptionarr[$key];
                            $serialisedExtData['price'] = $extpricearr[$key];
                            $serialisedExtData['delivery'] = $extdeliveryarr[$key];
                            $serialisedExtData['status'] = 1;
                            Gigextra::insert($serialisedExtData);
                        }
                    }
                }

                if ($currentstepcount == 3) {

                    //delete all gig first
                    Gigfaq::where('gig_id', $recordInfo->id)->delete();

                    //create new gigs
                    if (!empty($questionarr)) {
                        $i = 0;
                        $answerdata = $answerarr;
                        foreach ($questionarr as $key => $gigfaqquestion) {
                            $i = $i + 1;
                            $serialisedFaqData = array();
                            $serialisedFaqData['gig_id'] = $recordInfo->id;
                            $serialisedFaqData['user_id'] = $user_id;
                            $fslug = $this->createSlug('question' . $recordInfo->id . $i, 'gigfaqs');
                            $serialisedFaqData['slug'] = $fslug;
                            $serialisedFaqData['question'] = $gigfaqquestion;
                            $serialisedFaqData['answer'] = $answerdata[$key];
                            $serialisedFaqData['status'] = 1;
                            Gigfaq::insert($serialisedFaqData);
                        }
                    }
                }
                if ($currentstepcount == 4) {
                    Gigrequirement::where('gig_id', $recordInfo->id)->delete();
                    if (!empty($requirementarr)) {
                        $i = 0;
                        foreach ($requirementarr as $key => $gigrequire) {
                            $i = $i + 1;
                            $serialisedReqData = array();
                            $serialisedReqData['gig_id'] = $recordInfo->id;
                            $serialisedReqData['user_id'] = $user_id;
                            $rslug = $this->createSlug('requirement' . $recordInfo->id . $i, 'gigrequirements');
                            $serialisedReqData['slug'] = $rslug;
                            $serialisedReqData['description'] = $gigrequire;
                            if (isset($reqmandatoryarr[$key]) && $reqmandatoryarr[$key] == 1) {
                                $serialisedReqData['is_mandatory'] = 1;
                            } else {
                                $serialisedReqData['is_mandatory'] = 0;
                            }
                            $serialisedReqData['status'] = 1;
                            Gigrequirement::insert($serialisedReqData);
                        }
                    }
                }
                if ($currentstepcount == 5) {
                    if (isset($imgarr)) {
                        foreach ($imgarr as $key => $img) {
                            $serialisedImgData = array();
                            if ($img->getClientOriginalName()) {
                                $file = $img;
                                $uploadedFileName = $this->uploadImage($file,GIG_FULL_UPLOAD_PATH);
                                $this->resizeImage($uploadedFileName, GIG_FULL_UPLOAD_PATH, GIG_SMALL_UPLOAD_PATH, GIG_MW, GIG_MH);
                                if (isset($oldimgarr[$key])) {
                                    $old_image = $oldimgarr[$key];
                                    if ($old_image) {
                                        @unlink(GIG_FULL_UPLOAD_PATH . $old_image);
                                        @unlink(GIG_SMALL_UPLOAD_PATH . $old_image);
                                    }
                                }
                            }
                            $serialisedImgData['gig_id'] = $recordInfo->id;
                            $serialisedImgData['name'] = $uploadedFileName;
                            $serialisedImgData['status'] = 1;
                            $serialisedImgData['main'] = 0;

                            if (isset($imgidarr[$key])) {
                                $isimage = Image::where('id', $imgidarr[$key])->first();
                                if($isimage){
                                    Image::where('id', $imgidarr[$key])->update($serialisedImgData);
                                }else{
                                    Image::insert($serialisedImgData);
                                } 
                            } else {
                                Image::insert($serialisedImgData);
                            }
                        }
                    }

                    if (isset($filearr)) {
                        $serialisedFileData = array();
                        if ($img->getClientOriginalName()) {
                            $file = $img;
                            $uploadedFileName = $this->uploadImage($file, GIG_FULL_UPLOAD_PATH);
                            $this->resizeImage($uploadedFileName, GIG_FULL_UPLOAD_PATH, GIG_SMALL_UPLOAD_PATH, GIG_MW, GIG_MH);
                            if (isset($oldimgarr[$key])) {
                                $old_image = $oldimgarr[$key];
                                if ($old_image) {
                                    @unlink(GIG_FULL_UPLOAD_PATH . $old_image);
                                    @unlink(GIG_SMALL_UPLOAD_PATH . $old_image);
                                }
                            }
                        }
                        $serialisedImgData['gig_id'] = $recordInfo->id;
                        $serialisedImgData['name'] = $uploadedFileName;
                        $serialisedImgData['status'] = 1;
                        $serialisedImgData['main'] = 0;

                        if (isset($imgidarr[$key])) {
                            Image::where('id', $imgidarr[$key])->update($serialisedImgData);
                        } else {
                            Image::insert($serialisedImgData);
                        }
                    }

                    $mygigs = DB::table('gigs')->where(['id' => $recordInfo->id])->first();
                    if ($mygigs->youtube_url) {
                        $gigimgname = \App\Models\Gig::video_image($mygigs->youtube_url);
                        $imgName = 'gig' . $mygigs->id . '.jpg';
                        $img = GIG_FULL_UPLOAD_PATH . $imgName;
                        file_put_contents($img, file_get_contents($gigimgname));
                        DB::table('gigs')->where('id', $mygigs->id)->update(array('youtube_image' => $imgName));
                    }
                }


                if ($currentstepcount == 6) {
                    Session::flash('success_message', "Gig details saved successfully.");
                    return Redirect::to('gigs/' . $recordInfo->slug);
                } else {
                    return response()->json(['errors' => '', 'status' => 1, 'message' => ["Detail saved!"], 'gigslug' => [$recordInfo->slug]]);
                }
                // exit;
                //return json_encode(array('status'=>1,'message'=>"Detail saved!",'gigslug'=> $recordInfo->slug));
                exit;
            }
        }
//        echo "<pre>";print_r($recordInfo);exit;
        return view('gigs.edit', ['title' => $pageTitle, 'catList' => $catList, 'subCatList' => $subCatList, 'skills' => $skills, 'gigDetail' => $recordInfo, 'recordExtInfo' => $recordExtInfo, 'recordFaqInfo' => $recordFaqInfo, 'recordReqInfo' => $recordReqInfo, 'recordImgInfo' => $recordImgInfo, 'recordPdfInfo' => $recordPdfInfo]);
    }

    public function getsubcategorylist($id = null) {
        if ($id && $id > 0) {
            $subCatList = Category::getSubCategoryList($id);
            return view('elements.subcategorylist', ['subCatList' => $subCatList]);
        } else {
            return view('elements.subcategorylist', ['subCatList' => array()]);
        }
    }

    public function add() {
        $pageTitle = 'Manage Gigs';
        return view('gigs.add', ['title' => $pageTitle]);
    }

    public function management(Request $request) {
        $pageTitle = 'Manage Gigs';
        $query = new Gig();

        $userdata = DB::table('users')->where(['id' => Session::get('user_id')])->first();
        
        $query = $query->where('user_id', '=', Session::get('user_id'));
        $query = $query->whereNull('type_gig');
        
        if ($request->has('pause')) {
            $pause = $request->get('pause');
            if($request->has('id_fil')){
//                echo $request->get('id_fil');
//                exit;
                    
                unset($pause[$request->get('id_fil')]);
                
            }
            DB::table('gigs')->where('user_id', Session::get('user_id'))->update(array('pause' => 0));
            
            foreach($pause as $key=>$value){
                DB::table('gigs')->where('id', $key)->update(array('pause' => $value));
            }
        } 
        // echo $request->get('hide_weekend');
        // echo $request->get('accept_orders');
        if ($request->has('hide_weekend')) {
            if ($request->has('hide_week')) {
                $hide_weekend = $request->get('hide_week');
                DB::table('users')->where('id', Session::get('user_id'))->update(array('hide_weekend' => $hide_weekend));
            } else {
                $hide_weekend = 0;
                DB::table('users')->where('id', Session::get('user_id'))->update(array('hide_weekend' => 0));
            }
        } else {
            $hide_weekend = 0;
        }
        if ($request->has('accept_orders')) {
            $accept_orders = $request->get('accept_orders');
            DB::table('users')->where('id', Session::get('user_id'))->update(array('accept_orders'=>$accept_orders));
        } else {
            $accept_orders = 0;
        }
//        if ($request->has('category_id') && $request->get('category_id') > 0) {
//            $query = $query->where('category_id', $request->get('category_id'));
//        }
        if ($request->has('page')) {
            $page = $request->get('page');
        } else {
            $page = 1;
        }
        if ($page == 1) {
            $limit = 9999;
        } else {
            $limit = 10000;
        }
        //$allrecords = $query->orderBy('id', 'DESC')->paginate($limit, ['*'], 'page', $page);
        $allrecords = $query->orderBy('id', 'DESC')->get();
        if ($request->ajax()) {
            return view('elements.gigs.management', ['allrecords' => $allrecords, 'page' => $page, 'userdata'=>$userdata, 'limit' => $limit]);
        }
        //echo "<pre>"; print_r($allrecords);exit;
        $catList = Category::getCategoryList();
        return view('gigs.management', ['title' => $pageTitle, 'allrecords' => $allrecords, 'catList' => $catList, 'userdata'=>$userdata, 'page' => $page, 'limit' => $limit]);
    }

    public function uploaddocument() {
        $msgString = "";
        $input = Input::all();
        $user_id = Session::get('user_id');
        if (!empty($input)) {
//            echo "<pre>"; print_r($input);exit;
            $rules = array(
                'files_name' => 'mimes:doc,docx,pdf',
            );

            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {

                return response()->json(['errors' => $validator->errors()->all()]);
                //return Redirect::to('/admin/gigs/create')->withErrors($validator)->withInput();
            } else {

                $files = explode(',', $input['pdf_doc']);
                if (Input::hasFile('files_name')) {
                    $file = Input::file('files_name');
                    $uploadedFileName = $this->uploadImage($file, GIG_DOC_FULL_UPLOAD_PATH);
                    $rand = rand(100, 999);
                    $html = '<li id="' . $rand . '" data-img="' . $uploadedFileName . '" class="portfolio-cc">' . $uploadedFileName . '<a href="#" onclick="deletefile(' . $rand . ')" class="delete"><i class="fa fa-trash-o"></i></a></li>';
                    $files[] = $uploadedFileName;
                }
                return response()->json(['errors' => '', 'status' => 1, 'message' => ["Gig document is successfully uploaded."], 'file_name' => [$html], 'json_data' => [implode(',', $files)]]);
            }
        }
        exit;
    }
    
    public function uploaddoc() {

        $msgString = "";
        $input = Input::all();
        $user_id = Session::get('user_id');
        if (!empty($input)) {
            $rules = array(
                //'files_name' => 'mimes:doc,docx,pdf',
            );
            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            } else {
                $files = explode(',', $input['document']);
                if (Input::hasFile('doc_name')) {
                    $file = Input::file('doc_name');
                    $uploadedFileName = $this->uploadImage($file, GIG_DOC_FULL_UPLOAD_PATH);
                    $rand = rand(100, 999);
                    $html = '<li id="' . $rand . '" data-img="' . $uploadedFileName . '" class="portfolio-cc">' . $uploadedFileName . '<a href="#" onclick="deletefile(' . $rand . ')" class="delete"><i class="fa fa-trash-o"></i></a></li>';
                    $files = $uploadedFileName;
                }
                return response()->json(['errors' => '', 'status' => 1, 'message' => ["Gig document is successfully uploaded."], 'file_name' => [$html], 'json_data' => [$files]]);
            }
        }
        exit;
    }

    public function delete($slug = null) {
        if ($slug) {
            Gig::where('slug', $slug)->delete();
            Session::flash('success_message', "Gig deleted successfully.");
            return Redirect::to('gigs/management');
        }
    }

    public function deleteimage($id = null) {
        if ($id) {
            Image::where('id', $id)->delete();
            exit;
        }
    }

    public function listing(Request $request, $catslug = null, $subcatslug = null) {
        $pageTitle = 'View Gigs';
        $query = new Gig();
        $query = $query->with('User');
        $query = $query->where('status', 1);
        $query = $query->where('basic_price', '!=', 0);
        $query = $query->where('pause', 1);
        $query = $query->whereNull('type_gig');
         
        
        $avlusers = [];
        
        $weekDay = date('w');
        if($weekDay == 0 || $weekDay == 6){
            $avl = DB::table('users')->where('hide_weekend', '=', 0)->where('accept_orders', '=', 1)->get()->toArray();
        }else{
            $avl = DB::table('users')->where('accept_orders', '=', 1)->get()->toArray();
        }
        
        foreach ($avl as $key) {
            array_push($avlusers, $key->id);
        }
        
        $str = implode(',', $avlusers);
        $query = $query->whereIn('user_id', explode(",", $str)); 
        $mysavegigs = $this->getSavedGigs();
        $olftitle = '';
        $catInfo = array();
       
        if ($catslug) {
            $catInfo = Category::where('slug', $catslug)->first();
            if (empty($catInfo)) {
                return Redirect::to('gigs');
            } else {
                $category_id = $catInfo->id;
                $query = $query->where('category_id', $catInfo->id);
            }
        }   
        //echo '<pre>';print_r($catInfo);exit;

        $subCatInfo = array();
        if ($subcatslug) {
            $subCatInfo = Category::where('slug', $subcatslug)->first();
            if (empty($subCatInfo)) {
                return Redirect::to('gigs/' . $catslug);
            } else {
                $subcategory_id = $subCatInfo->id;
                $query = $query->where('subcategory_id', $subCatInfo->id);
            }
        } else 
        if ($request->has('subcategory_id') && $request->get('subcategory_id') > 0) {
            $query = $query->where('subcategory_id', $request->get('subcategory_id'));
        }
        if ($request->has('title') && $request->get('title') != '') {
            $olftitle = $request->get('title');
           // $query = $query->where('title', 'like', '%' . $request->get('title') . '%');
            /*$query = $query->whereHas('Category', function($qc) use($request) {
                $qc = $qc->where('id', '>', 0)
                ->where('name', 'like', '%' . $request->get('title') . '%')
                ->orWhere('gigs.title', 'like', '%' . $request->get('title') . '%')
                ;
            });*/
            
            $avlskills = [];
            $getskill_ids = DB::table('skills')->select('id')->where('name', 'like', '%' . $request->get('title') . '%')->get();
            foreach ($getskill_ids as $key) {
                array_push($avlskills, $key->id);
            }
            
           if (count($getskill_ids) > 0) { 
                //$langaugeArray = $request->get('langauge');
                $query = $query->where(function($q) use ($getskill_ids, $request) {
                    
                    
                        foreach ($getskill_ids as $skill_id) {
                            //$q = $q->orWhere('languages', 'like', '%' . $langn . '%');
                            $q = $q->whereRaw("FIND_IN_SET('".$skill_id->id."', tags)");
                            $q->orWhereHas('Category', function($qc) use($request) {
                $qc = $qc->where('id', '>', 0)
                ->where('name', 'like', '%' . $request->get('title') . '%')
                ->orWhere('gigs.title', 'like', '%' . $request->get('title') . '%')
                ;
            });
                        }
                    
                });
                
            }else{
                $query = $query
                ->whereHas('Category', function($qc) use($request) {
                    $qc = $qc->where('name', 'like', '%' . $request->get('title') . '%')
                    ->orWhere('gigs.title', 'like', '%' . $request->get('title') . '%')
                    ;
                });
            }
                
                
            }else{
                $query = $query->whereHas('Category', function($qc) {
                    $qc = $qc->where('id', '>', 0);
                });
            }
        
        
        
        
        
        
        
        if ($request->has('price_min') && $request->get('price_min') != '') {
            $query = $query->where('basic_price', '>=', $request->get('price_min'));
        }
        if ($request->has('price_max') && $request->get('price_max') != '') {
            $query = $query->where('basic_price', '<=', $request->get('price_max'));
        }
        if ($request->has('delivery_time') && $request->get('delivery_time') > 0) {
            $query = $query->where('basic_delivery', '<=', $request->get('delivery_time'));
        }
        if ($request->has('deltime') && $request->get('deltime') > 0) {
            $query = $query->where('basic_delivery', '<=', $request->get('deltime'));
        }
        if ($request->has('langauge') && $request->get('langauge') != '') {
            $langaugeArray = $request->get('langauge');
            $query = $query->whereHas('User', function($q) use ($langaugeArray) {
                $first = array_shift($langaugeArray);
                $q = $q->where('languages', 'like', '%' . $first . '%');
                if (count($langaugeArray) > 0) {
                    foreach ($langaugeArray as $langn) {
                        $q = $q->orWhere('languages', 'like', '%' . $langn . '%');
                    }
                }
            });  
        }
        if ($request->has('langg') && $request->get('langg') != '') {
            $langaugeArray = $request->get('langg');
            $query = $query->whereHas('User', function($q) use ($langaugeArray) {
                $first = ($langaugeArray);
                $q = $q->where('languages', 'like', '%' . $first . '%');
                if (($langaugeArray) > 0) {
                    foreach ($langaugeArray as $langn) {
                        $q = $q->orWhere('languages', 'like', '%' . $langn . '%');
                    }
                }
            }); 
        }
        if ($request->has('country_id') && $request->get('country_id') > 0) {
            $country_id = $request->get('country_id');
            $query = $query->whereHas('User', function($q) use ($country_id) {
                $q->where('country_id', $country_id);
            });
        }
        if ($request->has('country') && $request->get('country') > 0) {
           
            $country_id = $request->get('country');
            $query = $query->whereHas('User', function($q) use ($country_id) {
                $q->where('country_id', $country_id);
            });
        }
        if ($request->has('categories') && $request->get('categories') != ''){
            $categories_id = $request->get('categories');
            $q = Gig::where('subcategory_id',$categories_id)->first(); 
            $query = $query->whereHas('Category', function($q) use ($categories_id){
                $q->where('subcategory_id', $categories_id);
            });
        }
        if ($request->has('allcategories') && $request->get('allcategories') != ''){
            $allcategories_id = $request->get('allcategories');
            $q = Gig::where('category_id',$allcategories_id)->first(); 
            $query = $query->whereHas('Category', function($q) use ($allcategories_id){
                $q->where('category_id', $allcategories_id);
            });
        }

        if ($request->has('seller_status') && $request->get('seller_status') != ''){
            $seller_status = $request->get('seller_status');
            $q = User::where('user_status',$seller_status)->first(); 
            $query = $query->whereHas('User', function($q) use ($seller_status){
                $q->where('user_status', $seller_status);
            });
        }
        
        $filter_type = 0;
        if ($request->has('filter_type') && $request->get('filter_type') > 0) {
            $filter_type = $request->get('filter_type');
        }
        switch ($filter_type) {
            case 1:
                $query = $query->orderBy('basic_price', 'ASC');
                break;
            case 2:
                $query = $query->orderBy('basic_price', 'DESC');
                break;
            case 3:
                $query = $query->orderBy('id', 'DESC');
                break;
            case 4:
                $query = $query->orderBy('id', 'ASC');
                break;
            default:
                $query = $query->orderBy('basic_price', 'ASC');
        }

        if ($request->has('page')) {
            $page = $request->get('page');
        } else {
            $page = 1;
        }

        $limit = 16;

        $allrecords = $query->paginate($limit, ['*'], 'page', $page);      
//        echo '<pre>';print_r($allrecords);exit;
        if ($request->ajax()) {
            return view('elements.gigs.listing', ['allrecords' => $allrecords, 'page' => $page, 'mysavegigs' => $mysavegigs, 'isajax' => 1]);
        }

//        if($request->ajax()){
//            return view('elements.gigs.listing', ['allrecords'=>$allrecords, 'mysavegigs'=>$mysavegigs]);
//        }

        $catListSlugs = array();
        if (isset($subcategory_id) && $subcategory_id > 0) {
            $catList = Category::getSubCategoryList($category_id);

            $gigcatlist = DB::table('gigs')
                            ->select('subcategory_id', DB::raw('count(*) as total'))
                            ->where('subcategory_id', $subcategory_id)
                            ->where('category_id', $category_id)
                            ->where('basic_price', '!=', 0)
                            ->where('status', 1)
                    ->where('pause', 1)
                            ->whereNull('type_gig')
                            ->groupBy('subcategory_id')
                            ->pluck('total', 'subcategory_id')->all();
        } elseif (isset($category_id) && $category_id > 0) {
            $catList = Category::getSubCategoryList($category_id);
            $gigcatlist = DB::table('gigs')
                            ->select('subcategory_id', DB::raw('count(*) as total'))
                            ->where('category_id', $category_id)
                            ->where('basic_price', '!=', 0)
                            ->where('status', 1)
                    ->where('pause', 1)
                            ->whereNull('type_gig')
                            ->groupBy('subcategory_id')
                            ->pluck('total', 'subcategory_id')->all();
        } else {
            $catListSlugs = Category::where(['status' => 1, 'parent_id' => 0])->orderBy('name', 'ASC')->pluck('slug', 'id')->all();
            $catList = Category::getCategoryList();
            $gigcatlist = DB::table('gigs')
                            ->select('category_id', DB::raw('count(*) as total'))
                            ->join('categories', 'gigs.category_id', '=', 'categories.id')
                            ->where('basic_price', '!=', 0)
                            ->where('gigs.status', 1)
                    ->where('pause', 1)
                            ->whereNull('type_gig')
                            ->groupBy('category_id')
                            ->pluck('total', 'category_id')->all();
        }
       
        //print_r($catList);exit;
        $countryLists = DB::table('countries')->where('status', 1)->orderBy('name', 'ASC')->pluck('name', 'id')->all();
        if (!session()->has('user_id')){
            $subcategories = DB::table('categories')->where(['status'=>1])->where('parent_id',  $category_id)->select(['id','parent_id','name'])->get(); 
            
            return view('gigs.listing', ['title' => $pageTitle, 'allrecords' => $allrecords, 'catList' => $catList, 'gigcatlist' => $gigcatlist, 'page' => $page, 'limit' => $limit, 'countryLists' => $countryLists, 'catInfo' => $catInfo, 'subCatInfo' => $subCatInfo, 'catListSlugs' => $catListSlugs, 'mysavegigs' => $mysavegigs, 'olftitle' => $olftitle,'subcategories' => $subcategories]);
         }else{  
            $categories = Db::table('categories')->where(['parent_id'=>0])->select(['id','parent_id','name'])->get();
          
            return view('gigs.listing', ['title' => $pageTitle, 'allrecords' => $allrecords, 'catList' => $catList, 'gigcatlist' => $gigcatlist, 'page' => $page, 'limit' => $limit, 'countryLists' => $countryLists, 'catInfo' => $catInfo, 'subCatInfo' => $subCatInfo, 'catListSlugs' => $catListSlugs, 'mysavegigs' => $mysavegigs, 'olftitle' => $olftitle, 'categories' => $categories]);
         }
    }

    public function listing1(Request $request, $catslug = null, $subcatslug = null) {
        $pageTitle = 'View Gigs';

        $query = new Gig();
        $query = $query->with('User');
        $query = $query->where('status', 1);
        $query = $query->where('basic_price', '!=', 0);
        $query = $query->where('pause', 1);
        $query = $query->whereNull('type_gig');
          
        $avlusers = [];
        
        $weekDay = date('w');
        if($weekDay == 0 || $weekDay == 6){
            $avl = DB::table('users')->where('hide_weekend', '=', 0)->where('accept_orders', '=', 1)->get()->toArray();
        }else{
            $avl = DB::table('users')->where('accept_orders', '=', 1)->get()->toArray();
        }
        
        foreach ($avl as $key) {
            array_push($avlusers, $key->id);
        }
        
        $str = implode(',', $avlusers);
        $query = $query->whereIn('user_id', explode(",", $str)); 

        $mysavegigs = $this->getSavedGigs();
        $olftitle = '';
        $catInfo = array();
        if ($catslug) {
            $catInfo = Category::where('slug', $catslug)->first();
            if (empty($catInfo)) {
                return Redirect::to('gigs');
            } else {
                $category_id = $catInfo->id;
                $query = $query->where('category_id', $catInfo->id);
            }
        }
        //echo '<pre>';print_r($catInfo);exit;

        $subCatInfo = array();
        if ($subcatslug) {
            $subCatInfo = Category::where('slug', $subcatslug)->first();
            if (empty($subCatInfo)) {
                return Redirect::to('gigs/' . $catslug);
            } else {
                $subcategory_id = $subCatInfo->id;
                $query = $query->where('subcategory_id', $subCatInfo->id);
            }
        } else

        if ($request->has('subcategory_id') && $request->get('subcategory_id') > 0) {
            $query = $query->where('subcategory_id', $request->get('subcategory_id'));
        }
        if ($request->has('title') && $request->get('title') != '') {
            $olftitle = $request->get('title');
           // $query = $query->where('title', 'like', '%' . $request->get('title') . '%');
            /*$query = $query->whereHas('Category', function($qc) use($request) {
                $qc = $qc->where('id', '>', 0)
                ->where('name', 'like', '%' . $request->get('title') . '%')
                ->orWhere('gigs.title', 'like', '%' . $request->get('title') . '%')
                ;
            });*/
            
            
            $avlskills = [];
            $getskill_ids = DB::table('skills')->select('id')->where('name', 'like', '%' . $request->get('title') . '%')->get();
            foreach ($getskill_ids as $key) {
                array_push($avlskills, $key->id);
            }
            
           if (count($getskill_ids) > 0) { 
                //$langaugeArray = $request->get('langauge');
                $query = $query->where(function($q) use ($getskill_ids, $request) {
                    
                    
                        foreach ($getskill_ids as $skill_id) {
                            //$q = $q->orWhere('languages', 'like', '%' . $langn . '%');
                            $q = $q->whereRaw("FIND_IN_SET('".$skill_id->id."', tags)");
                            $q->orWhereHas('Category', function($qc) use($request) {
                $qc = $qc->where('id', '>', 0)
                ->where('name', 'like', '%' . $request->get('title') . '%')
                ->orWhere('gigs.title', 'like', '%' . $request->get('title') . '%')
                ;
            });
                        }
                    
                });
                
            }else{
                $query = $query
                ->whereHas('Category', function($qc) use($request) {
                    $qc = $qc->where('name', 'like', '%' . $request->get('title') . '%')
                    ->orWhere('gigs.title', 'like', '%' . $request->get('title') . '%')
                    ;
                });
            }
                
                
            }else{
                $query = $query->whereHas('Category', function($qc) {
                    $qc = $qc->where('id', '>', 0);
                });
            }
               
        if ($request->has('price_min') && $request->get('price_min') != '') {
            $query = $query->where('basic_price', '>=', $request->get('price_min'));
        }
        if ($request->has('price_max') && $request->get('price_max') != '') {
            $query = $query->where('basic_price', '<=', $request->get('price_max'));
        }
        if ($request->has('delivery_time') && $request->get('delivery_time') > 0) {
            $query = $query->where('basic_delivery', '<=', $request->get('delivery_time'));
        }
        if ($request->has('langauge') && $request->get('langauge') != '') {
            $langaugeArray = $request->get('langauge');
            $query = $query->whereHas('User', function($q) use ($langaugeArray) {
                $first = array_shift($langaugeArray);
                $q = $q->where('languages', 'like', '%' . $first . '%');
                if (count($langaugeArray) > 0) {
                    foreach ($langaugeArray as $langn) {
                        $q = $q->orWhere('languages', 'like', '%' . $langn . '%');
                    }
                }
            });
        }

        if ($request->has('country_id') && $request->get('country_id') > 0) {
            $country_id = $request->get('country_id');
            $query = $query->whereHas('User', function($q) use ($country_id) {
                $q->where('country_id', $country_id);
            });
        }
        
        $filter_type = 0;
        if ($request->has('filter_type') && $request->get('filter_type') > 0) {
            $filter_type = $request->get('filter_type');
        }
        switch ($filter_type) {
            case 1:
                $query = $query->orderBy('basic_price', 'ASC');
                break;
            case 2:
                $query = $query->orderBy('basic_price', 'DESC');
                break;
            case 3:
                $query = $query->orderBy('id', 'DESC');
                break;
            case 4:
                $query = $query->orderBy('id', 'ASC');
                break;
            default:
                $query = $query->orderBy('basic_price', 'ASC');
        }

        if ($request->has('page')) {
            $page = $request->get('page');
        } else {
            $page = 1;
        }

        $limit = 16;

        $allrecords = $query->paginate($limit, ['*'], 'page', $page);
//        echo '<pre>';print_r($allrecords);exit;
        if ($request->ajax()) {
            return view('elements.gigs.listing', ['allrecords' => $allrecords, 'page' => $page, 'mysavegigs' => $mysavegigs, 'isajax' => 1]);
        }

//        if($request->ajax()){
//            return view('elements.gigs.listing', ['allrecords'=>$allrecords, 'mysavegigs'=>$mysavegigs]);
//        }

        $catListSlugs = array();
        if (isset($subcategory_id) && $subcategory_id > 0) {

            $catList = Category::getSubCategoryList($category_id);

            $gigcatlist = DB::table('gigs')
                            ->select('subcategory_id', DB::raw('count(*) as total'))
                            ->where('subcategory_id', $subcategory_id)
                            ->where('category_id', $category_id)
                            ->where('basic_price', '!=', 0)
                            ->where('status', 1)
                    ->where('pause', 1)
                            ->whereNull('type_gig')
                            ->groupBy('subcategory_id')
                            ->pluck('total', 'subcategory_id')->all();
        } elseif (isset($category_id) && $category_id > 0) {
            $catList = Category::getSubCategoryList($category_id);
            $gigcatlist = DB::table('gigs')
                            ->select('subcategory_id', DB::raw('count(*) as total'))
                            ->where('category_id', $category_id)
                            ->where('basic_price', '!=', 0)
                            ->where('status', 1)
                    ->where('pause', 1)
                            ->whereNull('type_gig')
                            ->groupBy('subcategory_id')
                            ->pluck('total', 'subcategory_id')->all();
        } else {
            $catListSlugs = Category::where(['status' => 1, 'parent_id' => 0])->orderBy('name', 'ASC')->pluck('slug', 'id')->all();
            $catList = Category::getCategoryList();
            $gigcatlist = DB::table('gigs')
                            ->select('category_id', DB::raw('count(*) as total'))
                            ->join('categories', 'gigs.category_id', '=', 'categories.id')
                            ->where('basic_price', '!=', 0)
                            ->where('gigs.status', 1)
                    ->where('pause', 1)
                            ->whereNull('type_gig')
                            ->groupBy('category_id')
                            ->pluck('total', 'category_id')->all();
        }
        //print_r($catList);exit;
        $countryLists = DB::table('countries')->where('status', 1)->orderBy('name', 'ASC')->pluck('name', 'id')->all();

        return view('gigs.listing', ['title' => $pageTitle, 'allrecords' => $allrecords, 'catList' => $catList, 'gigcatlist' => $gigcatlist, 'page' => $page, 'limit' => $limit, 'countryLists' => $countryLists, 'catInfo' => $catInfo, 'subCatInfo' => $subCatInfo, 'catListSlugs' => $catListSlugs, 'mysavegigs' => $mysavegigs, 'olftitle' => $olftitle]);
    }

    public function getkeyword(Request $request) {
     
        //echo 1;exit;
        $pageTitle = 'View Gigs';
        //$query = new Searchkeyword();
        $query1 = '';
        $query2 = '';
        $limit = 6;
        $remining_keyword = $limit;
        $count = 0;
        $searchkeywords = array();
        $skills = array();
        $gigextras = array();
        $categories = array();

        if ($request->has('keyword') && $request->get('keyword') != '') {
            $keyword = $request->get('keyword');
            //$searchkeywords = Searchkeyword::where('search_title', 'like', '%' . $request->get('keyword') . '%')->orderBy('search_title', 'ASC')->pluck('search_title', 'id')->take($remining_keyword)->all();
            //$remining_keyword = $remining_keyword- count($searchkeywords);
            if (Session::get('locale') == 'ru') {
                if ($remining_keyword > 0) {
                    $skills = Skill::where('name_ru', 'like', '%' . $request->get('keyword') . '%')->orderBy('name_ru', 'ASC')->pluck('name_ru', 'id')->take($remining_keyword)->all();

                    $remining_keyword = $remining_keyword - count($skills);
                }
                if ($remining_keyword > 0) {
                    $categories = Category::where('name_ru', 'like', '%' . $request->get('keyword') . '%')->orderBy('name_ru', 'ASC')->pluck('name_ru', 'id')->take($remining_keyword)->all();
                    $remining_keyword = $remining_keyword - count($categories);
                }

                if ($remining_keyword > 0) {
                    $gigextras = Gigextra::where('title', 'like', '%' . $request->get('keyword') . '%')->orderBy('title', 'ASC')->pluck('title', 'id')->take($remining_keyword)->all();

                    $remining_keyword = $remining_keyword - count($gigextras);
                }
            } else {
                $lSelect = 'English';
                if ($remining_keyword > 0) {
                    $skills = Skill::where('name', 'like', '%' . $request->get('keyword') . '%')->orderBy('name', 'ASC')->pluck('name', 'id')->take($remining_keyword)->all();

                    $remining_keyword = $remining_keyword - count($skills);
                }

                if ($remining_keyword > 0) {
                    $categories = Category::where('name', 'like', '%' . $request->get('keyword') . '%')->orderBy('name', 'ASC')->pluck('name', 'id')->take($remining_keyword)->all();

                    $remining_keyword = $remining_keyword - count($categories);
                }

                if ($remining_keyword > 0) {
                    $gigextras = Gigextra::where('title', 'like', '%' . $request->get('keyword') . '%')->orderBy('title', 'ASC')->pluck('title', 'id')->take($remining_keyword)->all();

                    $remining_keyword = $remining_keyword - count($gigextras);
                }
            }
            $query1 = DB::table('users')->select('first_name', 'last_name', 'slug')->where(DB::raw('CONCAT(first_name," ",last_name)'), 'like', "%{$keyword}%")->limit(4)->get();
            $query2 = DB::table('categories')->select('name', 'home_image', 'slug')->where(DB::raw('CONCAT(name)'), 'like', "%{$keyword}%")->limit(4)->get();
           
        }

        $allrecords = array_merge($gigextras, $skills, $searchkeywords, $categories);
       
        $alluserrecords = json_decode(json_encode($query1), true);
        $allcategoriesrecords = json_decode(json_encode($query2), true);
        
        if ($request->ajax()) {
                $status = 1;
                // $data = ['keyword' => $keyword, 'allrecords' => $allrecords, 'alluserrecords' => $alluserrecords, 'isajax' => 1];
                $data = $allcategoriesrecords[0];
                  
          
            
            return response()->json([$data]);
            // return view('elements.gigs.getkeyword', ['keyword' => $keyword, 'allrecords' => $allrecords, 'alluserrecords' => $alluserrecords, 'isajax' => 1]);
        }
        exit;

        //return view('gigs.listing', ['title' => $pageTitle, 'allrecords' => $allrecords, 'loginuser' => $loginuser, 'catList' => $catList, 'gigcatlist' => $gigcatlist, 'page' => $page, 'limit' => $limit, 'countryLists' => $countryLists, 'catInfo' => $catInfo, 'subCatInfo' => $subCatInfo, 'catListSlugs' => $catListSlugs, 'mysavegigs' => $mysavegigs, 'olftitle' => $olftitle]);
    }

    public function offeredgig() {
        $pageTitle = 'Offered Gigs';


        $allrecords = Gig::where('offer_user', Session::get('user_id'))->orderBy('id', 'DESC')->get();

        return view('gigs.offeredgig', ['title' => $pageTitle, 'allrecords' => $allrecords]);
    }

    public function myofferedgig() {
        $pageTitle = 'My Offered Gigs';

        $allrecords = Gig::where('  ', Session::get('user_id'))->where('type_gig', 'offer')->orderBy('id', 'DESC')->get();

        return view('gigs.myofferedgig', ['title' => $pageTitle, 'allrecords' => $allrecords]);
    }

    public function detail(Request $request, $slug = null , $catslug = null) {
        $pageTitle = 'View Gig Detail';
        $recordInfo = Gig::where('slug', $slug)->first();
        if(isset($recordInfo->id)){
            $gigCount = DB::table('myorders')->where('gig_id', $recordInfo->id)->where('status', 1)->count();
            //echo '<pre>';print_r($recordInfo->Category);exit;
            if (empty($recordInfo)) {
                return Redirect::to('gigs/management');
            }
            $userInfo = array();
            if (isset($recordInfo->User->slug)) {
                $userInfo = User::where('slug', $recordInfo->User->slug)->first();
            }
            if (isset($recordInfo)) {             
                $gigcatlist = DB::table('gigs')
                            ->join('images', 'gigs.id', '=', 'images.gig_id')
                            ->join('users', 'gigs.user_id', '=', 'users.id')
                            ->select('gigs.*','images.name','users.*')     
                            ->get();
                            
            }

            $pageTitle = $recordInfo->title;
    
            $query = new Review();
            $query = $query->with('Myorder');
            $query = $query->where('status', 1);
    
            $gig_id = $recordInfo->id;
            $query = $query->whereHas('Myorder', function($q) use ($gig_id) {
                $q->where('gig_id', $gig_id)->where('as_a', 'seller');
            });
    
            $gigreviews = $query->orderBy('id', 'DESC')->limit(10)->get();
    
            $date1 = date('Y-m-d', strtotime("-30 days"));
            $sellingOrders = DB::table('myorders')
                    ->select('seller_id', 'id', DB::raw('sum(total_amount) as total_sum'))
                    ->where('seller_id', '=', Session::get('user_id'))
                    ->where('created_at', '>=', $date1)
                    ->get();
    
            $mysavegigs = $this->getSavedGigs();
          
            $topRatedInfo = DB::table('reviews')->where(['otheruser_id' => Session::get('user_id')])->where('rating', '>', 4)->pluck(DB::raw('count(*) as total'), 'id')->all();
        
            return view('gigs.detail', ['gigCount' => $gigCount, 'title' => $pageTitle, 'recordInfo' => $recordInfo, 'userInfo' => $userInfo, 'topRatedInfo' => $topRatedInfo, 'sellingOrders' => $sellingOrders, 'gigreviews' => $gigreviews,'gigcatlist' => $gigcatlist, 'mysavegigs' => $mysavegigs]);
        }else{
            Session::flash('error_message', "Gig not found!");
            return Redirect::to('gigs');
        }
            
    }
    public function detail1(Request $request, $slug = null) {
        $pageTitle = 'View Gig Detail';
        $recordInfo = Gig::where('slug', $slug)->first();
        if(isset($recordInfo->id)){
            $gigCount = DB::table('myorders')->where('gig_id', $recordInfo->id)->where('status', 1)->count();
            //echo '<pre>';print_r($recordInfo->Category);exit;
            if (empty($recordInfo)) {
                return Redirect::to('gigs/management');
            }
            $userInfo = array();
            if (isset($recordInfo->User->slug)) {
                $userInfo = User::where('slug', $recordInfo->User->slug)->first();
            }

   
            $pageTitle = $recordInfo->title;
    
            $query = new Review();
            $query = $query->with('Myorder');
            $query = $query->where('status', 1);
    
            $gig_id = $recordInfo->id;
            $query = $query->whereHas('Myorder', function($q) use ($gig_id) {
                $q->where('gig_id', $gig_id)->where('as_a', 'seller');
            });
    
            $gigreviews = $query->orderBy('id', 'DESC')->limit(10)->get();
    
            $date1 = date('Y-m-d', strtotime("-30 days"));
            $sellingOrders = DB::table('myorders')
                    ->select('seller_id', 'id', DB::raw('sum(total_amount) as total_sum'))
                    ->where('seller_id', '=', Session::get('user_id'))
                    ->where('created_at', '>=', $date1)
                    ->get();
    
            $topRatedInfo = DB::table('reviews')->where(['otheruser_id' => Session::get('user_id')])->where('rating', '>', 4)->pluck(DB::raw('count(*) as total'), 'id')->all();
            // echo "<pre>";
            // print_r($userInfo);
            // echo "</pre>";
            // die;
            return view('gigs.detail', ['gigCount' => $gigCount, 'title' => $pageTitle, 'recordInfo' => $recordInfo, 'userInfo' => $userInfo, 'topRatedInfo' => $topRatedInfo, 'sellingOrders' => $sellingOrders, 'gigreviews' => $gigreviews]);
        }else{
            Session::flash('error_message', "Gig not found!");
            return Redirect::to('gigs');
        }
            
    }
    public function addwaitlist(Request $request) {
        
        $user_id = $request->get('user_id');
        $gig_id = $request->get('gig_id');

        $gigInfo = User::where('id', $user_id)->first();
        $waitlist = $gigInfo->waitlist;
        
        if($waitlist){
            $wait = explode(',', $waitlist);        
            array_push($wait,Session::get('user_id'));
            $wait1 =    implode(',',$wait);
        }else{
            $wait1 = Session::get('user_id');
        }
        
        
        Gig::where('id', $gig_id)->update(array('waitlist'=>$wait1)); 
        exit;
    }

    public function createoffer(Request $request) {
        $pageTitle = 'Create a new Gig';
        $catList = Category::getCategoryList();
        $skills = Skill::getSkillList();
        $input = Input::all();

        $user_id = Session::get('user_id');
        if (!empty($input)) {

            $recordInfo = Gig::where('id', $input['select_gig'])->first();

            $serialisedData['id'] = '';
            $serialisedData['basic_description'] = $input['description'];
            $serialisedData['basic_price'] = $input['basic_price'];
            $serialisedData['basic_delivery'] = $input['basic_delivery'];
            $serialisedData['expiry'] = $input['expiry'];
            $serialisedData['one_delivery'] = 1;
            $serialisedData['standard_title'] = '';
            $serialisedData['standard_description'] = '';
            $serialisedData['standard_delivery'] = '';
            $serialisedData['standard_revision'] = '';
            $serialisedData['standard_price'] = '';
            $serialisedData['premium_title'] = '';
            $serialisedData['premium_description'] = '';
            $serialisedData['premium_delivery'] = '';
            $serialisedData['premium_revision'] = '';
            $serialisedData['premium_price'] = '';
            $serialisedData['title'] = $recordInfo->title;
            $serialisedData['category_id'] = $recordInfo->category_id;
            $serialisedData['subcategory_id'] = $recordInfo->subcategory_id;
            $serialisedData['tags'] = $recordInfo->tags;
            $serialisedData['description'] = $recordInfo->description;
            $serialisedData['photo'] = $recordInfo->photo;
            $serialisedData['youtube_url'] = $recordInfo->youtube_url;
            $serialisedData['youtube_image'] = $recordInfo->youtube_image;
            $serialisedData['pdf_doc'] = $recordInfo->pdf_doc;

            $slug = $this->createSlug($recordInfo->title, 'gigs');
            $serialisedData['slug'] = $slug;
            $serialisedData['user_id'] = $user_id;
            $serialisedData['type_gig'] = 'offer';
            $serialisedData['offer_user'] = $input['offer_user'];

            $userInfo = User::where('id', $input['offer_user'])->first();
            Gig::insert($serialisedData);

            $gigId = DB::getPdo()->lastInsertId();

            if ($recordInfo->Image) {
                foreach ($recordInfo->Image as $gigimage) {
                    if (isset($gigimage->name) && !empty($gigimage->name)) {
                        $path = GIG_FULL_UPLOAD_PATH . $gigimage->name;
                        if (file_exists($path) && !empty($gigimage->name)) {
                            $uploadedFileName = $gigimage->name;
                            $uploadedFileNew = $gigimage->name . '-' . time();
                            $success = \File::copy(GIG_FULL_UPLOAD_PATH . '/' . $uploadedFileName, GIG_FULL_UPLOAD_PATH . '/' . $uploadedFileNew);

                            $this->resizeImage($uploadedFileNew, GIG_FULL_UPLOAD_PATH, GIG_SMALL_UPLOAD_PATH, GIG_MW, GIG_MH);

                            $serialisedImgData = array();

                            $serialisedImgData['gig_id'] = $gigId;
                            $serialisedImgData['name'] = $uploadedFileName;
                            $serialisedImgData['status'] = 1;
                            $serialisedImgData['main'] = 0;

                            Image::insert($serialisedImgData);
                        }
                    }
                }
            }

            $name = ucwords($userInfo->first_name . ' ' . $userInfo->last_name);
            $username = ucwords($recordInfo->User->first_name . ' ' . $recordInfo->User->last_name);
            $price = '$' . $input['basic_price'];
            $duedate = date('d M Y', strtotime($input['expiry']));
            $item = $recordInfo->title;
            $emailId = $userInfo->email_address;

            $emailTemplate = DB::table('emailtemplates')->where('id', 22)->first();
            $toRepArray = array('[!username!]', '[!name!]', '[!duedate!]', '[!item!]', '[!price!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
            $fromRepArray = array($username, $name, $duedate, $item, $price, HTTP_PATH, SITE_TITLE);
            $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
            $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
            Mail::to($emailId)->send(new SendMailable($emailBody, $emailSubject));

            Session::flash('success_message', "Gig details saved successfully.");
            return Redirect::to('gigs/myofferedgig');
        }
    }

    public function acceptreject(Request $request, $type, $slug) {
        if ($type == 1) {
            $pageTitle = 'Accept Offer';
            $recordInfo = Gig::where('slug', $slug)->first();
            $userInfo = User::where('id', $recordInfo->offer_user)->first();

            DB::table('gigs')->where('id', $recordInfo->id)->update(array('offer_status' => 1));

            $username = ucwords($userInfo->first_name . ' ' . $userInfo->last_name);
            $name = ucwords($recordInfo->User->first_name . ' ' . $recordInfo->User->last_name);
            $price = '$' . $recordInfo->basic_price;
            $item = $recordInfo->title;
            $emailId = $recordInfo->User->email_address;

            $emailTemplate = DB::table('emailtemplates')->where('id', 23)->first();
            $toRepArray = array('[!username!]', '[!name!]', '[!item!]', '[!price!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
            $fromRepArray = array($username, $name, $item, $price, HTTP_PATH, SITE_TITLE);
            $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
            $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
            Mail::to($emailId)->send(new SendMailable($emailBody, $emailSubject));

            Session::flash('success_message', "Custom offer accepted successfully.");
            return Redirect::to('gigs/offeredgig');
        } elseif ($type == 2) {
            $pageTitle = 'Reject Offer';
            $recordInfo = Gig::where('slug', $slug)->first();
            $userInfo = User::where('id', $recordInfo->offer_user)->first();

            DB::table('gigs')->where('id', $recordInfo->id)->update(array('offer_status' => 2));

            $username = ucwords($userInfo->first_name . ' ' . $userInfo->last_name);
            $name = ucwords($recordInfo->User->first_name . ' ' . $recordInfo->User->last_name);
            $price = '$' . $recordInfo->basic_price;
            $item = $recordInfo->title;
            $emailId = $recordInfo->User->email_address;

            $emailTemplate = DB::table('emailtemplates')->where('id', 24)->first();
            $toRepArray = array('[!username!]', '[!name!]', '[!item!]', '[!price!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
            $fromRepArray = array($username, $name, $item, $price, HTTP_PATH, SITE_TITLE);
            $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
            $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
            Mail::to($emailId)->send(new SendMailable($emailBody, $emailSubject));

            Session::flash('success_message', "Custom offer rejected successfully.");
            return Redirect::to('gigs/offeredgig');
        } elseif ($type == 3) {
            $pageTitle = 'Withdrawn Offer';
            $recordInfo = Gig::where('slug', $slug)->first();
            $userInfo = User::where('id', $recordInfo->offer_user)->first();

            DB::table('gigs')->where('id', $recordInfo->id)->update(array('offer_status' => 3));

            $name = ucwords($userInfo->first_name . ' ' . $userInfo->last_name);
            $username = ucwords($recordInfo->User->first_name . ' ' . $recordInfo->User->last_name);
            $price = '$' . $recordInfo->basic_price;
            $item = $recordInfo->title;
            $emailId = $userInfo->email_address;

            $emailTemplate = DB::table('emailtemplates')->where('id', 25)->first();
            $toRepArray = array('[!username!]', '[!name!]', '[!item!]', '[!price!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
            $fromRepArray = array($username, $name, $item, $price, HTTP_PATH, SITE_TITLE);
            $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
            $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
            Mail::to($emailId)->send(new SendMailable($emailBody, $emailSubject));

            Session::flash('success_message', "Custom offer rejected successfully.");
            return Redirect::to('gigs/myofferedgig');
        }
    }

}
