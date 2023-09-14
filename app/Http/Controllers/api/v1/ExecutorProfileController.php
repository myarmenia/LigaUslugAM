<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\ExecutorPortfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ExecutorProfileRequest;
use App\Http\Requests\PortfolioRequest;
use App\Http\Resources\ExecutorProfileResource;
use App\Http\Resources\UserResource;
use App\Models\ExecutorCategory;
use App\Models\User;
use App\Models\ExecutorProfile;
use App\Models\ExecutorProfileWorkExperience;
use App\Models\ExecutorWorkingRegion;
use App\Models\ExecutorPortfolioLink;
use App\Models\ExecutorEducation;
use App\Models\ExecutorEducationCertificate;
use App\Models\ExecutorSubcategory;
use App\Models\TransactionApi;
use File;

class ExecutorProfileController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $user=Auth::user()->id;
        $settings = Auth::user()->user_settings();
        // dd($settings);
        $show_user=User::where('id',$user)->first();

        $executor_profiles=ExecutorProfile::with('reiting')->where('user_id',$user)->first();

        if(!$executor_profiles){

            $create_executor_profiles=ExecutorProfile::create([
                'user_id'=>$user,
            ]);

            // creating executor the first time
            return new ExecutorProfileResource( $create_executor_profiles);

        }else{
            // $show_executor_profile = ExecutorProfile::where('user_id',Auth::id())->first();
            // $regions = ExecutorWorkingRegion::where('executor_profile_id',$show_executor_profile->id)->distinct('executorwork_region')->pluck('executorwork_region');
            // dd($regions);
            $show_executor_profile = ExecutorProfile::where('user_id',$user)->get();
            return ExecutorProfileResource::collection($show_executor_profile);
        }

    }


    public function updateExecutorPersonalData (Request $request){

        $user_id=Auth::user()->id;
        $users=User::where('id',Auth::id())->update($request->all());
        $user = User::where('id',$user_id)->first();

             $settings = Auth::user()->user_settings();

               if($user->gender==null){
                   $settings['gender'] = 0;
                   $user->settings()->apply((array)$settings);
               }else{

                   $settings['gender'] = 1;
                   $user->settings()->apply((array)$settings);
               }
               if($user->birth_date==null){
                   $settings['birth_date'] = 0;
                   $user->settings()->apply((array)$settings);
               }else{
                   $settings['birth_date'] = 1;
                   $user->settings()->apply((array)$settings);
               }
               if($user->about_me==null){
                   $settings['about_me'] = 0;
                   $user->settings()->apply((array)$settings);
               }else{
                   $settings['about_me'] = 1;
                   $user->settings()->apply((array)$settings);
               }



                $user = User::where('id',$user_id);
                if($request->has("about_me")){

                   $user =$user->get();
                   $show_executor_profile=ExecutorProfile::with('users')->where('user_id',$user_id)->get();
                  return ExecutorProfileResource::collection($show_executor_profile);


                }else{
                   $user =$user->get()->makeHidden(['about_me']);
                   return response()->json(['user' => $user]);

                }

    }

    public function professionAndExperience(Request $request){
        // dd(444);
        $user_id=Auth::user()->id;
        $settings = Auth::user()->user_settings();
        // dd($settings);
        $executor_profiles=ExecutorProfile::where('user_id',$user_id)->first();

        if($request->has('profession_and_experience')){
            foreach($request->profession_and_experience as $value){
                $createExecutorCategory=ExecutorCategory::where('executor_profile_id',$executor_profiles->id)->delete();
                foreach($value['executor_categories']  as $item){
                    // var_dump($item);
                    $createExecutorCategory=ExecutorCategory::create([
                                    'executor_profile_id'=>$executor_profiles->id,
                                    'category_name'=>$item['category_name'],

                                ]);
                }
                $createExecutorSubcategory=ExecutorSubcategory::where('executor_profile_id',$executor_profiles->id)->delete();
                foreach($value['executor_subcategories'] as $item){

                    $createExecutorSubcategory=ExecutorSubcategory::create([
                    'executor_profile_id'=>$executor_profiles->id,
                    'subcategory_name'=>$item['subcategory_name'],

                    ]);
                }
                $executorprofileworkexperienc=ExecutorProfileWorkExperience::where('executor_profile_id',$executor_profiles->id)->delete();

                foreach($value['executor_profile_work_experiences'] as $item){
                    $executorprofileworkexperienc=ExecutorProfileWorkExperience::create([

                        'executor_profile_id'=> $executor_profiles->id,
                              'working_place'=> $item['working_place'],
                           'recruitment_data'=> $item['recruitment_data'],
                             'dismissal_data'=> $item['dismissal_data']

                    ]);
                }



                // checking if executor has a category or subcategory  or working place  if there is one record then settings turned 0 to 1


                    $executorcategory =ExecutorCategory:: where('executor_profile_id',$executor_profiles->id)->first();
                    if($executorcategory){
                        $settings['category_name'] = 1;
                    }else{
                        $settings['category_name'] = 0;
                    }
                    $executorsubcategory = ExecutorSubcategory::where('executor_profile_id',$executor_profiles->id)->first();
                    if($executorsubcategory){
                        $settings['subcategory_name'] = 1;
                    }else{
                        $settings['subcategory_name'] = 0;
                    }
                    $executor_profile_workExperience = ExecutorProfileWorkExperience::where('executor_profile_id',$executor_profiles->id)->first();
                    if($executor_profile_workExperience){
                        $settings['working_place'] = 1;
                    }else{
                        $settings['working_place'] = 0;
                    }
                    Auth::user()->settings()->apply((array)$settings);
                    //  dd($settings);




                $show_executor_profile=ExecutorProfile::with('users')->where('user_id',$user_id)->get();
                return ExecutorProfileResource::collection($show_executor_profile);

            }
        }

    }


    public function regionAddress(Request $request){

        $user_id=Auth::user()->id;


        $executor_profiles=ExecutorProfile::where('user_id',$user_id)->first();
        if($request->has('region_and_address')){

            foreach($request->region_and_address as $value){

                foreach($value['personal_address'] as $item){


                     $executorprofile=User::where('id',Auth::id())->update([
                             "region" => $item['region'],
                            "country_name" => $item['country_name'],
                            "address" => $item['address'],
                        ]);
                };


                $executorworkingregion=ExecutorWorkingRegion::where('executor_profile_id',$executor_profiles->id)->delete();

                foreach($value['working_region'] as $item){

                    foreach($item['working_rayons'] as $key=>$data){

                        $executorprofile=ExecutorWorkingRegion::create([
                            'executor_profile_id'=>$executor_profiles->id,
                            "executorwork_region" => $item['executorwork_region'],
                            "working_rayon"=>$data['working_rayon']

                        ]);
                    }
                };
            }
            // checking data for  model settings
            $settings = Auth::user()->user_settings();
                $user=User::where('id',Auth::id())->first();
                if($user->region==null){
                    $settings['region'] = 0;
                }else{
                    $settings['region'] = 1;
                }
                if($user->address==null){

                    $settings['address'] = 0;
                }else{
                    $settings['address'] = 1;
                }
                $executor=ExecutorProfile::where('user_id',Auth::id())->first();
                $executor_working_region_isset=ExecutorWorkingRegion::where('executor_profile_id', $executor->id)->first();
                if($executor_working_region_isset){

                    $settings['executorwork_region'] = 1;
                }else{

                    $settings['executorwork_region'] = 0;
                }
            Auth::user()->settings()->apply((array)$settings);
//   dd($settings);
            $show_executor_profile=ExecutorProfile::with('users')->where('user_id',$user_id)->get();

            return ExecutorProfileResource::collection($show_executor_profile);

        }
    }



    public function portfolioBase(Request $request){

        $user_id = Auth::user()->id;
        // dd($user_id);
        if($request->has('executor_portfolios')){
            $executor_profiles = ExecutorProfile::where('user_id',$user_id)->first();

            $executor_portfolio_delete = ExecutorPortfolio::where('executor_profile_id',$executor_profiles->id)->delete();

            foreach($request->executor_portfolios as  $items)
            {
                        $portfoliopic_base = $items['portfoliopic_base'];
                          // first explode as "," (data:image/jpeg;base64,)
                $portfoliopic_base_explode = explode(",",$portfoliopic_base);
                        // second we explode  as ";"(data:image/jpeg)
                $portfoliopic_base_explode_first_argument = explode(";", $portfoliopic_base_explode[0]);
                     // third we explode  for geting  jpeg  extention
               $extention=explode("/", $portfoliopic_base_explode_first_argument[0])[1];
                    // creating  $name for saving file  in database  in portfolio_pic column
                $name = time().rand(1,100).'.'.$extention;
                    // via  file_put_contents  we save the data which is a data:image/jpeg;base64, and in the folder we save data via concating  name

                file_put_contents('admin/img/img_executor_portfolios/'.$name, base64_decode($portfoliopic_base_explode[1]));

                $create_executor_portfolio=ExecutorPortfolio::create([
                    'executor_profile_id' => $executor_profiles->id,
                          'portfolio_pic' => $name,
                          'portfoliopic_base' => $items['portfoliopic_base']
                ]);
            }
        }
        if($request->has('executor_portfolio_links')){

            // dd($request->executor_portfolio_links[0]);

            $executor_portfolio_delete=ExecutorPortfolioLink::where('executor_profile_id',$executor_profiles->id)->delete();
            if($request->executor_portfolio_links[0]['portfolio_link']!=null){
                foreach($request->executor_portfolio_links as  $items)
                {
                        $createExecutorPortfolioLink = ExecutorPortfolioLink::create([
                            'executor_profile_id' => $executor_profiles->id,
                                 'portfolio_link' => $items['portfolio_link'],

                        ]);
                }
            }


        }
        // checking data for  model settings
        $user=User::where('id',Auth::id())->first();
        $settings = Auth::user()->user_settings();
        $executorportfolio = ExecutorPortfolio::where('executor_profile_id',$executor_profiles->id)->first();
        if( $executorportfolio){
            $settings['portfolio_pic'] = 1;
            $user->settings()->apply((array)$settings);
        }else{
            $settings['portfolio_pic'] = 0;
            $user->settings()->apply((array)$settings);
        }
        $executorportfoliolink =  ExecutorPortfolioLink:: where('executor_profile_id',$executor_profiles->id)->first();
        if( $executorportfoliolink){
            $settings['portfolio_link'] = 1;
            $user->settings()->apply((array)$settings);
        }else{
            $settings['portfolio_link'] = 0;
            $user->settings()->apply((array)$settings);
        }
        // Auth::user()->settings()->apply((array)$settings);
        // dd($settings);
        $show_executor_profile=ExecutorProfile::with('users')->where('user_id',$user_id)->get();
        return ExecutorProfileResource::collection($show_executor_profile);

    }
    public function educationAndCertificates(Request $request){

        // dd($request->executor_educations[0]['education_place']);
        $user_id = Auth::user()->id;

        $settings = Auth::user()->user_settings();
        // dd($settings['education_type']);
        $executor_profiles = ExecutorProfile::where('user_id',$user_id)->first();

        if($request->has('executor_educations')){

            $executor_education =ExecutorEducation::where('executor_profile_id',$executor_profiles->id)->first();

            if($executor_education){

                if($request->executor_educations[0]['education_place']==null){
                    $validator = Validator::make($request->all(), [
                        'education_place' =>'required',
                    ]);

                    if ($validator->fails()) {


                          return response()->json(['errors'=>$validator->errors()], 404);
                    }





                }
                foreach($request->executor_educations as $value){

                    $createExecutorEducations=ExecutorEducation::where('executor_profile_id',  $executor_profiles->id)->update([
                                        'education_type' => $value['education_type'],
                                       'education_place' => $value['education_place']

                               ]);
                }





            }else{

                foreach($request->executor_educations as $value){

                    $createExecutorEducations=ExecutorEducation::create([
                                        'executor_profile_id' => $executor_profiles->id,
                                             'education_type' => $value['education_type'],
                                            'education_place' => $value['education_place']

                                    ]);
                }
            }

        }
        if($request->has('executor_education_certificates')){
            $deleteExecutorEducationCertificates=ExecutorEducationCertificate::where('executor_profile_id',$executor_profiles->id)->delete();
            foreach($request->executor_education_certificates as  $items)
            {
                        $certificate_base = $items['certificate_base'];

                          // first explode as "," (data:image/jpeg;base64,)
                          $certificate_base_explode = explode(",", $certificate_base);
                        // second we explode  as ";"(data:image/jpeg)
                        $certificate_base_first_argument = explode(";", $certificate_base_explode[0]);

                     // third we explode  for geting  jpeg  extention
               $extention=explode("/",  $certificate_base_first_argument[0])[1];

                    // creating  $name for saving file  in database  in portfolio_pic column
                $name = time().rand(1,100).'.'.$extention;

                    // via  file_put_contents  we save the data which is a data:image/jpeg;base64, and in the folder we save data via concating  name

                    //   $path = public_path('admin/img/img_executor_certificate/'. $executor_profiles->id);
                    //   dump($path);
                        // if(!File::isDirectory($path)){
                        //     File::makeDirectory($path, 0777, true, true);
                            file_put_contents('admin/img/img_executor_certificate/'.$name, base64_decode($certificate_base_explode[1]));
                        // }

                    // $file = public_path('image');

                    // $result = ::makeDirectory($file);

                    // dd($result);



                $createExecutorEducationCertificates=ExecutorEducationCertificate::create([
                                'executor_profile_id' => $executor_profiles->id,
                                        'certificate' => $name,
                                   'certificate_base' => $items['certificate_base'],
                            ]);
            }

        }
        // checking data for  model settings
        // dd($settings);
        $executoreducation = ExecutorEducation:: where('executor_profile_id',$executor_profiles->id)->first();
        if($executoreducation){
             $settings['education_type'] = 1;
            $settings['education_place'] = 1;
        }else{
            $settings['education_type'] = 0;
            $settings['education_place'] = 0;
        }
        $executoreducationcertificate =  ExecutorEducationCertificate::where('executor_profile_id',$executor_profiles->id)->first();
        if($executoreducationcertificate){
            $settings['certificate'] = 1;
        }else{
            $settings['certificate'] = 0;
        }
         Auth::user()->settings()->apply((array)$settings);
        //  dd($settings);
        $show_executor_profile=ExecutorProfile::with('users')->where('user_id',$user_id)->get();
        return ExecutorProfileResource::collection($show_executor_profile);


     }
    public  function asInApplication(){

                  $user_id = Auth::user()->id;
        $executor_profiles = ExecutorProfile::where('user_id',$user_id)->first();
      $executor_categories = $executor_profiles->executor_categories->makeHidden([ "id","executor_profile_id","created_at", "updated_at"]);

        return response()->json(['executor_categories'=>$executor_categories]);

    }










    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     echo "kk";
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(ExecutorProfileRequest $request, ExecutorProfile $ExecutorProfile)
    // {
    //     $ExecutorProfile->update($request->all());
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }
}
