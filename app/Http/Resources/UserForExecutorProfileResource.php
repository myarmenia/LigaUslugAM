<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserForExecutorProfileResource extends JsonResource
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
        // return [
        //     'name'=>$this->name,
        //     'user'=>ExecutorProfileResource::collection($this->whenLoaded('users')),
        // ];

        return [
                     'id' => $this->id,
                    'role'=> $this->role,
                   'name' => $this->name,
              'last_name' => $this->last_name,
                  'email' => $this->email,
               'img_path' => $this->img_path,
                 'gender' => $this->gender,
             'birth_date' => $this->birth_date,
                 'region' => $this->region,
           'country_name' => $this->country_name,
                'address' => $this->address,
               'about_me' => $this->about_me,
            'phonenumber' => $this->phonenumber,
            'phone_status'=> $this->phone_status,
          'fasebook_link' => $this->fasebook_link,
         'instagram_link' => $this->instagram_link,
    'geting_notification' => $this->geting_notification,
                 'status' => $this->status,
             'created_at' => $this->created_at,
             'updated_at' => $this->updated_at
            ];
    }
}
