<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Gigrequirement extends Model
{
    use Sortable;
    //
    public $sortable = ['id', 'description', 'is_mandatory','created_at'];
    
    public function Gigrequirement(){
        return $this->belongsTo('App\Models\Gigrequirement');
    }
    
}
