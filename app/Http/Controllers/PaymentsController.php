<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\SendMailable;
use Mail;
use DB;
use Redirect;
use Session;
use App\Models\Payment;
use App\Models\Servicesoffer;
use App\Models\Service;
use App\Models\Gig;
use App\Models\Cart;
use App\Models\Wallet;
use App\Models\Myorder;
use App\Models\User;
use App\Models\Gigextra;

class PaymentsController extends Controller {
    
    public function __construct() {
        $this->middleware('is_userlogin', ['except' => ['']]);
    }
    
    public function successpaypal($slug=null){ 
        $paymentInfo = Payment::where('order_slug', $slug)->first();        
        if(!$paymentInfo){
            Session::flash('success_message', "'Your transaction failed. Please try again.");
            return Redirect::to('dashboard');
        }else{
            $transactionId = '';
            if (isset($_REQUEST['txn_id']) && $_REQUEST['txn_id'] !='') {
                $transactionId = $_REQUEST['txn_id'];
                $amountPaid = $_REQUEST['mc_gross'];
            } elseif (isset($_REQUEST['tx']) && $_REQUEST['tx'] !='') {
                $transactionId = $_REQUEST['tx'];
                $amountPaid = $_REQUEST['amt'];
            }            
            if($transactionId == ''){
                $transactionId = $paymentInfo->order_number;
            }
            if($transactionId){
                $updateData  = array();
                $updateData['transaction_id'] = $transactionId;
                $updateData['status'] = 1;
                Payment::where('id', $paymentInfo->id)->update($updateData);  
                
                Servicesoffer::where('id', $paymentInfo->serviceoffer_id)->update(array('status'=>1)); 
                $servicesofferInfo = Servicesoffer::where('id', $paymentInfo->serviceoffer_id)->first();
                
                Service::where('id', $paymentInfo->service_id)->update(array('status'=>5, 'serviceoffer_slug'=>$servicesofferInfo->slug));                
                Session::flash('success_message', "You have successfully make payment for your service accrpted");
                return Redirect::to('services/management');
            }               
        }
      
    }
    
    public function cancel($slug=null){ 
        $paymentInfo = Payment::where('order_slug', $slug)->first();
        Session::flash('error_message', "Your transaction failed. Please try again.");
        return Redirect::to('services/management');
      
    }
    
    
    
    public function addtocart(Request $request){ 
        $slug = $request->get('slug');
        $type =  $request->get('type'); 
        
        $extraamt= $request->get('examt'); 
        
        $extraIds = $request->get('extragig_idd');
        if($extraIds){
        $extras = explode(',',$extraIds);
        foreach($extras as $extra){
            $gigExtras = Gigextra::where("id", $extra)->first();
            $extraamts[] = $gigExtras->price;
        }
        }
        
        $gigInfo = Gig::where('slug', $slug)->first(); 
        $settingsInfo = DB::table('settings')->where('id', 1)->first();
        $admin_commision = $settingsInfo->admin_commission;
        $commision_admin = $settingsInfo->commission_admin;
       
        Cart::where('user_id', Session::get('user_id'))->delete();
        
        $extraamt = 0;
        if(isset($extraamts)){
           $extraamt = array_sum($extraamts);
        }
        
        $amtname = $type.'_price';
        $amount = $gigInfo->$amtname;
        $extra_amount = $extraamt;
        $revenue = $amount + $extra_amount;
        $admin_amount = round($revenue*$admin_commision/100, 2);
        $commission_amount = round($revenue*$commision_admin/100, 2);
        $total_amount = $revenue + $admin_amount;
        
        $serialisedData = array();
        $serialisedData['user_id'] =  Session::get('user_id');
        $serialisedData['gig_id'] = $gigInfo->id;
        $serialisedData['package'] = $type;
        $serialisedData['amount'] = $amount;
        $serialisedData['extra_ids'] = $extraIds;
        $serialisedData['extra_amount'] = $extra_amount;
        $serialisedData['total_amount'] = $total_amount;
        $serialisedData['revenue'] = $revenue;
        $serialisedData['admin_amount'] = $admin_amount;
        $serialisedData['admin_commission'] = $commission_amount;
        $serialisedData['quantity'] = 1;
        $slug = bin2hex(openssl_random_pseudo_bytes(40));
        $serialisedData['slug'] = $slug;
        $serialisedData = $this->serialiseFormData($serialisedData);
        //echo '<pre>';print_r($serialisedData);exit;
        Cart::insert($serialisedData); 
        return $slug;
    }
    
    public function ordersummary(Request $request, $slug=null) {
        $pageTitle = 'Order Summary';   
        $recordInfo  = Cart::where('slug', $slug)->first();
        $amountArray = $this->getWallerAmount(Session::get('user_id')); 
        return view('payments.ordersummary', ['title' => $pageTitle, 'recordInfo'=>$recordInfo, 'amountArray'=>$amountArray]);
    }
    
    /*     * **Pay With PayPal** */

    public function paywithpaypal(Request $request, $slug = null) {
        $pageTitle = 'Payment With PayPal';

        $recordInfo = Cart::where('slug', $slug)->first();
        $total_amount = $recordInfo->total_amount;
        $gig_id = $recordInfo->gig_id;

        $currencyID = urlencode('USD');
        $paymentType = urlencode('Sale');    // or 'Sale' //Authorization

        $totalAmt = urlencode($recordInfo->total_amount);
        $currency = urlencode('USD');

        $settingsInfo = DB::table('settings')->where('id', 1)->first();
        $paypal_url = PAYPALURL;
        if($settingsInfo->payment_mode == 1){
            $paypal_url = PAYPALURLLIVE;
        }
        $paypal_email = $settingsInfo->paypal_email_address;

        return view('payments.paywithpaypal', ['paypal_url'=>$paypal_url,'paypal_email'=>$paypal_email,'title' => $pageTitle, 'amount' => $totalAmt, 'currency' => $currency, 'item_number' => $slug, 'product_name' => $recordInfo->Gig->title, 'success_url' => HTTP_PATH . '/payments/success/' . $slug, 'cancel_url' => HTTP_PATH . '/payments/paypalcancel/' . $slug]);
    }
    
    public function paypalcancel(Request $request, $slug = null) {

        Session::flash('error_message', "Sorry, your payment could not be completed, please try again");
        return Redirect::to('order-summary/'.$slug);
    }

    public function success(Request $request, $slug = null) {
        $pageTitle = 'Payment With PayPal';
        
        $recordInfo = Cart::where('slug', $slug)->first();
        $total_amount = $recordInfo->total_amount;
        $gig_id = $recordInfo->gig_id;

        $currencyID = urlencode('USD');
        $paymentType = urlencode('Sale');    // or 'Sale' //Authorization

        if (isset($_REQUEST['txn_id'])) {
            $transactionId = $_REQUEST['txn_id'];
            $amountPaid = $_REQUEST['mc_gross'];
        } elseif ($_REQUEST['tx']) {
            $transactionId = $_REQUEST['tx'];
            $amountPaid = $_REQUEST['amt'];
        }
        $st = 'completed';
//echo '<pre>';print_r($transactionId);exit;
        $wallet_trn_id = $transactionId;
        $paymenttype = 'PayPal';

        $amount = $amountPaid;

        if ($transactionId) {
            $serialisedData = array();
            $serialisedData['user_id'] = Session::get('user_id');
            $serialisedData['order_slug'] = bin2hex(openssl_random_pseudo_bytes(30));
            $serialisedData['order_number'] = $wallet_trn_id;
            $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(30));
            $serialisedData['status'] = 1;
            $serialisedData['amount'] = $total_amount;
            $serialisedData['gig_id'] = $gig_id;
            $serialisedData['transaction_id'] = $wallet_trn_id;
            Payment::insert($serialisedData);

            $serialisedData = array();
            $serialisedData['buyer_id'] = Session::get('user_id');
            $serialisedData['gig_id'] = $recordInfo->gig_id;
            $serialisedData['seller_id'] = $recordInfo->Gig->user_id;
            $serialisedData['package'] = $recordInfo->package;
            $serialisedData['amount'] = $recordInfo->amount;
            $serialisedData['extra_ids'] = $recordInfo->extra_ids;
            $serialisedData['extra_amount'] = $recordInfo->extra_amount;
            $serialisedData['total_amount'] = $recordInfo->total_amount;
            $serialisedData['revenue'] = $recordInfo->revenue;
            $serialisedData['admin_amount'] = $recordInfo->admin_amount;
            $serialisedData['admin_commission'] = $recordInfo->admin_commission;
            $serialisedData['quantity'] = 1;
            $serialisedData['pay_type'] = 'PayPal';
            $serialisedData['paypal_trn_id'] = $wallet_trn_id;
            $serialisedData['status'] = 1;
            $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(20));
            $serialisedData = $this->serialiseFormData($serialisedData);
            Myorder::insert($serialisedData);

            $amountseller = CURR.$recordInfo->revenue;

            // Email sent to login user
            $gigInfo = Gig::where('id', $recordInfo->gig_id)->first();
            $loginUserInfo = User::where('id', Session::get('user_id'))->first();
            $loginuser = $loginUserInfo->first_name . ' ' . $loginUserInfo->last_name;
            $amount = CURR . $total_amount;
            $transactionId = $wallet_trn_id;
            $datetime = date('M d, Y');
            $title = $gigInfo->title;

            $emailId = $loginUserInfo->email_address;
            $emailTemplate = DB::table('emailtemplates')->where('id', 13)->first();
            $toRepArray = array('[!username!]', '[!title!]', '[!amount!]', '[!transactionId!]', '[!paymenttype!]', '[!datetime!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
            $fromRepArray = array($loginuser, $title, $amount, $transactionId, $paymenttype, $datetime, HTTP_PATH, SITE_TITLE);
            $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
            $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
            Mail::to($emailId)->send(new SendMailable($emailBody, $emailSubject));

            // Email sent to admin user
            $adminInfo = DB::table('admins')->where('id', 1)->first();
            $emailId = $adminInfo->email;
            $emailTemplate = DB::table('emailtemplates')->where('id', 14)->first();
            $toRepArray = array('[!username!]', '[!title!]', '[!amount!]', '[!transactionId!]', '[!paymenttype!]', '[!datetime!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
            $fromRepArray = array($loginuser, $title, $amount, $transactionId, $paymenttype, $datetime, HTTP_PATH, SITE_TITLE);
            $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
            $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
            Mail::to($emailId)->send(new SendMailable($emailBody, $emailSubject));

            // Email sent to seller user
            $sellerInfo = User::where('id', $gigInfo->user_id)->first();
            $emailId = $sellerInfo->email_address;
            $sellername = $sellerInfo->first_name . ' ' . $sellerInfo->last_name;

            $emailTemplate = DB::table('emailtemplates')->where('id', 15)->first();
            $toRepArray = array('[!username!]', '[!title!]', '[!amount!]', '[!transactionId!]', '[!paymenttype!]', '[!datetime!]', '[!sellername!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
            $fromRepArray = array($loginuser, $title, $amountseller, $transactionId, $paymenttype, $datetime, $sellername, HTTP_PATH, SITE_TITLE);
            $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
            $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
            Mail::to($emailId)->send(new SendMailable($emailBody, $emailSubject));

            Cart::where('id', $recordInfo->id)->delete();
            Session::flash('success_message', "You have successfully purchased Gig using paypal payment.");
            return Redirect::to('payments/history');
        }
    }
    
    public function payviawallet(Request $request) {
        $pageTitle = 'Order Summary';   
        $slug = $request->get('slug');
        $recordInfo  = Cart::where('slug', $slug)->first();
        $wallet_trn_id = strtoupper(bin2hex(openssl_random_pseudo_bytes(8)));
        
        $serialisedData = array();
        $serialisedData['buyer_id'] =  Session::get('user_id');
        $serialisedData['gig_id'] = $recordInfo->gig_id;
        $serialisedData['seller_id'] = $recordInfo->Gig->user_id;
        $serialisedData['package'] = $recordInfo->package;
        $serialisedData['amount'] = $recordInfo->amount;
        $serialisedData['extra_ids'] = $recordInfo->extra_ids;
        $serialisedData['extra_amount'] = $recordInfo->extra_amount;
        $serialisedData['total_amount'] = $recordInfo->total_amount;
        $serialisedData['revenue'] = $recordInfo->revenue;
        $serialisedData['admin_amount'] = $recordInfo->admin_amount;
        $serialisedData['admin_commission'] = $recordInfo->admin_commission;
        $serialisedData['quantity'] = 1;
        $serialisedData['pay_type'] = 'Wallet';
        $serialisedData['wallet_trn_id'] = $wallet_trn_id;
        $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(20));
        $serialisedData['status'] = 1;
        $serialisedData = $this->serialiseFormData($serialisedData);
        //echo '<pre>';print_r($serialisedData);exit;
        Myorder::insert($serialisedData);
        
        // Add amount to seller wallet
        /*$serialisedData = array();
        $serialisedData['user_id'] = $recordInfo->Gig->user_id;
        $serialisedData['gig_id'] = $recordInfo->gig_id;
        $serialisedData['amount'] = $recordInfo->total_amount;
        $serialisedData['revenue'] = $recordInfo->revenue-$recordInfo->admin_commission;
        $serialisedData['admin_commission'] = $recordInfo->admin_amount;
        $serialisedData['commission_admin'] = $recordInfo->admin_commission;
        $serialisedData['trn_id'] = $wallet_trn_id;
        $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(20));
        $serialisedData['type'] = 6;
        $serialisedData['add_minus'] = 1;
        $serialisedData['source'] = 'From Gig: <b>'.$recordInfo->Gig->title.'</b>';
        $serialisedData['status'] = 1;
        Wallet::insert($serialisedData); */
        
        // Deduct amount to buyer wallet
        $serialisedData = array();
        $serialisedData['user_id'] = Session::get('user_id');
        $serialisedData['gig_id'] = $recordInfo->gig_id;
        $serialisedData['amount'] = $recordInfo->total_amount;
        $serialisedData['revenue'] = '-'.$recordInfo->total_amount;
        $serialisedData['admin_commission'] = 0;
        $serialisedData['trn_id'] = $wallet_trn_id;
        $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(20));
        $serialisedData['type'] = 5;
        $serialisedData['add_minus'] = 0;
        $serialisedData['source'] = 'Pay for Gig: <b>'.$recordInfo->Gig->title.'</b>';
        $serialisedData['status'] = 1;
        Wallet::insert($serialisedData);
        
        Cart::where('id', $recordInfo->id)->delete();
        
        Session::flash('success_message', "You have successfully purchased Gig using wallet balance.");
        //return Redirect::to('buying-orders'); 
        return 1;
        
    }
    
    public function paywithcard(Request $request) {
        $pageTitle = 'Order Summary';   
        $slug = $request->get('slug'); 
        $recordInfo  = Cart::where('slug', $slug)->first();
        $total_amount = $recordInfo->total_amount;
        $gig_id = $recordInfo->gig_id;
        
        $card_number = $request->get('card_number');
        $card_type = $request->get('card_type');
        $expiry_month = $request->get('expiry_month');
        $expiry_year = $request->get('expiry_year');
        $cvv = $request->get('cvv');
        $name_on_card = $request->get('name_on_card');
       
        $nameArr = explode(' ', $name_on_card);
        $firstName = urlencode($nameArr[0]);
        $lastName = '';
        if(isset($nameArr[1])){
            $lastName = urlencode($nameArr[1]);
        }
        
        $city = 'Charleston';
        $zipcode = '25301';
        $countryCode = 'US';
        
        $currencyID = urlencode('USD');
        $paymentType = urlencode('Sale');    // or 'Sale' //Authorization
        
        $creditCardType = urlencode($card_type);
        $creditCardNumber = urlencode($card_number);
        $padDateMonth = urlencode(str_pad($expiry_month, 2, '0', STR_PAD_LEFT));
        $expDateYear = urlencode($expiry_year);        
        $cvv2Number = urlencode($cvv);
        
        $zip = urlencode($zipcode);
        $country = urlencode($countryCode);    // US or other valid country code
        $amount = urlencode($recordInfo->total_amount);

        $nvpStr = "&PAYMENTACTION=$paymentType&AMT=$amount&CREDITCARDTYPE=$creditCardType&ACCT=$creditCardNumber" .
                "&EXPDATE=$padDateMonth$expDateYear&CVV2=$cvv2Number&FIRSTNAME=$firstName&LASTNAME=$lastName" .
                "&ZIP=$zip&COUNTRYCODE=$country&CURRENCYCODE=$currencyID";
       
        $httpParsedResponseAr = $this->PPHttpPost('DoDirectPayment', $nvpStr);
        
        if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {
            $transactionId = $httpParsedResponseAr['TRANSACTIONID'];            
            $wallet_trn_id = $transactionId;
            $paymenttype  = 'PayPal'; 
            
            $serialisedData = array();
            $serialisedData['user_id'] = Session::get('user_id');
            $serialisedData['order_slug'] = bin2hex(openssl_random_pseudo_bytes(30));
            $serialisedData['order_number'] = $wallet_trn_id;
            $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(30));
            $serialisedData['status'] =  1;
            $serialisedData['amount'] =  $total_amount;
            $serialisedData['gig_id'] =  $gig_id;
            $serialisedData['transaction_id'] =  $wallet_trn_id;
            Payment::insert($serialisedData);
                    
            $serialisedData = array();
            $serialisedData['buyer_id'] =  Session::get('user_id');
            $serialisedData['gig_id'] = $recordInfo->gig_id;
            $serialisedData['seller_id'] = $recordInfo->Gig->user_id;
            $serialisedData['package'] = $recordInfo->package;
            $serialisedData['amount'] = $recordInfo->amount;
            $serialisedData['extra_ids'] = $recordInfo->extra_ids;
            $serialisedData['extra_amount'] = $recordInfo->extra_amount;
            $serialisedData['total_amount'] = $recordInfo->total_amount;
            $serialisedData['revenue'] = $recordInfo->revenue;
            $serialisedData['admin_amount'] = $recordInfo->admin_amount;
            $serialisedData['admin_commission'] = $recordInfo->admin_commission;
            $serialisedData['quantity'] = 1;
            $serialisedData['pay_type'] = 'PayPal';
            $serialisedData['paypal_trn_id'] = $wallet_trn_id;
            $serialisedData['status'] = 1;
            $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(20));
            $serialisedData = $this->serialiseFormData($serialisedData);
            Myorder::insert($serialisedData);

            // Add amount to seller wallet
            /*$serialisedData = array();
            $serialisedData['user_id'] = $recordInfo->Gig->user_id;
            $serialisedData['gig_id'] = $recordInfo->gig_id;
            $serialisedData['amount'] = $recordInfo->total_amount;
            $serialisedData['revenue'] = $recordInfo->revenue-$recordInfo->admin_commission;
            $serialisedData['admin_commission'] = $recordInfo->admin_commission;
            $serialisedData['trn_id'] = $wallet_trn_id;
            $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(20));
            $serialisedData['type'] = 6;
            $serialisedData['add_minus'] = 1;
            $serialisedData['source'] = 'From Gig: <b>'.$recordInfo->Gig->title.'</b>';
            $serialisedData['status'] = 1;
            Wallet::insert($serialisedData); */
            $amountseller = CURR.$recordInfo->revenue;
            
            // Email sent to login user
            $gigInfo = Gig::where('id', $recordInfo->gig_id)->first();
            $loginUserInfo = User::where('id', Session::get('user_id'))->first();
            $loginuser = $loginUserInfo->first_name . ' ' . $loginUserInfo->last_name;
            $amount = CURR.$total_amount;
            $transactionId = $wallet_trn_id;            
            $datetime = date('M d, Y');
            $title  = $gigInfo->title;                

            $emailId = $loginUserInfo->email_address;
            $emailTemplate = DB::table('emailtemplates')->where('id', 13)->first();
            $toRepArray = array('[!username!]', '[!title!]', '[!amount!]', '[!transactionId!]', '[!paymenttype!]', '[!datetime!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
            $fromRepArray = array($loginuser, $title, $amount, $transactionId, $paymenttype, $datetime, HTTP_PATH, SITE_TITLE);
            $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
            $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
            Mail::to($emailId)->send(new SendMailable($emailBody,$emailSubject));
            
            // Email sent to admin user
            $adminInfo = DB::table('admins')->where('id', 1)->first();
            $emailId = $adminInfo->email;
            $emailTemplate = DB::table('emailtemplates')->where('id', 14)->first();
            $toRepArray = array('[!username!]', '[!title!]', '[!amount!]', '[!transactionId!]', '[!paymenttype!]', '[!datetime!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
            $fromRepArray = array($loginuser, $title, $amount, $transactionId, $paymenttype, $datetime, HTTP_PATH, SITE_TITLE);
            $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
            $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
            Mail::to($emailId)->send(new SendMailable($emailBody,$emailSubject));
            
            // Email sent to seller user
            $sellerInfo = User::where('id', $gigInfo->user_id)->first();
            $emailId = $sellerInfo->email_address;
            $sellername = $sellerInfo->first_name . ' ' . $sellerInfo->last_name;
            
            $emailTemplate = DB::table('emailtemplates')->where('id', 15)->first();
            $toRepArray = array('[!username!]', '[!title!]', '[!amount!]', '[!transactionId!]', '[!paymenttype!]', '[!datetime!]', '[!sellername!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
            $fromRepArray = array($loginuser, $title, $amountseller, $transactionId, $paymenttype, $datetime, $sellername, HTTP_PATH, SITE_TITLE);
            $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
            $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
            Mail::to($emailId)->send(new SendMailable($emailBody,$emailSubject));
            
            Cart::where('id', $recordInfo->id)->delete();        
            Session::flash('success_message', "You have successfully purchased Gig using credit card payment.");
            return 1;
        } else {
            return urldecode($httpParsedResponseAr['L_LONGMESSAGE0']);            
        }        
    }
    
    public function history(Request $request){ 
        $pageTitle = 'PayPal ransaction History';
        $allrecords  = Payment::where('user_id', Session::get('user_id'))->orderBy('id', 'DESC')->get();
        return view('payments.history', ['title' => $pageTitle, 'allrecords'=>$allrecords]);  
    }
    
    public function acceptandpay(Request $request, $slug=null) {
        $pageTitle = 'Order Summary';   
        $siteSettings = DB::table('settings')->where('id', 1)->first();
        $servicesofferInfo = Servicesoffer::where('slug', $slug)->first();
        $serviceInfo = Service::where('id', $servicesofferInfo->service_id)->first();
        $amountArray = $this->getWallerAmount(Session::get('user_id')); 
        return view('payments.acceptandpay', ['title' => $pageTitle,'siteSettings'=> $siteSettings,'serviceInfo'=>$serviceInfo, 'servicesofferInfo'=>$servicesofferInfo, 'amountArray'=>$amountArray]);
    }
    
    
    public function paywithcardservice(Request $request) {
        $pageTitle = 'Order Summary';   
        $slug = $request->get('slug');
        $servicesofferInfo  = Servicesoffer::where('slug', $slug)->first();
        $serviceInfo = Service::where('id', $servicesofferInfo->service_id)->first();
        $serviceoffer_id = $servicesofferInfo->id;
        $service_id = $servicesofferInfo->service_id;
        $settingsInfo = DB::table('settings')->where('id', 1)->first();
        $admin_commission = $settingsInfo->admin_commission;
        $commission_admin = $settingsInfo->commission_admin;
        $admin_commission_per = isset($settingsInfo->admin_commission)?$settingsInfo->admin_commission:0;
        $commission_admin_per = isset($settingsInfo->commission_admin)?$settingsInfo->commission_admin:0;
        
        $extra_amount = 0;
        $revenue = $servicesofferInfo->amount + $extra_amount;
        $admin_commission_per = round($revenue * $admin_commission_per / 100, 2);
        $commission_amount_per = round($revenue * $commission_admin_per / 100, 2);
        
        if ($admin_commission_per > $admin_commission) {
            $admin_amount = $admin_commission_per;
        } else {
            $admin_amount = $admin_commission;
        }
        if ($commission_amount_per > $commission_admin) {
            $commission_amount = $commission_amount_per;
        } else {
            $commission_amount = $commission_admin;
        }

        $total_amount = $revenue + $admin_amount;      
        
        $card_number = $request->get('card_number');
        $card_type = $request->get('card_type');
        $expiry_month = $request->get('expiry_month');
        $expiry_year = $request->get('expiry_year');
        $cvv = $request->get('cvv');
        $name_on_card = $request->get('name_on_card');
       
        $nameArr = explode(' ', $name_on_card);
        $firstName = urlencode($nameArr[0]);
        $lastName = '';
        if(isset($nameArr[1]) && $nameArr[1] !='') {
            $lastName = urlencode($nameArr[1]); 
        }
        $city = 'Charleston';
        $zipcode = '25301';
        $countryCode = 'US';
        
        $currencyID = urlencode('USD');
        $paymentType = urlencode('Sale');    // or 'Sale' //Authorization
        
        $creditCardType = urlencode($card_type);
        $creditCardNumber = urlencode($card_number);
        $padDateMonth = urlencode(str_pad($expiry_month, 2, '0', STR_PAD_LEFT));
        $expDateYear = urlencode($expiry_year);        
        $cvv2Number = urlencode($cvv);
        
        $zip = urlencode($zipcode);
        $country = urlencode($countryCode);    // US or other valid country code
        $amount = urlencode($total_amount);

        $nvpStr = "&PAYMENTACTION=$paymentType&AMT=$amount&CREDITCARDTYPE=$creditCardType&ACCT=$creditCardNumber" .
                "&EXPDATE=$padDateMonth$expDateYear&CVV2=$cvv2Number&FIRSTNAME=$firstName&LASTNAME=$lastName" .
                "&ZIP=$zip&COUNTRYCODE=$country&CURRENCYCODE=$currencyID";
       
        $httpParsedResponseAr = $this->PPHttpPost('DoDirectPayment', $nvpStr);
        
        if ("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) {
            $transactionId = $httpParsedResponseAr['TRANSACTIONID'];            
            $wallet_trn_id = $transactionId;
            
            $serialisedData = array();
            $serialisedData['user_id'] = Session::get('user_id');
            $serialisedData['order_slug'] = bin2hex(openssl_random_pseudo_bytes(30));
            $serialisedData['order_number'] = $wallet_trn_id;
            $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(30));
            $serialisedData['status'] =  1;
            $serialisedData['amount'] =  $total_amount;
            $serialisedData['service_id'] =  $service_id;
            $serialisedData['serviceoffer_id'] =  $serviceoffer_id;
            $serialisedData['transaction_id'] =  $wallet_trn_id;
            Payment::insert($serialisedData);
            
            // Add amount to seller wallet
        $serialisedData = array();
        $serialisedData['user_id'] = $servicesofferInfo->user_id;
        $serialisedData['service_id'] = $service_id;
        $serialisedData['amount'] = $total_amount;
        $serialisedData['revenue'] = $total_amount- $admin_amount;
        $serialisedData['admin_commission'] = $admin_amount;
        $serialisedData['commission_admin'] = $commission_amount;
        $serialisedData['trn_id'] = $wallet_trn_id;
        $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(20));
        $serialisedData['type'] = 6;
        $serialisedData['add_minus'] = 1;
        $serialisedData['source'] = 'From Service: <b>'.$serviceInfo->title.'</b>';
        $serialisedData['status'] = 1;
        //Wallet::insert($serialisedData);
            
            $paymenttype  = 'PayPal'; 
            Servicesoffer::where('id', $serviceoffer_id)->update(array('status'=>1, 'total_amount'=>$total_amount, 'admin_amount'=>$admin_amount)); 
            Service::where('id', $service_id)->update(array('status'=>5, 'payment_status'=>1, 'pay_type'=>$paymenttype, 'serviceoffer_slug'=>$servicesofferInfo->slug));                
           
            // Email sent to login user
            $loginUserInfo = User::where('id', Session::get('user_id'))->first();
            $loginuser = $loginUserInfo->first_name . ' ' . $loginUserInfo->last_name;
            $amount = CURR.$total_amount;
            $transactionId = $wallet_trn_id;            
            $datetime = date('M d, Y');
            $title  = $serviceInfo->title;                

            $emailId = $loginUserInfo->email_address;
            $emailTemplate = DB::table('emailtemplates')->where('id', 10)->first();
            $toRepArray = array('[!username!]', '[!title!]', '[!amount!]', '[!transactionId!]', '[!paymenttype!]', '[!datetime!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
            $fromRepArray = array($loginuser, $title, $amount, $transactionId, $paymenttype, $datetime, HTTP_PATH, SITE_TITLE);
            $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
            $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
            Mail::to($emailId)->send(new SendMailable($emailBody,$emailSubject));
            
            // Email sent to admin user
            $adminInfo = DB::table('admins')->where('id', 1)->first();
            $emailId = $adminInfo->email;
            $emailTemplate = DB::table('emailtemplates')->where('id', 11)->first();
            $toRepArray = array('[!username!]', '[!title!]', '[!amount!]', '[!transactionId!]', '[!paymenttype!]', '[!datetime!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
            $fromRepArray = array($loginuser, $title, $amount, $transactionId, $paymenttype, $datetime, HTTP_PATH, SITE_TITLE);
            $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
            $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
            Mail::to($emailId)->send(new SendMailable($emailBody,$emailSubject));
            
            // Email sent to seller user
            $sellerInfo = User::where('id', $servicesofferInfo->user_id)->first();
            $emailId = $sellerInfo->email_address;
            $sellername = $sellerInfo->first_name . ' ' . $sellerInfo->last_name;
            
            $emailTemplate = DB::table('emailtemplates')->where('id', 12)->first();
            $toRepArray = array('[!username!]', '[!title!]', '[!amount!]', '[!transactionId!]', '[!paymenttype!]', '[!datetime!]', '[!sellername!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
            $fromRepArray = array($loginuser, $title, $amount, $transactionId, $paymenttype, $datetime, $sellername, HTTP_PATH, SITE_TITLE);
            $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
            $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
            Mail::to($emailId)->send(new SendMailable($emailBody,$emailSubject));
            
            Session::flash('success_message', "You have successfully make payment for your service acccpted.");
            return 1;
        } else {
            return urldecode($httpParsedResponseAr['L_LONGMESSAGE0']);            
        }        
    }
    
    public function payviawalletservice(Request $request) {
        $pageTitle = 'Order Summary';   
        $slug = $request->get('slug');
        $servicesofferInfo  = Servicesoffer::where('slug', $slug)->first();
        $serviceInfo = Service::where('id', $servicesofferInfo->service_id)->first();
        $siteSettings = DB::table('settings')->where('id', 1)->first();
        
        $serviceoffer_id = $servicesofferInfo->id;
        $service_id = $servicesofferInfo->service_id;        
        $adminAmount = round(($servicesofferInfo->amount * $siteSettings->admin_commission/100), 2);
        $total_amount = $servicesofferInfo->amount + $adminAmount;
        $wallet_trn_id = strtoupper(bin2hex(openssl_random_pseudo_bytes(8)));
		
		$commision_admin = $siteSettings->commission_admin;
        $commission_amount = round($servicesofferInfo->amount*$commision_admin/100, 2);
        
        // Add amount to seller wallet
        $serialisedData = array();
        $serialisedData['user_id'] = $servicesofferInfo->user_id;
        $serialisedData['service_id'] = $service_id;
        $serialisedData['amount'] = $total_amount;
        $serialisedData['revenue'] = $total_amount- $adminAmount;
        $serialisedData['admin_commission'] = $adminAmount;
        $serialisedData['commission_admin'] = $commission_amount;
        $serialisedData['trn_id'] = $wallet_trn_id;
        $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(20));
        $serialisedData['type'] = 6;
        $serialisedData['add_minus'] = 1;
        $serialisedData['source'] = 'From Service: <b>'.$serviceInfo->title.'</b>';
        $serialisedData['status'] = 1;
        //Wallet::insert($serialisedData);
        
        // Deduct amount to buyer wallet who accept request
        $serialisedData = array();
        $serialisedData['user_id'] = Session::get('user_id');
        $serialisedData['service_id'] = $service_id;
        $serialisedData['amount'] = $servicesofferInfo->amount;
        $serialisedData['revenue'] = -$total_amount;
        $serialisedData['admin_commission'] = $adminAmount;
        $serialisedData['trn_id'] = $wallet_trn_id;
        $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(20));
        $serialisedData['type'] = 5;
        $serialisedData['add_minus'] = 0;
        $serialisedData['source'] = 'Pay for Service Accept: <b>' . $serviceInfo->title . '</b>';
        $serialisedData['status'] = 1;
        Wallet::insert($serialisedData);    
        
        $paymenttype  = 'Wallet'; 
        Servicesoffer::where('id', $serviceoffer_id)->update(array('status'=>1, 'total_amount'=>$total_amount, 'admin_amount'=>$adminAmount)); 
        Service::where('id', $service_id)->update(array('status'=>5, 'payment_status'=>1, 'pay_type'=>$paymenttype, 'serviceoffer_slug'=>$servicesofferInfo->slug));                
           
        // Email sent to login user
        $loginUserInfo = User::where('id', Session::get('user_id'))->first();
        $loginuser = $loginUserInfo->first_name . ' ' . $loginUserInfo->last_name;
        $amount = CURR.$total_amount;
        $transactionId = $wallet_trn_id;
        $datetime = date('M d, Y');
        $title  = $serviceInfo->title;                

        $emailId = $loginUserInfo->email_address;
        $emailTemplate = DB::table('emailtemplates')->where('id', 10)->first();
        $toRepArray = array('[!username!]', '[!title!]', '[!amount!]', '[!transactionId!]', '[!paymenttype!]', '[!datetime!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
        $fromRepArray = array($loginuser, $title, $amount, $transactionId, $paymenttype, $datetime, HTTP_PATH, SITE_TITLE);
        $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
        $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
        Mail::to($emailId)->send(new SendMailable($emailBody,$emailSubject));
            
        // Email sent to admin user
        $adminInfo = DB::table('admins')->where('id', 1)->first();
        $emailId = $adminInfo->email;
        $emailTemplate = DB::table('emailtemplates')->where('id', 11)->first();
        $toRepArray = array('[!username!]', '[!title!]', '[!amount!]', '[!transactionId!]', '[!paymenttype!]', '[!datetime!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
        $fromRepArray = array($loginuser, $title, $amount, $transactionId, $paymenttype, $datetime, HTTP_PATH, SITE_TITLE);
        $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
        $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
        Mail::to($emailId)->send(new SendMailable($emailBody,$emailSubject));
            
        // Email sent to seller user
        $sellerInfo = User::where('id', $servicesofferInfo->user_id)->first();
        $emailId = $sellerInfo->email_address;
        $sellername = $sellerInfo->first_name . ' ' . $sellerInfo->last_name;

        $emailTemplate = DB::table('emailtemplates')->where('id', 12)->first();
        $toRepArray = array('[!username!]', '[!title!]', '[!amount!]', '[!transactionId!]', '[!paymenttype!]', '[!datetime!]', '[!sellername!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
        $fromRepArray = array($loginuser, $title, $amount, $transactionId, $paymenttype, $datetime, $sellername, HTTP_PATH, SITE_TITLE);
        $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
        $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
        Mail::to($emailId)->send(new SendMailable($emailBody,$emailSubject));
        
        Session::flash('success_message', "You have successfully make payment using wallet balance your service acccpted.");
        return 1;        
    }
    
    public function paywithpaypalservice(Request $request, $slug = null) { 
        $pageTitle = 'Payment With PayPal';
        
        $servicesofferInfo = Servicesoffer::where('slug', $slug)->first();
        $serviceInfo = Service::where('id', $servicesofferInfo->service_id)->first();
        $settingsInfo = DB::table('settings')->where('id', 1)->first();
        $admin_commission = $settingsInfo->admin_commission;
        $commission_admin = $settingsInfo->commission_admin;
        
        $extra_amount = 0;
        $revenue = $servicesofferInfo->amount + $extra_amount;
        
            //$admin_amount = $admin_commission;
       
            $commission_amount = $commission_admin;
        
        $admin_amount = round(($servicesofferInfo->amount * $settingsInfo->admin_commission/100), 2);
        $total_amount = $revenue + $admin_amount;

        $serviceoffer_id = $servicesofferInfo->id;
        $service_id = $servicesofferInfo->service_id;

        $currencyID = urlencode(CURRENCY);
        $paymentType = urlencode('Sale');    // or 'Sale' //Authorization

        $totalAmt = urlencode($total_amount);
        $currency = urlencode(CURRENCY);

        $paypal_url = PAYPALURL;
        if ($settingsInfo->payment_mode == 1) {
            $paypal_url = PAYPALURLLIVE;
        }
        $paypal_email = $settingsInfo->paypal_email_address;

        return view('payments.paywithpaypal', ['paypal_url' => $paypal_url, 'paypal_email' => $paypal_email, 'title' => $pageTitle, 'amount' => $totalAmt, 'currency' => $currency, 'item_number' => $slug, 'product_name' => $serviceInfo->title, 'success_url' => HTTP_PATH . '/payments/successservice/' . $slug, 'cancel_url' => HTTP_PATH . '/payments/paypalcancelservice/' . $slug]);
    }
    
    public function paypalcancelservice(Request $request, $slug = null) {
        Session::flash('error_message', 'Sorry, your payment could not be completed, please try again');
        return Redirect::to('payments/history');
    }

    public function successservice(Request $request, $slug = null) {
        $pageTitle = 'Payment With PayPal';

        $servicesofferInfo = Servicesoffer::where('slug', $slug)->first();
        $serviceInfo = Service::where('id', $servicesofferInfo->service_id)->first();
        $settingsInfo = DB::table('settings')->where('id', 1)->first();
        $admin_commission = $settingsInfo->admin_commission;
        $commission_admin = $settingsInfo->commission_admin;
        
        $extra_amount = 0;
        $revenue = $servicesofferInfo->amount + $extra_amount;
        
        
            //$admin_amount = $admin_commission;
       
            $commission_amount = $commission_admin;
        
        $admin_amount = round(($servicesofferInfo->amount * $settingsInfo->admin_commission/100), 2);
        
        $total_amount = $revenue + $admin_amount;

        $serviceoffer_id = $servicesofferInfo->id;
        $service_id = $servicesofferInfo->service_id;
        
        $currencyID = urlencode(CURRENCY);
        $paymentType = urlencode('Sale');    // or 'Sale' //Authorization

        if (isset($_REQUEST['txn_id'])) {
            $transactionId = $_REQUEST['txn_id'];
            $amountPaid = $_REQUEST['mc_gross'];
        } elseif ($_REQUEST['tx']) {
            $transactionId = $_REQUEST['tx'];
            $amountPaid = $_REQUEST['amt'];
        }
//        $transactionId = 'TTT5645645';
//            $amountPaid = 60;
        $st = 'completed';
//echo '<pre>';print_r($transactionId);exit;
        $wallet_trn_id = $transactionId;
        $paymenttype = 'PayPal';

        $amount = $amountPaid;

        if ($transactionId) {
            $serialisedData = array();
            $serialisedData['user_id'] = Session::get('user_id');
            $serialisedData['order_slug'] = bin2hex(openssl_random_pseudo_bytes(30));
            $serialisedData['order_number'] = $wallet_trn_id;
            $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(30));
            $serialisedData['status'] = 1;
            $serialisedData['amount'] = $total_amount;
            $serialisedData['service_id'] = $serviceInfo->id;
            $serialisedData['transaction_id'] = $wallet_trn_id;
            Payment::insert($serialisedData);

            $serialisedData = array();
            //$serialisedData['buyer_id'] = $servicesofferInfo->user_id;
            $serialisedData['buyer_id'] = $serviceInfo->user_id;
            $serialisedData['service_id'] = $serviceInfo->id;
            //$serialisedData['seller_id'] = $serviceInfo->user_id;
            $serialisedData['seller_id'] = $servicesofferInfo->user_id;
            $serialisedData['package'] = 0;
            $serialisedData['amount'] = $total_amount;
            $serialisedData['extra_amount'] = $extra_amount;
            $serialisedData['total_amount'] = $total_amount;
            $serialisedData['revenue'] = $revenue;
            $serialisedData['admin_amount'] = $admin_amount;
            $serialisedData['admin_commission'] = $commission_amount;
            $serialisedData['quantity'] = 1;
            $serialisedData['pay_type'] = 'PayPal';
            $serialisedData['paypal_trn_id'] = $wallet_trn_id;
            $serialisedData['status'] = 1;
            $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(20));
            $serialisedData = $this->serialiseFormData($serialisedData);
            //Myorder::insert($serialisedData);

            // Add amount to seller wallet
            $serialisedData = array();
            $serialisedData['user_id'] = $serviceInfo->user_id;
            $serialisedData['service_id'] = $serviceInfo->id;
            $serialisedData['amount'] = $total_amount;
            $serialisedData['revenue'] = $revenue;
            $serialisedData['admin_commission'] = $commission_amount;
            $serialisedData['trn_id'] = $wallet_trn_id;
            $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(20));
            $serialisedData['type'] = 6;
            $serialisedData['add_minus'] = 1;
            $serialisedData['source'] = 'From Service: <b>' . $serviceInfo->title . '</b>';
            $serialisedData['status'] = 1;
            //Wallet::insert($serialisedData);
            $amountseller = CURR . $revenue;
            
            $paymenttype  = 'PayPal'; 
            Servicesoffer::where('id', $serviceoffer_id)->update(array('status'=>1, 'total_amount'=>$total_amount, 'admin_amount'=>$admin_amount)); 
            Service::where('id', $service_id)->update(array('status'=>5, 'payment_status'=>1, 'pay_type'=>$paymenttype, 'serviceoffer_slug'=>$servicesofferInfo->slug)); 

            // Email sent to login user
            $loginUserInfo = User::where('id', Session::get('user_id'))->first();
            $loginuser = $loginUserInfo->first_name . ' ' . $loginUserInfo->last_name;
            $amount = CURR . $total_amount;
            $transactionId = $wallet_trn_id;
            $datetime = date('M d, Y');
            $title = $serviceInfo->title;

            $emailId = $loginUserInfo->email_address;
            $emailTemplate = DB::table('emailtemplates')->where('id', 10)->first();
            $toRepArray = array('[!username!]', '[!title!]', '[!amount!]', '[!transactionId!]', '[!paymenttype!]', '[!datetime!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
            $fromRepArray = array($loginuser, $title, $amount, $transactionId, $paymenttype, $datetime, HTTP_PATH, SITE_TITLE);
            $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
            $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
            Mail::to($emailId)->send(new SendMailable($emailBody, $emailSubject));

            // Email sent to admin user
            $adminInfo = DB::table('admins')->where('id', 1)->first();
            $emailId = $adminInfo->email;
            $emailTemplate = DB::table('emailtemplates')->where('id', 11)->first();
            $toRepArray = array('[!username!]', '[!title!]', '[!amount!]', '[!transactionId!]', '[!paymenttype!]', '[!datetime!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
            $fromRepArray = array($loginuser, $title, $amount, $transactionId, $paymenttype, $datetime, HTTP_PATH, SITE_TITLE);
            $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
            $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
            Mail::to($emailId)->send(new SendMailable($emailBody, $emailSubject));

            // Email sent to seller user
            $sellerInfo = User::where('id', $servicesofferInfo->user_id)->first();
            $emailId = $sellerInfo->email_address;
            $sellername = $sellerInfo->first_name . ' ' . $sellerInfo->last_name;

            $emailTemplate = DB::table('emailtemplates')->where('id', 12)->first();
            $toRepArray = array('[!username!]', '[!title!]', '[!amount!]', '[!transactionId!]', '[!paymenttype!]', '[!datetime!]', '[!sellername!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
            $fromRepArray = array($loginuser, $title, $amount, $transactionId, $paymenttype, $datetime, $sellername, HTTP_PATH, SITE_TITLE);
            $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
            $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
            Mail::to($emailId)->send(new SendMailable($emailBody, $emailSubject));

            Session::flash('success_message', 'You have successfully purchased service using paypal payment');
            return Redirect::to('payments/history');
        }
    }
    
}