<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\SendMailable;
use Mail;
use DB;
use Session;
use Redirect;

use JWTFactory;
use JWTAuth;
use App\Models\User;

class PagesController extends Controller {

    public function index(Request $request) {
        $slug = $request->segment(1);
        $pageInfo = DB::table('pages')->where('slug', $slug)->first();
        $pageTitle = $pageInfo->title;
        return view('pages.index', ['title' => $pageTitle, 'pageInfo' => $pageInfo]);
    }

    public function contactus(Request $request) {
        $pageTitle = 'Contact Us';
        if (!empty($request->all())) {
            $request->validate([
                'name' => 'bail|required|max:255',
                'email' => 'required|email',
                'contact' => 'required',
                'message' => 'required'
            ]);

            $name = $request->get('name');
            $email = $request->get('email');
            $contact = $request->get('contact');
            $message = nl2br($request->get('message'));

            $settings = DB::table('settings')->where('id', 1)->first();
            $emailId = $settings->contact_email;

            $emailTemplate = DB::table('emailtemplates')->where('id', 6)->first();
            $toRepArray = array('[!name!]', '[!email!]', '[!contact!]', '[!message!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
            $fromRepArray = array($name, $email, $contact, $message, HTTP_PATH, SITE_TITLE);
            $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
            $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
            Mail::to($emailId)->send(new SendMailable($emailBody, $emailSubject));

            Session::flash('success_message', "Your enquiry sent to us successfully, our team will contact you soon.");
            return Redirect::to('contact-us');
        }
        return view('pages.contactus', ['title' => $pageTitle]);
    }

    public function checlapi() { echo strtoupper(bin2hex(openssl_random_pseudo_bytes(10))); exit;
            $user = User::where('email_address', 'santosh.mittal@logicspice.com')->select(['id', 'first_name'])->first();
//            echo '<pre>';
//            print_r($user);exit;
           echo  $token = JWTAuth::fromUser($user); 
           echo '<br>';
         $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6Ly8xOTIuMTY4LjAuMjEwL2NvbXAyMTAvZ2lnZ2VyX3Byb2R1Y3Qvc2l0ZS9wYWdlcy9jaGVjbGFwaSIsImlhdCI6MTUzODY1MTkxOSwiZXhwIjoxNTM4NjU1NTE5LCJuYmYiOjE1Mzg2NTE5MTksImp0aSI6ImMzV2F5M0JhRms0NmxaTGoifQ.0RX6WpnCh1BQpzbESsAGD5sjR0o-KFgGgtbw-PFCNKQ';
         
        $dd  = JWTAuth::toUser($token);
        echo '<pre>';
        print_r($dd);
    }


}
