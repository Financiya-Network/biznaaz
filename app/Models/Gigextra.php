<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Gigextra extends Model
{
    use Sortable;
    //
    public $sortable = ['id', 'title', 'description', 'price', 'delivery','created_at'];
    
    public function Gig(){
        return $this->belongsTo('App\Models\Gig');
    }
    
}
