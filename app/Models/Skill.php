<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Skill extends Model
{
    use Sortable;
    //
    public $sortable = ['id', 'name','created_at'];
    
    public static function getSkillList(){
       return Skill::where('status', 1)->orderBy('name', 'ASC')->pluck('name','id')->all();
    }
}
