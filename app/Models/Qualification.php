<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Qualification extends Model
{
    use Sortable;
    //
    public $sortable = ['id', 'name','created_at'];
    
    public static function getQualificationList(){
       return Qualification::where('status', 1)->orderBy('name', 'ASC')->pluck('name','id')->all();
    }
}
