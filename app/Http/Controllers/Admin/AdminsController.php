<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Cookie;
use Session;
use Redirect;
use Input;
use Validator;
use DB;
use IsAdmin;
use Mail;
use App\Mail\SendMailable;

class AdminsController extends Controller {

    public function __construct() {
        $this->middleware('adminlogedin', ['only' => ['login', 'forgotPassword']]);
        $this->middleware('is_adminlogin', ['except' => ['logout', 'login', 'forgotPassword']]);
    }

    public function login(Request $request) {       
        
//        if ($request->has('secureKey')) {
//            $secureCode = $request->get('secureKey');            
//            if ($secureCode != '') {                
//                if ($secureCode != SECURE_CODE) {
//                    return Redirect::to('/');
//                }
//            } else {
//                return Redirect::to('/');
//            }
//        } else {
//            return Redirect::to('/');
//        }        
              
        //print_r($input);
        //exit;  
        $pageTitle = 'Admin Login';
        $input = Input::all();
        //unset($input['secureKey']);
        //print_r($input);exit;
        if (!empty($input)) {
            //echo '<pre>';print_r($input);exit;
            $rules = array(
                'username' => 'required',
                'password' => 'required',
                'g-recaptcha-response' => 'required'
            );
            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                return Redirect::to('/admin/login')->withErrors($validator)->withInput(Input::except('password'));
            } else {
                $adminInfo = DB::table('admins')->where('username', $input['username'])->first();
                if (!empty($adminInfo)) {
                    if (password_verify($input['password'], $adminInfo->password)) {
                        if ($adminInfo->status == 0) {
                            $error = 'Your account got temporary disabled.';
                        } else {
                            if (isset($input['remember']) && $input['remember'] == '1') {
                                Cookie::queue('admin_username', $adminInfo->username, time() + 60 * 60 * 24 * 7, "/");
                                Cookie::queue('admin_password', $input['password'], time() + 60 * 60 * 24 * 7, "/");
                                Cookie::queue('admin_remember', '1', time() + 60 * 60 * 24 * 100, "/");
                            } else {
                                Cookie::queue('admin_username', '', time() + 60 * 60 * 24 * 7, "/");
                                Cookie::queue('admin_password', '', time() + 60 * 60 * 24 * 7, "/");
                                Cookie::queue('admin_remember', '', time() + 60 * 60 * 24 * 7, "/");
                            }
                            Session::put('adminid', $adminInfo->id);
                            Session::put('admin_username', $adminInfo->username);
                            return Redirect::to('admin/admins/dashboard');
                        }
                    } else {
                        $error = 'Invalid username or password.';
                    }
                } else {
                    $error = 'Invalid username or password.';
                }
                return Redirect::to('/admin/login')->withErrors($error)->withInput(Input::except('password'));
            }
        }
        
        //echo '<pre>';print_r($input);exit;
        return view('admin.admins.login', ['title' => $pageTitle]);
    }

    public function forgotPassword() {
        $pageTitle = 'Admin Forgot Password';
        $input = Input::all();
        if (!empty($input)) {
            $rules = array(
                'email' => 'required|email'
            );
            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                return Redirect::to('/admin/admins/forgot-password')->withErrors($validator);
            } else {
                $adminInfo = DB::table('admins')->where('email', $input['email'])->first();
                if (!empty($adminInfo)) {
                    $plainPassword = $this->getRandString(8);
                    $new_password = $this->encpassword($plainPassword);
                    DB::table('admins')->where('id', $adminInfo->id)->update(array('password' => $new_password));

                    $username = $adminInfo->username;
                    $emailId = $adminInfo->email;
                    $emailTemplate = DB::table('emailtemplates')->where('id', 1)->first();
                    $toRepArray = array('[!email!]', '[!username!]', '[!password!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
                    $fromRepArray = array($emailId, $username, $plainPassword, HTTP_PATH, SITE_TITLE);
                    $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
                    $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
                    Mail::to($emailId)->send(new SendMailable($emailBody, $emailSubject));

                    Session::flash('success_message', "A new password has been sent to your email address.");
                    return Redirect::to('admin/admins/login');
                } else {
                    $error = 'Invalid email address, please enter correct email address.';
                }
                return Redirect::to('/admin/admins/forgot-password')->withErrors($error);
            }
        }
        return view('admin.admins.forgotPassword', ['title' => $pageTitle]);
    }

    public function logout() {
        session_start();
        session_destroy();
        Session::forget('adminid');
        Session::save();
        Session::flash('success_message', "Logout successfully.");
        return Redirect::to('admin/admins/login');
    }

    public function dashboard() {
        $pageTitle = 'Admin Dashboard';
        $dadhboardData = array();
        $dadhboardData['users_count'] = DB::table('users')->count();
        $dadhboardData['gig_count'] = DB::table('gigs')->count();
        $dadhboardData['payment_count'] = DB::table('payments')->count();
        $dadhboardData['myorder_count'] = DB::table('myorders')->count();
        $dadhboardData['categoryies_count'] = DB::table('categories')->where('parent_id', 0)->count();
        $dadhboardData['skills_count'] = DB::table('skills')->count();
        $dadhboardData['qualifications_count'] = DB::table('qualifications')->count();
        $dadhboardData['services_count'] = DB::table('services')->count();
        return view('admin.admins.dashboard', ['title' => $pageTitle, 'actdashboard' => 1, 'dadhboardData' => $dadhboardData]);
    }

    public function userchart($daycount = 2) {
        switch ($daycount) {
            case 0:
                $daycount = 1;
                $today = date('Y-m-d') . ' 23:59:00';
                $lastday = date('Y-m-d') . ' 00:00:00';
                break;
            case 1:
                $daycount = 1;
                $today = date('Y-m-d', strtotime("-1 day", strtotime(date('Y-m-d')))) . ' 23:59:00';
                $lastday = date('Y-m-d', strtotime("-1 day", strtotime(date('Y-m-d')))) . ' 00:00:00';
                break;
            case 2:
                $daycount = 31;
                $today = date('Y-m-d') . ' 23:59:00';
                $lastday = date('Y-m-d', strtotime("-30 day", strtotime(date('Y-m-d')))) . ' 00:00:00';
                break;
            case 3:
                $daycount = 365;
                $today = date('Y-m-d') . ' 23:59:00';
                $lastday = date('Y-m-d', strtotime("-365 day", strtotime(date('Y-m-d')))) . ' 00:00:00';
                break;
            case 4:
                $daycount = 7;
                $today = date('Y-m-d') . ' 23:59:00';
                $lastday = date('Y-m-d', strtotime("-7 day", strtotime(date('Y-m-d')))) . ' 00:00:00';
                break;
        }

        $catArray = array();
        $CTempArray = array();

        if ($daycount == 365) {
            $countUserArray = DB::table('users')
                    ->select('created_at as date', DB::raw('count(*) as count'))
                    ->where('created_at', '<=', $today)
                    ->where('created_at', '>=', $lastday)
                    ->groupBy(DB::raw('Month(created_at)'))
                    ->get()
            ;

            foreach ($countUserArray as $row) {
                $CTempArray[date("Y-m", strtotime($row->date))] = $row->count;
            }
            ksort($CTempArray);
            $finalArray = array();
            $catArray = array();
            $strtotime = strtotime($lastday);
            for ($i = 0; $i <= 12; $i++) {
                $value = 0;
                $date = date('Y-m', $strtotime);
                if (array_key_exists($date, $CTempArray)) {
                    $value = $CTempArray[$date];
                }
                $finalArray[] = $value;
                $catArray[] = "'" . date('M', $strtotime) . "'";
                $strtotime = strtotime("+1month", $strtotime);
            }
        } else {
            $countUserArray = DB::table('users')
                    ->select('created_at as date', DB::raw('count(*) as count'))
                    ->where('created_at', '<=', $today)
                    ->where('created_at', '>=', $lastday)
                    ->groupBy(DB::raw('Day(created_at)'))
                    ->get()
            ;

            foreach ($countUserArray as $row) {
                $CTempArray[date("Y-m-d", strtotime($row->date))] = $row->count;
            }
            ksort($CTempArray);
            $finalArray = array();
            $strtotime = strtotime($lastday);
            for ($i = 0; $i < $daycount; $i++) {
                $value = 0;
                $date = date('Y-m-d', $strtotime);
                if (array_key_exists($date, $CTempArray)) {
                    $value = $CTempArray[$date];
                }
                $datea = date('Y, m-1, d', $strtotime);
                $finalArray[] = "Date.UTC($datea), " . $value;
                $strtotime = $strtotime + 24 * 3600;
            }
        }
        return view('elements.admin.chart', ['dayCount' => $daycount, 'finalArray' => "[" . implode('],[', $finalArray) . "]", 'catArray' => implode(', ', $catArray)]);
    }

    public function changeUsername() {
        $pageTitle = 'Change Username';
        $activetab = 'actchangeusername';
        $adminInfo = DB::table('admins')->select('admins.username', 'admins.id')->where('id', Session::get('adminid'))->first();
        $input = Input::all();
        if (!empty($input)) {
            $error = '';
            $rules = array(
                'old_username' => 'required|different:new_username',
                'new_username' => 'required',
                'confirm_username' => 'required|same:new_username'
            );
            $customMessages = ['different' => 'You can not change new username same as current username'];
            $validator = Validator::make($input, $rules, $customMessages);
            if ($validator->fails()) {
                return view('admin.admins.changeUsername', ['title' => $pageTitle, $activetab => 1, 'adminInfo' => $adminInfo])->withErrors($validator);
            } else {
                DB::table('admins')->where('id', $adminInfo->id)->update(array('username' => $input['new_username']));
                Session::put('admin_username', $input['new_username']);
                Session::flash('success_message', "Admin username updated successfully.");
                return Redirect::to('admin/admins/change-username');
            }
        }
        return view('admin.admins.changeUsername', ['title' => $pageTitle, $activetab => 1, 'adminInfo' => $adminInfo]);
    }

    public function changePassword() {
        $pageTitle = 'Change Password';
        $activetab = 'actchangepassword';
        $input = Input::all();
        if (!empty($input)) {
            $error = '';
            $rules = array(
                'old_password' => 'required|different:new_password',
                'new_password' => 'required',
                'confirm_password' => 'required|same:new_password',
            );
            $customMessages = ['different' => 'You can not change new password same as current password.'];
            $validator = Validator::make($input, $rules, $customMessages);
            if ($validator->fails()) {
                return view('admin.admins.changePassword', ['title' => $pageTitle, $activetab => 1])->withErrors($validator);
            } else {
                $adminInfo = DB::table('admins')->select('admins.password', 'admins.id')->where('id', Session::get('adminid'))->first();
                if (!password_verify($input['old_password'], $adminInfo->password)) {
                    $error = 'Current password is not correct.';
                    return view('admin.admins.changePassword', ['title' => $pageTitle, $activetab => 1])->withErrors($error);
                } else {
                    $new_password = $this->encpassword($input['new_password']);
                    DB::table('admins')->where('id', $adminInfo->id)->update(array('password' => $new_password));
                    Session::flash('success_message', "Admin password updated successfully.");
                    return Redirect::to('admin/admins/change-password');
                }
            }
        }
        return view('admin.admins.changePassword', ['title' => $pageTitle, $activetab => 1]);
    }

    public function changeEmail() {
        $pageTitle = 'Change Email';
        $activetab = 'actchangeemail';
        $adminInfo = DB::table('admins')->select('admins.email', 'admins.id')->where('id', Session::get('adminid'))->first();
        $input = Input::all();
        if (!empty($input)) {
            $error = '';
            $rules = array(
                'old_email' => 'required|email|different:new_email',
                'new_email' => 'required|email',
                'confirm_email' => 'required|email|same:new_email'
            );
            $customMessages = ['different' => 'You can not change new email same as current email'];
            $validator = Validator::make($input, $rules, $customMessages);
            if ($validator->fails()) {
                return view('admin.admins.changeEmail', ['title' => $pageTitle, $activetab => 1, 'adminInfo' => $adminInfo])->withErrors($validator);
            } else {
                DB::table('admins')->where('id', $adminInfo->id)->update(array('email' => $input['new_email']));
                Session::flash('success_message', "Admin email updated successfully.");
                return Redirect::to('admin/admins/change-email');
            }
        }
        return view('admin.admins.changeEmail', ['title' => $pageTitle, $activetab => 1, 'adminInfo' => $adminInfo]);
    }

    public function siteSettings() {
        $pageTitle = 'Manage Site Settings';
        $activetab = 'actsitesetting';
        $recordInfo = DB::table('settings')->where('id', 1)->first();
        $input = Input::all();
        if (!empty($input)) {
            $rules = array(
                'site_title' => 'required',
                'company_name' => 'required',
                'contact_number' => 'required',
                'contact_email' => 'required|email',
                'address' => 'required',
            );
            $validator = Validator::make($input, $rules);
            if ($validator->fails()) {
                return Redirect::to('/admin/admins/site-settings')->withErrors($validator)->withInput();
            } else {
                if (Input::hasFile('home_logo')) {
                    $file_logo = Input::file('home_logo');
                    $uploadedFileName = $this->uploadImageWithSameName($file_logo, LOGO_IMAGE_UPLOAD_PATH);
                    $input['home_logo'] = $uploadedFileName;
                } else {
                    unset($input['home_logo']);
                }

                if (Input::hasFile('logo')) {
                    $file = Input::file('logo');
                    $uploadedFileName = $this->uploadImageWithSameName($file, LOGO_IMAGE_UPLOAD_PATH);
                    $input['logo'] = $uploadedFileName;
                } else {
                    unset($input['logo']);
                }

                if (Input::hasFile('favicon')) {
                    $file = Input::file('favicon');
                    $uploadedFileName = $this->uploadImageWithSameName($file, LOGO_IMAGE_UPLOAD_PATH);
                    $input['favicon'] = $uploadedFileName;
                } else {
                    unset($input['favicon']);
                }
                $serialisedData = $this->serialiseFormData($input, 1); //send 1 for edit
                DB::table('settings')->where('id', $recordInfo->id)->update($serialisedData);
                Session::flash('success_message', "Site settings updated successfully.");
                return Redirect::to('admin/admins/site-settings');
            }
        }
        return view('admin.admins.siteSettings', ['title' => $pageTitle, $activetab => 1, 'recordInfo' => $recordInfo]);
    }

}

?>