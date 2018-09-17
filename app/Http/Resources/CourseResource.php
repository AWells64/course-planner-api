<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
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
        "title" => $this->title,
        "description" => $this->description,
        "price" => $this->price,
        "difficulty" => $this->difficulty,
        "rating" => $this->rating,
        "complete" => $this->complete,
        "score" => $this->score,
        ];

    }
}
