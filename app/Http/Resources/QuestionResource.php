<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class QuestionResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'path'  => $this->path,
            'body'  => $this->body,
            'slug'  => $this->slug,
            'replies'  => ReplyResource::collection($this->replies),
            'reply_count'  => $this->replies->count(),
            'slug'  => $this->slug,
            'created_at' =>  $this->created_at->diffForHumans(),
            'updated_at' =>  $this->updated_at->diffForHumans(),
            'user'  => $this->user->name,
            'id'  => $this->user_id,
 
        ];
    }
}
