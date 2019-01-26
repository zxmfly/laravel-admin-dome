<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    //指定表明
    protected $table = 'movies';
    //指定id
    protected $primaryKey = 'id';

    //允许批量赋值的字段
    protected $fillable = ['title', 'director', 'describe'];

    //不允许批量赋值的字段
    protected $guarded = [];
}
