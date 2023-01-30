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
use Mail;
use App\Mail\SendMailable;
use App\Models\Wallet;
use App\Models\User;

class WalletsController extends Controller {    
    public function __construct() {
        $this->middleware('is_adminlogin');
    }
    
    public function index(Request $request){
        $pageTitle = 'Manage Withdraw Requests'; 
        $activetab = 'actwallets';
        $query = new Wallet();
        $query = $query->sortable();
        
        if ($request->has('keyword')) {
            $keyword = $request->get('keyword');
//            $query = $query->whereHas('User', function($q) use ($keyword) {
//                $q->where('first_name', 'like', '%'.$keyword.'%');
//            });
            
            $query->orWhereHas('User',function($q) use ($keyword){
                $q = $q->where('first_name', 'like', '%'.$keyword.'%')->orWhere('last_name', 'like', '%'.$keyword.'%')->orWhere(DB::raw("CONCAT(`first_name`, ' ', `last_name`)"), 'like', '%'.$keyword.'%');
            });
//            $query = $query->where(function($q) use ($keyword){
//                $q->where('name', 'like', '%'.$keyword.'%');
//            });
        }
        
        //$query = $query->where('type', 2)->orWhere('type', 3)->orWhere('type', 4);
        $query = $query->whereIn('type', array('1','2','3'));
//        $query = $query->orWhere(['type'=>2,'type'=>3]);
        
        $wallets = $query->orderBy('id','DESC')->paginate(50);
        if($request->ajax()){
            return view('elements.admin.wallets.index', ['allrecords'=>$wallets]);
        }
        return view('admin.wallets.index', ['title'=>$pageTitle, $activetab=>1,'allrecords'=>$wallets]);
    }

    public function history(Request $request, $slug){
        $userInfo = User::where('slug', $slug)->first();
        if(!$userInfo){
            return Redirect::to('admin/wallets');
        }
        $pageTitle = 'View Wallet History'; 
        $activetab = 'actwallets';
        $query = new Wallet();
        $query = $query->sortable();
        $query = $query->where('user_id', $userInfo->id);
        $wallets = $query->orderBy('id','DESC')->paginate(50);
        if($request->ajax()){
            return view('elements.admin.wallets.history', ['allrecords'=>$wallets]);
        }
        
        $amountArray = $this->getWallerAmount($userInfo->id);  
        
        return view('admin.wallets.history', ['title'=>$pageTitle, $activetab=>1,'allrecords'=>$wallets, 'userInfo'=>$userInfo,'amountArray'=>$amountArray]);
    }
    
    public function approvereject($type=null, $slug=null){
        if($type == 'accept'){
            $trn_id = strtoupper(date('Ymd').'wt'.bin2hex(openssl_random_pseudo_bytes(4)));
            Wallet::where('slug', $slug)->update(array('type' => '3', 'status' => '1', 'trn_id'=>$trn_id));
            Session::flash('success_message', "You have successfully approved amount withdraw request.");
        }elseif($type == 'reject'){
            Wallet::where('slug', $slug)->update(array('type' => '4','status' => '2'));
            Session::flash('success_message', "You have successfully rejected amount withdraw request.");
        }             
        return Redirect::to('admin/wallets');
    }
    
}

?>