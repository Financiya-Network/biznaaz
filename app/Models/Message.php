<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Message extends Model
{
    use Sortable;
    //
    public $sortable = ['id', 'title','created_at'];
    
    public function Sender(){
        return $this->belongsTo('App\Models\User', 'sender_id');
    }
    public function Receiver(){
        return $this->belongsTo('App\Models\User', 'receiver_id');
    }
    
    
    
}
