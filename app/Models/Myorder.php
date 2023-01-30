<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Myorder extends Model
{
    use Sortable;
    //
    public $sortable = ['id', 'created_at'];
    
    public function Buyer(){
        return $this->belongsTo('App\Models\User', 'buyer_id');
    }
    public function Seller(){
        return $this->belongsTo('App\Models\User', 'seller_id');
    }
    public function Gig(){
        return $this->belongsTo('App\Models\Gig');
    }
    public function Service(){
        return $this->belongsTo('App\Models\Service');
    }
}
