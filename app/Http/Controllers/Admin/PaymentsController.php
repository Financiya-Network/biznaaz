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

use App\Models\Payment;

class PaymentsController extends Controller {    
    public function __construct() {
        $this->middleware('is_adminlogin');
    }
    
    public function index(Request $request){
        $pageTitle = 'View PayPal Transaction History'; 
        $activetab = 'actpaypal';
        $query = new Payment();
        $query = $query->sortable();
        
        if ($request->has('keyword')) {
            $keyword = $request->get('keyword');
            $query = $query->where(function($q) use ($keyword){
                $q->where('transaction_id', 'like', '%'.$keyword.'%');
            });
        }
        
        $qualifications = $query->orderBy('id','DESC')->paginate(50);
        if($request->ajax()){
            return view('elements.admin.payments.index', ['allrecords'=>$qualifications]);
        }
        return view('admin.payments.index', ['title'=>$pageTitle, $activetab=>1,'allrecords'=>$qualifications]);
    }

}
?>