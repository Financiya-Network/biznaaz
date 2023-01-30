<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Category extends Model
{
    use Sortable;
    //
    public $sortable = ['id', 'name','created_at'];
    
    public static function getCategoryList(){
       return Category::where(['status'=>1,'parent_id'=>0])->orderBy('name', 'ASC')->pluck('name','id')->all();
    }
    public static function getSubCategoryList($id){
       return Category::where(['status'=>1,'parent_id'=>$id])->orderBy('name', 'ASC')->pluck('name','id')->all();
    }
    public static function getOnlySubCategoryList($limit=null){
       return Category::where('status',1)->where('parent_id','>=',0)->orderBy('name', 'ASC')->pluck('name','id')->all();
    }
}
