<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployerReviewResource extends JsonResource
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
            'task_id'=>$this->task_id,
            'user_id'=>$this->user_id,
            'executor_profile_id'=>new ExecutorProfileForRatingResource($this->executor_profiles),
            'executor_star_count_to_employer'=>$this->executor_star_count_to_employer,
            'executor_review_to_employer'=>$this->executor_review_to_employer
        ];
    }
}
