<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExecutorProfileForRatingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
                 'id' => $this->id,
            'user_id' =>new UserInfoResource($this->users),
            'total_reiting'=>$this->total_reiting,
            'executor_review_count'=>$this->executor_review_count,
        ];
    }
}
