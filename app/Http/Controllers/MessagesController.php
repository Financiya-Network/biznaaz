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
use Response;
use App\Models\Message;
use App\Models\Category;
use App\Models\Payment;
use App\Models\Gig;
use App\Models\Notification;
use App\Models\User;

class MessagesController extends Controller {

    public function __construct() {
        $this->middleware('is_userlogin', ['except' => ['']]);
    }

    public function message(Request $request, $slug = null) {
        $pageTitle = 'Users Message';

        $receiverUser = User::where(['slug' => $slug])->select('id', 'first_name', 'last_name', 'profile_image', 'address', 'city', 'country_id', 'languages')->first();
        //echo '<pre>';print_r($receiverUser);exit;
        $senderUser = User::where(['id' => Session::get('user_id')])->select('id', 'slug', 'profile_image')->first();
        $messages = '';
        if ($slug) {

            if (!empty($request->all())) { 
                $request->validate([
                    'message' => 'required'
                ]);

                if (Input::hasFile('attachment')) {
                    $file = Input::file('attachment');
                    $uploadedFileName = $this->uploadImage($file, DOCUMENT_UPLOAD_PATH);
                    $attachment = $uploadedFileName;
                } else {
                    $attachment = '';
                }

                $serialisedData = array();
                $serialisedData['sender_id'] = $request->get('sender_id');
                $serialisedData['receiver_id'] = $request->get('receiver_id');
                $serialisedData['message'] = $request->get('message');
                $serialisedData['attachment'] = $attachment;
                $serialisedData['status'] = 0;
                $serialisedData['time'] = time();
                $serialisedData['slug'] = $request->get('sender_id') . $request->get('receiver_id') . time() . rand(10, 99);
                $serialisedData = $this->serialiseFormData($serialisedData);
                Message::insert($serialisedData);
                //Session::flash('success_message', "Your messages sent successfully.");

                $serialisedData = array();
                $serialisedData['from_name'] = Session::get('user_name');
                $serialisedData['user_id'] = $request->get('receiver_id');
                $serialisedData['message'] = $request->get('message');
                $serialisedData['url'] = 'messages/message/' . $senderUser->slug;
                $serialisedData['status'] = 0;
                $serialisedData = $this->serialiseFormData($serialisedData);
                $serialisedData['slug'] = bin2hex(openssl_random_pseudo_bytes(5)) . time() . rand(10, 99);
                Notification::insert($serialisedData);
                
                $datetime = date('M d, Y');

                $loginUserInfo = User::where('id', $request->get('sender_id'))->first();
                $loginuser = $loginUserInfo->first_name . ' ' . $loginUserInfo->last_name;

                // Email sent to seller user
                $message = $request->get('message');
                $receiverInfo = User::where('id', $request->get('receiver_id'))->first();
                $emailId = $receiverInfo->email_address;
                $name = $receiverInfo->first_name . ' ' . $receiverInfo->last_name;

                $emailTemplate = DB::table('emailtemplates')->where('id', 21)->first();
                $toRepArray = array('[!username!]', '[!datetime!]', '[!name!]', '[!message!]', '[!HTTP_PATH!]', '[!SITE_TITLE!]');
                $fromRepArray = array($loginuser, $datetime, $name, $message, HTTP_PATH, SITE_TITLE);
                $emailSubject = str_replace($toRepArray, $fromRepArray, $emailTemplate->subject);
                $emailBody = str_replace($toRepArray, $fromRepArray, $emailTemplate->template);
                Mail::to($emailId)->send(new SendMailable($emailBody, $emailSubject));
                
                return Redirect::to('messages/message/' . $slug);
            }

            $receiverUser = User::where(['slug' => $slug])->select('id', 'first_name', 'last_name', 'profile_image', 'address', 'city', 'country_id', 'languages')->first();
            $query = new Message();
            //$query = $query->with('Buyer');
            $query = $query->where('sender_id', Session::get('user_id'));
            $query->where('receiver_id', '=', $receiverUser->id);
            $query->orWhere('receiver_id', Session::get('user_id'));
            $query->where('sender_id', '=', $receiverUser->id);
            $messages = $query->orderBy('id', 'ASC')->get();

            //$messages = Message::where(['sender_id'=> Session::get('user_id'),'receiver_id'=>$receiverUser->id])->orWhere(['sender_id'=> $receiverUser->id,'receiver_id'=>Session::get('user_id')])->orderBy('id', 'ASC')->get();
            
        }else{
            $query = new Message();
            //$query = $query->with('Buyer');
//            $query = $query->where('sender_id', Session::get('user_id'));
//            $query->where('receiver_id', '=', $receiverUser->id);
//            $query->orWhere('receiver_id', Session::get('user_id'));
//            $query->where('sender_id', '=', $receiverUser->id);
            $messages = $query->orderBy('id', 'ASC')->get();
        }
        
        


        $usergigs = Gig::where(['status' => 1, 'user_id' => Session::get('user_id')])->orderBy('id', 'DESC')->limit(10)->get();

        $users = Message::where('sender_id', Session::get('user_id'))->orWhere('receiver_id', Session::get('user_id'))->orderBy('id', 'ASC')->get();
        $userValue = array();
        $userData = array();

        if ($users) { 
            $i = 0;
            foreach ($users as $user) { 
                $userData[$i]['id'] = $user->id;
                $userData[$i]['message'] = $user->message;
                if ($user->sender_id == Session::get('user_id') && $user->Receiver) {
                    $userData[$i]['user_id'] = $user->receiver_id;
                    $userData[$i]['name'] = $user->Receiver->first_name . ' ' . $user->Receiver->last_name;
                    $userData[$i]['slug'] = $user->Receiver->slug;
                    $userData[$i]['user_status'] = $user->Receiver->user_status;
                    $userData[$i]['profile_image'] = $user->Receiver->profile_image;
                    $usId = $user->receiver_id;
                }
                if ($user->receiver_id == Session::get('user_id') && $user->Sender) {
                    $userData[$i]['user_id'] = $user->sender_id;
                    $userData[$i]['name'] = $user->Sender->first_name . ' ' . $user->Sender->last_name;
                    $userData[$i]['slug'] = $user->Sender->slug;
                    $userData[$i]['user_status'] = $user->Sender->user_status;
                    $userData[$i]['profile_image'] = $user->Sender->profile_image;
                    $usId = $user->sender_id;
                }
                $userValue[$usId] = $userData[$i];
                $i++;
            }
        }
//        exit;
//        echo '<pre>';print_r($senderUser);
        return view('messages.message', ['title' => $pageTitle, 'messages' => $messages, 'userData' => $userValue, 'user' => $receiverUser, 'senderUser' => $senderUser, 'mygigs' => $usergigs]);
    }

    public function download(Request $request, $slug, $filename) {
        $fname = substr($filename, 9);
        $file_path = DOCUMENT_UPLOAD_PATH . $filename;
        return Response::download($file_path, $fname, ['Content-Length: ' . filesize($file_path)]);
    }

}
