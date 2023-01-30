<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Cart extends Model
{
    use Sortable;
    //
    public $sortable = ['id', 'created_at'];
    
    public function Gig(){
        return $this->belongsTo('App\Models\Gig');
    }
    public function User(){
        return $this->belongsTo('App\Models\User');
    }
}
