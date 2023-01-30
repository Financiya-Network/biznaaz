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
use App\Models\Qualification;
use Mail;
use App\Mail\SendMailable;

use App\Models\Myorder;

class ViewordersController extends Controller {    
    public function __construct() {
        $this->middleware('is_adminlogin');
    }
    
    public function index(Request $request){
        $pageTitle = 'View Gig Orders'; 
        $activetab = 'actorders';
        $query = new Myorder();
        $query = $query->with('Buyer')->with('Seller');
        $query = $query->sortable();
        
        if ($request->has('keyword') && $request->get('keyword')) {
            $keyword = $request->get('keyword');
            $query->where('paypal_trn_id', 'like', '%'.$keyword.'%')->orWhere('wallet_trn_id', 'like', '%'.$keyword.'%')
            ->orWhereHas('Buyer',function($q) use ($keyword){
                $q = $q->where('first_name', 'like', '%'.$keyword.'%')->orWhere('last_name', 'like', '%'.$keyword.'%')->orWhere(DB::raw("CONCAT(`first_name`, ' ', `last_name`)"), 'like', '%'.$keyword.'%');
            })
            ->orWhereHas('Seller', function ($q) use ($keyword) {
                $q = $q->where('first_name', 'like', '%'.$keyword.'%')->orWhere('last_name', 'like', '%'.$keyword.'%')->orWhere(DB::raw("CONCAT(`first_name`, ' ', `last_name`)"), 'like', '%'.$keyword.'%');
            });
        }
        
        $qualifications = $query->orderBy('id','DESC')->paginate(50);
        if($request->ajax()){
            return view('elements.admin.vieworders.index', ['allrecords'=>$qualifications]);
        }
        return view('admin.vieworders.index', ['title'=>$pageTitle, $activetab=>1,'allrecords'=>$qualifications]);
    }

}
?>