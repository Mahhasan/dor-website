<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable = ['user_id','title','abstract','keywords','authors','email','phone','journal_name','journal_name','journal_link','publish_year','indexing'];
}

