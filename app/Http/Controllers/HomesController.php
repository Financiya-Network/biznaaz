<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Mail;
use DB;
use Session;
use Input;
use Validator;
use Cookie;
use Redirect;

use App\Models\Gig;
use App\Models\User;
use App\Models\Myorder;
use App\Models\Banner;

class HomesController extends Controller {
    
    
    public function index(){ 

       $pageTitle = 'Welcome';
       
       $query = new Gig();
        $query = $query->with('User');
        $query = $query->where('status', 1);
        $query = $query->where('basic_price', '!=', 0);
        $query = $query->where('pause', 1);
        $query = $query->whereNull('type_gig');
        
        $avlusers = [];
        $avl = DB::table('users')->where('hide_weekend', '=', 0)->where('accept_orders', '=', 1)->get()->toArray();
        foreach ($avl as $key) {
            array_push($avlusers, $key->id);
        }
        
        $str = implode(',', $avlusers);
        $query = $query->whereIn('user_id', explode(",", $str)); 
        
        
        
       $gigcatlist = $query->orderBy('id', 'DESC')->limit(10)->get();
       $mysavegigs = $this->getSavedGigs();
       $recentCompletedlist  = Myorder::with('Gig')->whereHas('Gig', function($q){$q->where('title', '!=', '')->whereHas('Category', function($q1){$q1->where('id', '>', 0); }); })->where('status', 2)->orderBy('id', 'ASC')->limit(16)->get();
       if(Session::get('user_id')){
           $bannerList = Banner::where('type', 'logged_user')->get();
           $loginuser = User::where(['id'=>Session::get('user_id')])->first();
           return view('homes.loginindex', ['title' => $pageTitle, 'loginuser'=>$loginuser, 'gigcatlist'=>$gigcatlist, 'bannerList' => $bannerList, 'mysavegigs'=>$mysavegigs, 'recentCompletedlist'=>$recentCompletedlist]);
       }else{
           
           $bannerList = Banner::where('type', 'visitor')->get();
           $testimonils = DB::table('testimonials')->where('status', 1)->orderBy('id', 'DESC')->limit(6)->get();
           return view('homes.index', ['title' => $pageTitle, 'fixheader'=>1, 'gigcatlist'=>$gigcatlist, 'bannerList' => $bannerList, 'mysavegigs'=>$mysavegigs, 'recentCompletedlist'=>$recentCompletedlist, 'testimonils'=>$testimonils]);     
       }
       
    }
    public function maintenance(){
        $pageTitle = 'Welcome';
       
        $query = new Gig();
         $query = $query->with('User');
         $query = $query->where('status', 1);
         $query = $query->where('basic_price', '!=', 0);
         $query = $query->where('pause', 1);
         $query = $query->whereNull('type_gig');
         
         $avlusers = [];
         $avl = DB::table('users')->where('hide_weekend', '=', 0)->where('accept_orders', '=', 1)->get()->toArray();
         foreach ($avl as $key) {
             array_push($avlusers, $key->id);
         }
         
         $str = implode(',', $avlusers);
         $query = $query->whereIn('user_id', explode(",", $str)); 
         
         
         
        $gigcatlist = $query->orderBy('id', 'DESC')->limit(10)->get();
        $mysavegigs = $this->getSavedGigs();
        $recentCompletedlist  = Myorder::with('Gig')->whereHas('Gig', function($q){$q->where('title', '!=', '')->whereHas('Category', function($q1){$q1->where('id', '>', 0); }); })->where('status', 2)->orderBy('id', 'ASC')->limit(16)->get();
        if(Session::get('user_id')){
            $bannerList = Banner::where('type', 'logged_user')->get();
            $loginuser = User::where(['id'=>Session::get('user_id')])->first();
            return view('homes.loginindex', ['title' => $pageTitle, 'loginuser'=>$loginuser, 'gigcatlist'=>$gigcatlist, 'bannerList' => $bannerList, 'mysavegigs'=>$mysavegigs, 'recentCompletedlist'=>$recentCompletedlist]);
        }else{
            
            $bannerList = Banner::where('type', 'visitor')->get();
            $testimonils = DB::table('testimonials')->where('status', 1)->orderBy('id', 'DESC')->limit(6)->get();
            return view('homes.maintenance', ['title' => $pageTitle, 'fixheader'=>1, 'gigcatlist'=>$gigcatlist, 'bannerList' => $bannerList, 'mysavegigs'=>$mysavegigs, 'recentCompletedlist'=>$recentCompletedlist, 'testimonils'=>$testimonils]);     
        }
       
    }
    public function job(){
        $pageTitle = 'Welcome';
       
        $query = new Gig();
         $query = $query->with('User');
         $query = $query->where('status', 1);
         $query = $query->where('basic_price', '!=', 0);
         $query = $query->where('pause', 1);
         $query = $query->whereNull('type_gig');
         
         $avlusers = [];
         $avl = DB::table('users')->where('hide_weekend', '=', 0)->where('accept_orders', '=', 1)->get()->toArray();
         foreach ($avl as $key) {
             array_push($avlusers, $key->id);
         }
         
         $str = implode(',', $avlusers);
         $query = $query->whereIn('user_id', explode(",", $str)); 
         
         
         
        $gigcatlist = $query->orderBy('id', 'DESC')->limit(10)->get();
        $mysavegigs = $this->getSavedGigs();
        $recentCompletedlist  = Myorder::with('Gig')->whereHas('Gig', function($q){$q->where('title', '!=', '')->whereHas('Category', function($q1){$q1->where('id', '>', 0); }); })->where('status', 2)->orderBy('id', 'ASC')->limit(16)->get();
        if(Session::get('user_id')){
            $bannerList = Banner::where('type', 'logged_user')->get();
            $loginuser = User::where(['id'=>Session::get('user_id')])->first();
            return view('homes.loginindex', ['title' => $pageTitle, 'loginuser'=>$loginuser, 'gigcatlist'=>$gigcatlist, 'bannerList' => $bannerList, 'mysavegigs'=>$mysavegigs, 'recentCompletedlist'=>$recentCompletedlist]);
        }else{
            
            $bannerList = Banner::where('type', 'visitor')->get();
            $testimonils = DB::table('testimonials')->where('status', 1)->orderBy('id', 'DESC')->limit(6)->get();
            return view('homes.job', ['title' => $pageTitle, 'fixheader'=>1, 'gigcatlist'=>$gigcatlist, 'bannerList' => $bannerList, 'mysavegigs'=>$mysavegigs, 'recentCompletedlist'=>$recentCompletedlist, 'testimonils'=>$testimonils]);     
        }
       
    }

    public function index1(){ 

        $pageTitle = 'Welcome';
        
        $query = new Gig();
         $query = $query->with('User');
         $query = $query->where('status', 1);
         $query = $query->where('basic_price', '!=', 0);
         $query = $query->where('pause', 1);
         $query = $query->whereNull('type_gig');
         
         $avlusers = [];
         $avl = DB::table('users')->where('hide_weekend', '=', 0)->where('accept_orders', '=', 1)->get()->toArray();
         foreach ($avl as $key) {
             array_push($avlusers, $key->id);
         }
         
         $str = implode(',', $avlusers);
         $query = $query->whereIn('user_id', explode(",", $str)); 

        //  $pageTitle = 'Login';
        //  $input = Input::all();
 
       
        //  if (!empty($input)) {
        //      $rules = array(
        //          'email_address' => 'required|email',
        //          'password' => 'required'
        //      );
        //      $validator = Validator::make($input, $rules);
             
        //      if ($validator->fails()) {
        //          return Redirect::to('/login')->withErrors($validator)->withInput(Input::except('password'));
        //      } else {
        //          $userInfo = User::where('email_address', $input['email_address'])->first();
                 
        //          if (!empty($userInfo)) {
        //              if (password_verify($input['password'], $userInfo->password)) {
        //                  if ($userInfo->status == 1 && $userInfo->activation_status == 1) {
        //                      if (isset($input['user_remember']) && $input['user_remember'] == '1') {
        //                          Cookie::queue('user_email_address', $userInfo->email_address, time() + 60 * 60 * 24 * 7, "/");
        //                          Cookie::queue('user_password', $input['password'], time() + 60 * 60 * 24 * 7, "/");
        //                          Cookie::queue('user_remember', '1', time() + 60 * 60 * 24 * 100, "/");
        //                      } else {
        //                          Cookie::queue('user_email_address', '', time() + 60 * 60 * 24 * 7, "/");
        //                          Cookie::queue('user_password', '', time() + 60 * 60 * 24 * 7, "/");
        //                          Cookie::queue('user_remember', '', time() + 60 * 60 * 24 * 7, "/");
        //                      }
        //                      Session::put('user_id', $userInfo->id);
        //                      Session::put('user_name', ucwords($userInfo->first_name . ' ' . $userInfo->last_name));
        //                      Session::put('email_address', $userInfo->email_address);
        //                      if (Session::has('redirecturl')){
        //        $redirecturl =  Session::get('redirecturl');
        //        return Redirect::to($redirecturl);
        //      }else{
        //          return Redirect::to('users/dashboard');
        //      }
                             
        //                  } else if ($userInfo->status == 1 && $userInfo->activation_status == 0) {
        //                      $error = 'You need to activate your account before login.';
        //                  } else if ($userInfo->status == 0 && $userInfo->activation_status == 0) {
        //                      $error = 'Your account might have been temporarily disabled. Please contact us for more details.';
        //                  }else if ($userInfo->status == 0 && $userInfo->activation_status == 1) { 
        //                      $error = 'Your account might have been temporarily disabled. Please contact us for more details.';
        //                  }
        //              } else {
        //                  $error = 'Invalid email or password.';
        //              }
        //          } else {
        //              $error = 'Invalid email or password.';
        //          }
        //          return Redirect::to('/login')->withErrors($error)->withInput(Input::except('password'));
        //      }
        //  }
        //  return view('users.login', ['title' => $pageTitle]);
         
         
         
        $gigcatlist = $query->orderBy('id', 'DESC')->limit(10)->get();
        $mysavegigs = $this->getSavedGigs();
        $recentCompletedlist  = Myorder::with('Gig')->whereHas('Gig', function($q){$q->where('title', '!=', '')->whereHas('Category', function($q1){$q1->where('id', '>', 0); }); })->where('status', 2)->orderBy('id', 'ASC')->limit(16)->get();
        if(Session::get('user_id')){
            $bannerList = Banner::where('type', 'logged_user')->get();
            $loginuser = User::where(['id'=>Session::get('user_id')])->first();
            return view('homes.loginindex', ['title' => $pageTitle, 'loginuser'=>$loginuser, 'gigcatlist'=>$gigcatlist, 'bannerList' => $bannerList, 'mysavegigs'=>$mysavegigs, 'recentCompletedlist'=>$recentCompletedlist]);
        }else{
            
            $bannerList = Banner::where('type', 'visitor')->get();
            $testimonils = DB::table('testimonials')->where('status', 1)->orderBy('id', 'DESC')->limit(6)->get();
            return view('homes.index1', ['title' => $pageTitle, 'fixheader'=>1, 'gigcatlist'=>$gigcatlist, 'bannerList' => $bannerList, 'mysavegigs'=>$mysavegigs, 'recentCompletedlist'=>$recentCompletedlist, 'testimonils'=>$testimonils]);     
        }
        
     }

     public function index2(){ 

        $pageTitle = 'Welcome';
        
        $query = new Gig();
         $query = $query->with('User');
         $query = $query->where('status', 1);
         $query = $query->where('basic_price', '!=', 0);
         $query = $query->where('pause', 1);
         $query = $query->whereNull('type_gig');
         
         $avlusers = [];
         $avl = DB::table('users')->where('hide_weekend', '=', 0)->where('accept_orders', '=', 1)->get()->toArray();
         foreach ($avl as $key) {
             array_push($avlusers, $key->id);
         }
         
         $str = implode(',', $avlusers);
         $query = $query->whereIn('user_id', explode(",", $str)); 
         
         
         
        $gigcatlist = $query->orderBy('id', 'DESC')->limit(10)->get();
        $mysavegigs = $this->getSavedGigs();
        $recentCompletedlist  = Myorder::with('Gig')->whereHas('Gig', function($q){$q->where('title', '!=', '')->whereHas('Category', function($q1){$q1->where('id', '>', 0); }); })->where('status', 2)->orderBy('id', 'ASC')->limit(16)->get();
        if(Session::get('user_id')){
            $bannerList = Banner::where('type', 'logged_user')->get();
            $loginuser = User::where(['id'=>Session::get('user_id')])->first();
            return view('homes.loginindex', ['title' => $pageTitle, 'loginuser'=>$loginuser, 'gigcatlist'=>$gigcatlist, 'bannerList' => $bannerList, 'mysavegigs'=>$mysavegigs, 'recentCompletedlist'=>$recentCompletedlist]);
        }else{
            
            $bannerList = Banner::where('type', 'visitor')->get();
            $testimonils = DB::table('testimonials')->where('status', 1)->orderBy('id', 'DESC')->limit(6)->get();
            return view('homes.become-seller', ['title' => $pageTitle, 'fixheader'=>1, 'gigcatlist'=>$gigcatlist, 'bannerList' => $bannerList, 'mysavegigs'=>$mysavegigs, 'recentCompletedlist'=>$recentCompletedlist, 'testimonils'=>$testimonils]);     
        }
        
     }
    public function home(){ 
       $pageTitle = 'Welcome';   
       
    }
    
    public function updatedata() {
        $pageTitle = __('message.Update Data');
        
        // MySQL host
$mysql_host = 'localhost';
// MySQL username
$mysql_username = 'lsgigger_gigger';
// MySQL password
$mysql_password = 'Logic@1234';
// Database name
$mysql_database = 'lsgigger_gigger';

// Connect to MySQL server
$con = mysqli_connect($mysql_host, $mysql_username, $mysql_password, $mysql_database);
// Check connection
if ($con -> connect_errno) {
  echo "Failed to connect to MySQL: " . $con -> connect_error;
  exit();
}
//mysql_connect($mysql_host, $mysql_username, $mysql_password) or die('Error connecting to MySQL server: ' . mysql_error());
// Select database
//mysql_select_db($mysql_database) or die('Error selecting MySQL database: ' . mysql_error());

$con->query('SET foreign_key_checks = 0');
if ($result = $con->query("SHOW TABLES"))
{
    while($row = $result->fetch_array(MYSQLI_NUM))
    {
        $con->query('DROP TABLE IF EXISTS '.$row[0]);
    }
}

$con->query('SET foreign_key_checks = 1');

// Name of the file
        $filename = 'public/files/document/gigger.sql';
// Temporary variable, used to store current query
        $templine = '';
// Read in entire file
        $lines = file($filename);
// Loop through each line
        foreach ($lines as $line) {
// Skip it if it's a comment
            if (substr($line, 0, 2) == '--' || $line == '')
                continue;

// Add this line to the current segment
            $templine .= $line;
// If it has a semicolon at the end, it's the end of the query
            if (substr(trim($line), -1, 1) == ';') {
                // Perform the query
                $con -> query($templine) or print('Error performing query \'<strong>' . '\': ' . $con -> error . '<br /><br />');
                // Reset temp variable to empty
                $templine = '';
            }
        }
        DB::table('settings')->where('id', 1)->update(array('nextupdate' => date('Y-m-d 00:00:00', strtotime('+1 day'))));
        echo 1;exit;
    }
    
    
    public function categories(){ 
       $pageTitle = 'Expore Jobs by Categories';   
       $categories = DB::table('categories')->where(['status'=>1, 'parent_id'=>0])->get(); 
       return view('homes.categories', ['title' => $pageTitle, 'categories'=>$categories]);    
    }
    
    
    public function sendmail(){   
       $uname = array('uname' => 'dinesh'); 
       Mail::send('emails.welcome', $uname, function($message) use ($uname)
        {
            $message->setSender(array('dinesh.dhaker@logicspice.com' => 'Demo'));
            $message->setFrom(array('dinesh.dhaker@logicspice.com' => 'Demo'));
            $message->to('dinesh.dhaker@logicspice.com', 'John Smith')->subject('Welcome!');
        });
        $email_address = 'dinesh.dhaker@logicspice.com';
         if (count(Mail::failures()) > 0) {
                    echo $errors = 'Failed to send password reset email, please try again.';
                    foreach (Mail::failures() as $email_address) {
                        echo " - $email_address <br />";
                    }
                }
        echo 'ff';
    }
}
?>