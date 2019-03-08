<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
//     更换数据库绑定名称
//    protected $table = 'postadmin';

//     更换数据库绑定ID （主键）
//    protected $primaryKey ="post_id"；

    protected $dates = ['delete_at'];

    protected $fillable = [
        'title',
        'content'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function photos(){
        return $this->morphMany('App\Photo', 'imageable');
    }

    public function tags(){
        return $this->morphToMany('App\Tag', 'taggable');
    }
}
