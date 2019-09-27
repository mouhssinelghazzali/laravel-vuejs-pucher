<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\Category;
use App\Model\CategoryQuestion;


class Question extends Model
{

    protected $fillable =['title','slug','body','category_id','user_id'];
    protected $guarded = [];
    protected $with = ['replies'];
    public static function boot()
    {
        parent::boot();
        static::creating(function($question){
            $question->slug = str_slug($question->title);

        });
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function user()
    {
    return $this->belongsTo(User::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class,'category_question')->withTimestamps();
    }
    
    
    public function replies()
    {
        return $this->hasMany(Reply::class)->latest();
    }

   
    public function getPathAttribute()
    {
        return "/question/$this->slug";

    }



}












