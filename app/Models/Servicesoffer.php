<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Servicesoffer extends Model
{
    use Sortable;
    //
    public $sortable = ['id', 'created_at'];
    
    public function User(){
        return $this->belongsTo('App\Models\User');
    }
    public function Service(){
        return $this->belongsTo('App\Models\Service');
    }
}
