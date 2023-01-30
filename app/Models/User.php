<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class User extends Model
{
    use Sortable;
    //
    public $sortable = ['id', 'first_name', 'email_address','contact','created_at'];
    
    public function Country(){
        return $this->belongsTo('App\Models\Country');
    }
}
