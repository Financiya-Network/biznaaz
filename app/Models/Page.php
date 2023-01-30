<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Page extends Model
{
    use Sortable;
    //
    public $sortable = ['id', 'title','created_at'];
}
