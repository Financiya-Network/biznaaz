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
use App\Models\Wallet;

class WalletsController extends Controller {
   
    public function __construct() {
        $this->middleware('is_userlogin', ['except' => ['']]);
    }
    
    public function earnings(Request $request){ 
        $pageTitle = 'My Earnings';
        $query = new Wallet();    
        
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
            return view('elements.wallets.earnings', ['allrecords'=>$allrecords, 'page'=>$page]);
        }
        
        $walletTypes = array();        
        $amountArray = $this->getWallerAmount(Session::get('user_id'));        
        return view('wallets.earnings', ['title' => $pageTitle, 'allrecords'=>$allrecords, 'walletTypes'=>$walletTypes, 'amountArray'=>$amountArray, 'page'=>$page]);  
    }
    
    public function withdrawrequest(Request $request) {
        $siteSettings = DB::table('settings')->where('id', 1)->first();
        if (!empty($request->all())) {
            $request->validate([
                'amount' => 'required',
                ]
            );      
        }
        
        $amount = $request->get('amount');
        $amountArray = $this->getWallerAmount(Session::get('user_id'));          
        if($amount < $siteSettings->minimum_withdraw_amount){
            Session::flash('error_message', "You can not send withdraw amount request less than minimum withdraw amount.");
        }elseif($amount >  $amountArray['availableforwithdraw']){
            Session::flash('error_message', "You can not send withdraw request more than available balance.");            
        }else{        
            $isOldRequest = Wallet::where(['user_id'=>Session::get('user_id'), 'type'=>2])->first();
            if($isOldRequest){
                Session::flash('error_message', "You can send only one request withdraw at a time.");
            }else{
                $serialisedData = array();
                $serialisedData['user_id'] = Session::get('user_id');
                $serialisedData['service_id'] = 0;
                $serialisedData['amount'] = $amount;
                $serialisedData['revenue'] = -$amount;
                $serialisedData['admin_commission'] = 0;
                $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(20));
                $serialisedData['type'] = 2;
                $serialisedData['add_minus'] = 0;
                $serialisedData['source'] = 'Withdraw Amount</b>';
                Wallet::insert($serialisedData);
                Session::flash('success_message', "Your withdraw amount request sent successfully and waiting for admin approval.");
            }
        }
        return Redirect::to('/earnings');
    }
    
}