<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReitingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
                            'task_id' => $this->task_id,
                            'user_id' => new UserInfoResource($this->users),
                'executor_profile_id' => new ExecutorProfileForRatingResource($this->executor_profiles),
    'employer_star_count_to_executor' => $this->employer_star_count_to_executor,
        'employer_review_to_executor' => $this->employer_review_to_executor,
    // 'executor_star_count_to_employer' => $this->executor_star_count_to_employer,
    //     'executor_review_to_employer' => $this->executor_review_to_employer
            ];
    }
}
