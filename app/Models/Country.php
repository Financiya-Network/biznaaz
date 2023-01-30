<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Country extends Model
{
    use Sortable;
    //
    public $sortable = ['id', 'name','created_at'];
    
    public static function getCountryList(){
       return Country::where('status', 1)->orderBy('name', 'ASC')->pluck('name','id')->all();
    }
}
