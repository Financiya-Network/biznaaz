<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Image extends Model
{
    use Sortable;
    //
    public $sortable = ['id', 'gig_id', 'name','created_at'];
    
    public function Gig(){
        return $this->belongsTo('App\Models\Gig');
    }
    
}
