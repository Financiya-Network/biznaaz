<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Testimonial extends Model
{
    use Sortable;
    //
    public $sortable = ['id', 'title', 'client_name','country','description','created_at'];
    
}
