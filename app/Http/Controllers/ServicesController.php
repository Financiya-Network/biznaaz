<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\SendMailable;
use Mail;
use DB;
use Session;
use Input;
use Redirect;
use App\Models\Service;
use App\Models\Category;
use App\Models\Servicesoffer;
use App\Models\Payment;
use App\Models\Wallet;
use App\Models\Servicemessage;
use App\Models\Notification;
use App\Models\User;


class ServicesController extends Controller {

    public function __construct() {
        $this->middleware('is_userlogin', ['except' => ['']]);
    }
    
    public function management(Request $request) {
        $pageTitle = 'Manage Request';
        $allrecords  = Service::where('user_id', Session::get('user_id'))->orderBy('id', 'DESC')->get();
        return view('services.management', ['title' => $pageTitle, 'allrecords'=>$allrecords]);
    }
    
    public function create(Request $request) {
        $pageTitle = 'Post Service Request';
        $catList = Category::getCategoryList();
        $subcatList = array();
        if (!empty($request->all())) {
            $request->validate([
                'title' => 'required|max:255',
                'description' => 'required|max:2500',
                'category_id' => 'required',
                'subcategory_id' => 'required',
                'day' => 'required'
            ],
            [
                'category_id.required' => 'The category field is required.',
                'subcategory_id.required'  => 'The sub category field is required.'
            ]);      
           
            $data = $request->all();
            if (Input::hasFile('attachment')) {
                $file = Input::file('attachment');
                $uploadedFileName = $this->uploadImage($file, SERVICE_FULL_UPLOAD_PATH);
                $data['attachment'] = $uploadedFileName;
            }else{
                unset($data['attachment']);
            }                           
            $serialisedData = $this->serialiseFormData($data);
            $serialisedData['slug'] = $this->createSlug($request->get('title'), 'services');
            $serialisedData['status'] =  1;
            $serialisedData['user_id'] =  Session::get('user_id');
            Service::insert($serialisedData); 
            
            Session::flash('success_message', "Your service request posted successfully.");
            return Redirect::to('/services/management');
        }
        return view('services.create', ['title' => $pageTitle, 'catList'=>$catList, 'subcatList'=>$subcatList]);
    }
    
    public function editrequest(Request $request, $slug=null) {
        $pageTitle = 'Edit Service Request';
        $recordInfo = Service::where('slug', $slug)->first();
        if (empty($recordInfo)) {
            return Redirect::to('services/management');
        }
        $catList = Category::getCategoryList();
        $subcatList = Category::getSubCategoryList($recordInfo->category_id);
        if (!empty($request->all())) {
            $request->validate([
                'title' => 'required|max:255',
                'description' => 'required|max:2500',
                'category_id' => 'required',
                'subcategory_id' => 'required',
                'day' => 'required'
            ],
            [
                'category_id.required' => 'The category field is required.',
                'subcategory_id.required'  => 'The sub category field is required.'
            ]);      
           
            $data = $request->all();
            if (Input::hasFile('attachment')) {
                $file = Input::file('attachment');
                $uploadedFileName = $this->uploadImage($file, SERVICE_FULL_UPLOAD_PATH);
                $data['attachment'] = $uploadedFileName;
            }else{
                unset($data['attachment']);
            }                           
            $serialisedData = $this->serialiseFormData($data);
            Service::where('id', $recordInfo->id)->update($serialisedData);
            Session::flash('success_message', "Service request details updated successfully.");
            return Redirect::to('services/management');
        }
        return view('services.editrequest', ['title' => $pageTitle, 'catList'=>$catList, 'subcatList'=>$subcatList, 'recordInfo'=>$recordInfo]);
    }
    
    public function deleterequest($slug=null){
        if($slug){
            Service::where('slug', $slug)->delete();
            Session::flash('success_message', "Request deleted successfully.");
            return Redirect::to('services/management');
        }
    } 
    
    public function updatesubcategory($catid) {
        $subcatList = Category::getSubCategoryList($catid);
        return view('services.updatesubcategory', ['subcatList'=>$subcatList]);
    }
    
    public function detail(Request $request, $slug=null) {
        $recordInfo = Service::where('slug', $slug)->first();
        if (empty($recordInfo)) {
            return Redirect::to('buyer-requests');
        }
        $pageTitle = $recordInfo->title;
        $oldoffer = array();
        if(Session::has('user_id')){
            $oldoffer = Servicesoffer::where(['user_id'=>Session::get('user_id'), 'service_id'=>$recordInfo->id])->first();
        }
        return view('services.detail', ['title' => $pageTitle, 'recordInfo'=>$recordInfo, 'oldoffer'=>$oldoffer]);
    }
    
    public function sendrequestoffer(Request $request) {
        $data = $request->all();
        $serviceInfo = Service::where('slug', $request->get('service_slug'))->first();
        if($serviceInfo){ 
            $loginUserInfo = User::where('id', Session::get('user_id'))->first();
            $oldoffer = Servicesoffer::where(['user_id'=>Session::get('user_id'), 'service_id'=>$serviceInfo->id])->first();
            if($oldoffer){
                $serialisedData = $this->serialiseFormData($data);
                unset($serialisedData['service_slug']);
                Servicesoffer::where('id', $oldoffer->id)->update($serialisedData);  
                echo '2';
            }else{            
                $serialisedData = $this->serialiseFormData($data);
                $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(25));
                $serialisedData['status'] =  0;
                $serialisedData['service_user_id'] =  $serviceInfo->user_id;
                $serialisedData['service_id'] =  $serviceInfo->id;
                $serialisedData['time'] =  time();
                $serialisedData['user_id'] =  Session::get('user_id');
                unset($serialisedData['service_slug']);
                Servicesoffer::insert($serialisedData); 
                
                $title = $serviceInfo->title;
                $username = $serviceInfo->User->first_name . ' ' . $serviceInfo->User->last_name;
                $name = $loginUserInfo->first_name . ' ' . $loginUserInfo->last_name;
                $amount = CURR.$serialisedData['amount'];
                $deliver_in = $serialisedData['deliver_in'] .'dyas';
                $message = nl2br($serialisedData['message']);                
               
                $emailId = $serviceInfo->User->email_address;
                $emailTemplate = DB::table('emailtemplates')->where('id', 7)->first();
                $toRepArray = array('[!username!]', '[!title!]', '[!name!]', '[!amount!]', '[!deliver_in!]', '[!message!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
                $fromRepArray = array($username, $title, $name, $amount, $deliver_in, $message, HTTP_PATH, SITE_TITLE);
                $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
                $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
                Mail::to($emailId)->send(new SendMailable($emailBody,$emailSubject));
                echo '1';
            }
        }       
        
    }
    
    public function buyerrequest(Request $request) {
        $pageTitle = 'Buyer Requests';
        $query = new Service();        
        $query = $query->where('user_id', '!=' , Session::get('user_id'))->where('status', 1);
        if ($request->has('category_id') && $request->get('category_id') > 0) {
            $query = $query->where('category_id', $request->get('category_id'));
        }
        if($request->has('page')){
            $page = $request->get('page');
        }else{
            $page = 1;
        }
        $allrecords = $query->orderBy('id','DESC')->paginate(20, ['*'], 'page', $page);
        if($request->ajax()){
            return view('elements.services.buyerrequest', ['allrecords'=>$allrecords, 'page'=>$page]);
        }
        $catList = Category::getCategoryList();
        return view('services.buyerrequest', ['title' => $pageTitle, 'allrecords'=>$allrecords, 'catList'=>$catList, 'page'=>$page]);
    }
    
    public function buyerrequestviewoffers(Request $request, $slug) {
        $pageTitle = 'View Offers';
        $serviceInfo = Service::where('slug', $slug)->first();
        $alloffers = Servicesoffer::where('service_id', $serviceInfo->id)
                ->orderBy('status','DESC')->orderBy('id','DESC')->get();
        //echo '<pre>';print_r($alloffers);exit;
        return view('services.buyerrequestviewoffers', ['title' => $pageTitle, 'alloffers'=>$alloffers, 'serviceInfo'=>$serviceInfo]);
    }
    public function offersdetails(Request $request, $slug) {
        $pageTitle = 'View Offers';
        $servicesofferInfo = Servicesoffer::where('slug', $slug)->first();
        $serviceInfo = Service::where('id', $servicesofferInfo->service_id)->first();
        return view('services.offersdetails', ['title' => $pageTitle, 'servicesofferInfo'=>$servicesofferInfo, 'serviceInfo'=>$serviceInfo]);
    }
    
    public function workplace(Request $request, $slug) {
        $pageTitle = 'View Workplace';
        $servicesofferInfo = Servicesoffer::where('slug', $slug)->first();
        $serviceInfo = Service::where('id', $servicesofferInfo->service_id)->first();
        
        if (!empty($request->all())) {
            $request->validate([
                'message' => 'required'
            ]);
            
            $sender_id = Session::get('user_id');
            if($servicesofferInfo->service_user_id == Session::get('user_id')){
               $receiver_id = $servicesofferInfo->user_id;
            }else{
               $receiver_id = $servicesofferInfo->service_user_id; 
            }
            
            if (Input::hasFile('attachment')) {
                $file = Input::file('attachment');
                $uploadedFileName = $this->uploadImage($file, GIG_MSG_FULL_UPLOAD_PATH);
                $attachment = $uploadedFileName;
            }else{
                $attachment = '';
            }
            
            $serialisedData = array();
            $serialisedData['service_id'] =  $serviceInfo->id;
            $serialisedData['servicesoffer_id'] =  $servicesofferInfo->id;
            $serialisedData['sender_id'] =  $sender_id;
            $serialisedData['receiver_id'] =  $receiver_id;
            $serialisedData['message'] =  $request->get('message');
            $serialisedData['attachment'] =  $attachment;
            $serialisedData['status'] = 0;
            $serialisedData['time'] = time();
            $serialisedData['slug'] = $serviceInfo->id.$sender_id.$receiver_id.time().rand(10,99);
            $serialisedData = $this->serialiseFormData($serialisedData);
            Servicemessage::insert($serialisedData); 
            Session::flash('success_message', "Your messages sent successfully.");
            
            $serialisedData = array();
            $serialisedData['from_name'] = Session::get('user_name');
            $serialisedData['user_id'] = $receiver_id;
            $serialisedData['message'] = $request->get('message');
            $serialisedData['url'] = 'services/workplace/'.$slug.'/#sentmessages';
            $serialisedData['status'] = 0;
            $serialisedData = $this->serialiseFormData($serialisedData);
            $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(5)).time().rand(10,99);
            Notification::insert($serialisedData);
            return Redirect::to('services/workplace/'.$slug.'/#sentmessages');
        }        
        $servicemessages = Servicemessage::where('servicesoffer_id', $servicesofferInfo->id)->orderBy('id', 'DESC')->get();  
        
        return view('services.workplace', ['title' => $pageTitle, 'servicesofferInfo'=>$servicesofferInfo, 'serviceInfo'=>$serviceInfo, 'servicemessages'=>$servicemessages]);
    }
    
    public function acceptrejectoffers(Request $request, $type, $slug) {
        if($type == 1){
            $pageTitle = 'Pay Now';
            $servicesofferInfo = Servicesoffer::where('slug', $slug)->first();
            $serviceInfo = Service::where('id', $servicesofferInfo->service_id)->first();
            $order_slug = $serviceInfo->id.bin2hex(openssl_random_pseudo_bytes(30));
            $order_number = date('Ymd').time();
            $serialisedData = array();
            $serialisedData['order_slug'] = $order_slug;
            $serialisedData['order_number'] = $order_number;
            $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(30));
            $serialisedData['status'] =  0;
            $serialisedData['amount'] =  $servicesofferInfo->amount;
            $serialisedData['service_id'] =  $serviceInfo->id;
            $serialisedData['serviceoffer_id'] =  $servicesofferInfo->id;
            $serialisedData['user_id'] =  Session::get('user_id');
            exit;
           // Payment::insert($serialisedData); 
           // return view('services.paynow', ['title' => $pageTitle, 'servicesofferInfo'=>$servicesofferInfo, 'serviceInfo'=>$serviceInfo, 'order_slug'=>$order_slug, 'order_number'=>$order_number]);           
        }elseif($type == 2){
            $servicesofferInfo = Servicesoffer::where('slug', $slug)->first();
            $serviceInfo = Service::where('id', $servicesofferInfo->service_id)->first();
            
            Servicesoffer::where('id', $servicesofferInfo->id)->update(array('status'=>2));
            
            $title = $serviceInfo->title;
            $username = $servicesofferInfo->User->first_name . ' ' . $servicesofferInfo->User->last_name;
            
            $emailId = $servicesofferInfo->User->email_address;
            $emailTemplate = DB::table('emailtemplates')->where('id', 8)->first();
            $toRepArray = array('[!username!]', '[!title!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
            $fromRepArray = array($username, $title, HTTP_PATH, SITE_TITLE);
            $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
            $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
            Mail::to($emailId)->send(new SendMailable($emailBody,$emailSubject));
            //exit;
            Session::flash('success_message', "Offer rejected successfully.");
            return Redirect::to('buyer-requests-view-offers/'.$serviceInfo->slug);            
        }       
    }
    
    public function markcompleted(Request $request, $slug) {
        $servicesofferInfo = Servicesoffer::where('slug', $slug)->first();
        $serviceInfo = Service::where('id', $servicesofferInfo->service_id)->first();
       
        Service::where('id', $serviceInfo->id)->update(['is_completed'=>1]);
        
        $settingsInfo = DB::table('settings')->where('id', 1)->first();
        $admin_commission = $settingsInfo->admin_commission;
        
        $amount = $servicesofferInfo->amount;
        $admin_commission = round($amount*$admin_commission/100, 2);
        $revenue = $amount - $admin_commission;
        
        $transactionId = strtoupper(date('Ymd').bin2hex(openssl_random_pseudo_bytes(5)));
        $serialisedData = array();
        $serialisedData['user_id'] = $servicesofferInfo->user_id;
        $serialisedData['service_id'] = $servicesofferInfo->service_id;
        $serialisedData['amount'] = $amount;
        $serialisedData['revenue'] = $revenue;
        $serialisedData['admin_commission'] = $admin_commission;
        $serialisedData['trn_id'] = $transactionId;
        $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(20));
        $serialisedData['type'] = 0;
        $serialisedData['add_minus'] = 1;
        $serialisedData['status'] = 1;
        $serialisedData['source'] = 'From Request: <b>'.$serviceInfo->title.'</b>';
        Wallet::insert($serialisedData);
        
        $loginUserInfo = User::where('id', Session::get('user_id'))->first();
        $loginuser = $loginUserInfo->first_name . ' ' . $loginUserInfo->last_name;
        $selleruser = $servicesofferInfo->User->first_name . ' ' . $servicesofferInfo->User->last_name;
        $title = $serviceInfo->title;
                
        $emailId = $servicesofferInfo->User->email_address; 
        $emailTemplate = DB::table('emailtemplates')->where('id', 19)->first();
        $toRepArray = array('[!username!]', '[!title!]', '[!loginuser!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
        $fromRepArray = array($selleruser, $title, $loginuser,  HTTP_PATH, SITE_TITLE);
        $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
        $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
        Mail::to($emailId)->send(new SendMailable($emailBody,$emailSubject));
        
        $datetime = date('m d, Y');
        $amount = CURR.number_format($amount, 2);
        $emailId = $servicesofferInfo->User->email_address; 
        $emailTemplate = DB::table('emailtemplates')->where('id', 20)->first();
        $toRepArray = array('[!username!]', '[!title!]', '[!amount!]', '[!transactionId!]', '[!datetime!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
        $fromRepArray = array($selleruser, $title, $amount, $transactionId, $datetime, HTTP_PATH, SITE_TITLE);
        $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
        $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
        Mail::to($emailId)->send(new SendMailable($emailBody,$emailSubject));
        
        Session::flash('success_message', "You have successfully makred this task as completed.");
        return Redirect::to('services/workplace/'.$slug);       
    }
    
    public function offerssent(Request $request) {
        $pageTitle = 'Offer Sent';
        $query = new Servicesoffer();        
        $query = $query->where('user_id', Session::get('user_id'));
        if ($request->has('category_id') && $request->get('category_id') > 0) {
            $query = $query->where('category_id', $request->get('category_id'));
        }
        if($request->has('page')){
            $page = $request->get('page');
        }else{
            $page = 1;
        }
        $allrecords = $query->orderBy('id','DESC')->paginate(20, ['*'], 'page', $page);
        if($request->ajax()){
            return view('elements.services.offerssent', ['allrecords'=>$allrecords, 'page'=>$page]);
        }
        return view('services.offerssent', ['title' => $pageTitle, 'allrecords'=>$allrecords]);
    }

}