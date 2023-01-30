<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Gigfaq extends Model
{
    use Sortable;
    //
    public $sortable = ['id', 'question', 'answer','created_at'];
    
    public function Gig(){
        return $this->belongsTo('App\Models\Gig');
    }
    
}
