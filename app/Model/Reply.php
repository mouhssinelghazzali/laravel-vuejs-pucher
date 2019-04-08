<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Reply extends Model
{
    public static function boot()
    {
        parent::boot();
        static::creating(function ($reply){
            $reply->user_id = auth()->id();

        });

    }
    protected $guarded = [];

    public function user()
    {
    return $this->belongsTo(User::class);
    }

    public function like()
    {
        return $this->hasMany(Like::class);
        
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
