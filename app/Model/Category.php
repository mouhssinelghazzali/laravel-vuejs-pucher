<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Question;

class Category extends Model
{
    protected $fillable =['name','slug'];
    protected $guarded = [];

    public function questions()
    {
    return $this->belongsToMany(Question::class,'category_question')->orderBy('created_at','DESC')->paginate(5);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getPathAttribute()
    {
        return "/question/category/$this->slug";

    }
}
