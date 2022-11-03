<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserforAdminResource extends JsonResource
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
                    "name" => $this->name,
                   "email" => $this->email,
             "phonenumber" => $this->phone,
                "img_path" => $this->img_path,
                  "gender" => $this->gender,
              "birth_date" => $this->birth_date,
           "fasebook_link" => $this->fasebook_link,
          "instagram_link" => $this->instagram_link,
     "geting_notification" => $this->geting_notification,
     "employer_avg_rating" => $this->employer_avg_rating,
   "employer_review_count" => $this->employer_review_count,
              "created_at" => $this->created_at,
              "updated_at" => $this->updated_at,
        ];
    }
}
