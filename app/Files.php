<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $table = 'files';

    protected $fillable = ['user_id', 'file_name', 'file_date','file_text', 'file_tags', 'file_extension', 'file_true_name', 'search_query'];

}
