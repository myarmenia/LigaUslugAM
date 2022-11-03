<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExecutorPortfolioLinkResource extends JsonResource
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
        return[
                             'id' => $this->executor_profile_id,
            'executor_profile_id' => $this->executor_profile_id,
                 'portfolio_link' => $this->portfolio_link,
        ];
    }
}
