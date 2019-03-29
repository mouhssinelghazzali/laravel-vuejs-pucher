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
            'created_at' =>  $this->created_at->diffForHumans(),
            'updated_at' =>  $this->updated_at->diffForHumans(),
            'user-name'  => $this->user->name,
            'user-email'  => $this->user->email
 
        ];
    }
}
