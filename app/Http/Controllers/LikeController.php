<?php

namespace App\Http\Controllers;

use App\Model\Like;
use Illuminate\Http\Request;
use App\Model\Reply;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function LikeIt(Reply $reply)
    {
       $reply->like()->create([
        //'user_id' => auth()->id(),
        'user_id' => 1

 
       ]);
    }

    public function UnLikeIt(Reply $reply)
    {
        $reply->like()->where('user_id','1')->first()->delete();
    }
}
