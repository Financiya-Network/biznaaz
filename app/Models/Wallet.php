<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Wallet extends Model
{
    use Sortable;
    //
    public $sortable = ['id', 'created_at'];
    
    public function Service(){
        return $this->belongsTo('App\Models\Service');
    }
    public function User(){
        return $this->belongsTo('App\Models\User');
    }
}
