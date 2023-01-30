<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use URL;
use App;

class LanguageController extends Controller {

    public function lang($locale = 'en') {
        //session_start();
        $_SESSION['Config']['language'] = $locale;
        
        Session::put('locale', $locale);
        App::setLocale($locale);
//        exit;
        return redirect(url(URL::previous()));
        //return redirect('/');
    }
    
    

}