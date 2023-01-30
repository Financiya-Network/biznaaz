<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Gig extends Model
{
    use Sortable;
    //
    public $sortable = ['id', 'title','created_at'];
    
    public function User(){
        return $this->belongsTo('App\Models\User');
    }
    public function Otheruser(){
        return $this->belongsTo('App\Models\User','offer_user');
    }
    public function Category(){
        return $this->belongsTo('App\Models\Category');
    }
    /*public function Skill(){
        return $this->belongsTo('App\Models\Skill', 'tags')->whereRaw("FIND_IN_SET(id, tags)");
    }*/
    public function Subcategory(){
        return $this->belongsTo('App\Models\Category','subcategory_id');
    }
    public function Gigfaq(){
        return $this->hasMany('App\Models\Gigfaq');
    }
    public function Gigextra(){
        return $this->hasMany('App\Models\Gigextra');
    }
    public function Gigrequirement(){
        return $this->hasMany('App\Models\Gigrequirement');
    }
    public function Image(){
        return $this->hasMany('App\Models\Image');
    }
    public static function video_image($url, $size = "large") {
        
        if ($size == "thumb") {
            $size = 1;
        } else {
            $size = 0;
        }

        $image_url = parse_url($url);
        if (isset($image_url['host']) && ($image_url['host'] == 'www.youtube.com' || $image_url['host'] == 'youtube.com')) {
            $array = explode("&", $image_url['query']);
            return "http://img.youtube.com/vi/" . substr($array[0], 2) . "/" . $size . ".jpg";
        } elseif (isset($image_url['host']) && ($image_url['host'] == 'www.vimeo.com' || $image_url['host'] == 'vimeo.com')) {
            $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/" . substr($image_url['path'], 1) . ".php"));
            return $hash[0]["thumbnail_small"];
        } else {
            return 0;
        }
    }
    public static function get_video_code($url, $size = "large") {
        if ($size == "thumb") {
            $size = 1;
        } else {
            $size = 0;
        }

        $image_url = parse_url($url);
        if (isset($image_url['host']) && ($image_url['host'] == 'www.youtube.com' || $image_url['host'] == 'youtube.com')) {
            $step1 = explode('v=', $url);
            $step2 = explode('&', $step1[1]);
            $vedio_id = $step2[0];
            return 'https://www.youtube.com/embed/' . $vedio_id;
        } elseif (isset($image_url['host']) && ($image_url['host'] == 'www.vimeo.com' || $image_url['host'] == 'vimeo.com')) {
            $vedio_id = str_replace('http://vimeo.com/', '', $url);
            return 'http://player.vimeo.com/video/' . $vedio_id;
        } else {
            return 0;
        }
    }
    
    
}
