<?php

namespace App\Http\Resources;

use App\Models\ExecutorProfile;
use App\Models\ExecutorWorkingRegion;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ExecutorProfileResource extends JsonResource
{
    public $tokos;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        // returning all relationsheep of Executor
                        return[

                                     "id" => $this->id,
                                "user_id" => $this->user_id,
                          "total_reiting" => $this->total_reiting,
                  "executor_review_count" => $this->executor_review_count,
                                 "region" => $this->region,
                           "country_name" => $this->country_name,
                                "address" => $this->address,
                        "profile_persent" => $this->percent_settings(),
                                   "user" => new UserForExecutorProfileResource($this->users),
            //    "executor_working_regions" => ExecutorWorkingRegionResource::collection($this->executor_working_regions),
            "executor_working_regions" => $this->get_executor_working_region(),
                    "executor_categories" => ExecutorCategoryResource::collection($this->executor_categories),
                 "executor_subcategories" => ExecutorSubCategoryResource::collection($this->executor_subcategories),
      "executor_profile_work_experiences" => ExecutorProfileWorkExperienceResource::collection($this->executor_profile_work_experiences),
                    "executor_portfolios" => ExecutorPortfolioResource::collection($this->executor_portfolios),
               "executor_portfolio_links" => ExecutorPortfolioLinkResource::collection($this->executor_portfolio_links),
                    "executor_educations" => ExecutorEducationResource::collection($this->executor_educations),
        "executor_education_certificates" => ExecutorEducationCertificateResource::collection($this->executor_education_certificates),
                               "reitings" => ReitingResource::collection($this->reiting),

        ];
    }

    public function percent_settings(){
        $settings = Auth::user()->user_settings();
        $count=0;
        foreach($settings as $key=>$value){
            if($value ==1){
                $count+=1;
            }
        }
        $tokos=100/17*$count;
        $update=ExecutorProfile::where('user_id',Auth::id())->update([
                'profile_persent'=>$tokos

        ]);
        return  $tokos;
    }
    public function get_executor_working_region(){
        $show_executor_profile = ExecutorProfile::where('user_id',Auth::id())->first();

        $show_executor_working_region=[];
        $regions = ExecutorWorkingRegion::where('executor_profile_id',$show_executor_profile->id)->distinct('executorwork_region')->pluck('executorwork_region');

        foreach($regions as $item){
            $punkt_arr=[];
           $get_item_punkt= ExecutorWorkingRegion::where(['executor_profile_id'=>$show_executor_profile->id,'executorwork_region'=>$item])->get();
           foreach($get_item_punkt as $data){

            array_push($punkt_arr, $data->working_rayon);
            };
            $show_executor_working_region[$item]=$punkt_arr;
        }
        return $show_executor_working_region;

    }

}
