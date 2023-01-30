<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use DB;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $globalSubCategories = array();
        $siteSettings = DB::table('settings')->where('id', 1)->first(); 
        $globalCategories = DB::table('categories')->where(['status'=>1, 'parent_id'=>0])->limit(12)->get(); 
        $globalSub = DB::table('categories')->where(['status'=>1])->where('parent_id', '!=', 0)->select(['id','parent_id','name','slug'])->get();
        if($globalSub){
            foreach($globalSub as $globalSubCategory){ 
                $globalSubCategories[$globalSubCategory->parent_id][$globalSubCategory->id] = $globalSubCategory; 
            }
        }
        //echo '<pre>';print_r($globalSubCategories);exit;
        View::share(['siteSettings'=>$siteSettings, 'globalCategories'=>$globalCategories, 'globalSubCategories'=>$globalSubCategories]);
        
        Blade::directive('showprice', function ($expression) {
            $expression = explode('|', $expression);
            if(isset($expression[1])){
                $decimal = $expression[1];
            }else{
                $decimal = 0;
            }
           
            if(isset($expression[2]) && $expression[2] == 'a'){
                return "<?php echo number_format($expression[0], $decimal).CURR; ?>";
            }else{
                return "<?php echo CURR . number_format($expression[0], $decimal); ?>";
            }
            
        });
       
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
