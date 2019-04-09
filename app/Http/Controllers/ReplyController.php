<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Reply;
use App\Model\Question;
use App\Http\Resources\ReplyResource;
use App\Notifications\NewReplyNotification;

class ReplyController extends Controller
{

    public function __construct()
    {
        $this->middleware('JWT', ['except' => ['index','show']]);
    }
    public function index(Question $question){
    return ReplyResource::collection($question->replies);
     // return  Reply::latest()->get();
      //  return  ReplyResource::collection( $question->replies->get());
    }

    public function show(Question $question,Reply $reply)
    {
        return new ReplyResource ($reply);
    }

    public function store(Question $question,Request $request)
    {
       $replies = $question->replies()->create($request->all());
       $user = $question->user;
       if ($replies->user_id !== $question->user_id) {
        $user->notify(new NewReplyNotification($replies));
       }
    
        return response(['reply' =>  new ReplyResource ($replies)]);

    }



    public function destroy(Question $question ,Reply $reply)
    {
        $reply->delete();
        return response('delete');

    }

    public function update(Question  $question, Request $request , Reply $reply)
    {
        $reply->update($request->all());
        return response('modification avec succee');

    }
}
