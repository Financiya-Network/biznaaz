<?php
namespace App\Http\Middleware;
use Closure;
use Session;
class Adminlogedin
{
    /**
     * Handle an incoming request.
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     * 
     */
    public function handle($request, Closure $next){    
        if (Session::has('adminid')){
            return redirect('/admin/admins/dashboard');
        }else{
            return $next($request);
        }
        
        /********* get current controllr and action
         *  $action= Route::getFacadeRoot()->current()->getAction();
        $controller = class_basename($action['controller']);
        list($controller, $action) = explode('@', $controller);
        echo $action;exit;
        exit;
         */
    }
}