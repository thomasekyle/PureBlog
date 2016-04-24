<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    //
    protected $table = 'settings';
    protected $fillable = [
    	'users',
    	'blog_name',
    	'blog_description',
    	'blog_phone_number',
    	'blog_email',
    	'blog_facebook',
    	'blog_twitter',
    	'blog_linked',
    	'blog_instagram',
    	'blog_github'
    ];
}
