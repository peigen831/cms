<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
//     更换数据库绑定名称
//    protected $table = 'postadmin';

//     更换数据库绑定ID （主键）
//    protected $primaryKey ="post_id"；

protected $fillable = [
    'title',
    'content'
];


}
