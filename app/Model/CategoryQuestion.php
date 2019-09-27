<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CategoryQuestion extends Model
{
    protected $table = 'category_question';
    protected $fillable =['category_id','question_id'];
    protected $guarded = [];


}
