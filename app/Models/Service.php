<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Service extends Model
{
    use Sortable;
    //
    public $sortable = ['id', 'created_at'];
    
    public function User(){
        return $this->belongsTo('App\Models\User');
    }
    public function Servicesoffer(){
        return $this->hasMany('App\Models\Servicesoffer');
    }
    public function Category(){
        return $this->belongsTo('App\Models\Category');
    }
    public function Subcategory(){
        return $this->belongsTo('App\Models\Category', 'subcategory_id');
    }
}
