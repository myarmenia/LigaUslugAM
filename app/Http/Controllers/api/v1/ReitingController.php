<?php

namespace App\Http\Controllers\api\v1;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ReitingRequest;
use App\Http\Resources\ReitingResource;
use App\Http\Resources\ErrorResource;
use App\Models\ExecutorProfile;
use App\Models\Reiting;
use App\Models\Task;
use App\Models\User;
use App\Notifications\NotifyEmployerForGettingRating;
use App\Notifications\NotifyExecutorForGettingRating;
use App\Notifications\RatingForCompletedTask;
use LDAP\Result;

class ReitingController extends Controller
{
    public function createReiting(ReitingRequest $request){
        $user = Auth::user()->id;
       $check = Reiting::where(['task_id'=>$request->task_id])->first();
        $task = Task::where('id',$request->task_id)->first();
        // dump($check->task_id);

            if($user == $task->user_id){
                    $rating = 'employer_star_count_to_executor';
                    $review = 'employer_review_to_executor';
                 $user_fild = 'user_id';
                 $opposite_user_fild ='executor_profile_id';
            }
            else{
                    $rating = 'executor_star_count_to_employer';
                    $review = 'executor_review_to_employer';
                 $user_fild = 'executor_profile_id';
                 $opposite_user_fild ='user_id';

            }

            if($check){

                if(!empty($check->$rating)){
                    return response()->json([
                    'message' => 'Вы уже оценили'], 404);
                }

                $update = Reiting::where('task_id', $request->task_id)->update(["$rating"=>$request->rating, "$review"=>$request->content]);

                  // getting avg rating and review count of employer

                //   $total_sum= Reiting::where($user_fild, $task->$user_fild)->sum($rating);
                //   $count_for_user_fild = Reiting::where($user_fild, $task->$user_fild)->whereNotNull($rating);
                //   $review_count=$count_for_user_fild->count();
                //   $user_fild_avg_rating = $total_sum/$review_count;

                //   if($user == $task->user_id){
                //         $update_total_rating_for_employer=User::where('id',$task->user_id)->update(['employer_avg_rating'=>$user_fild_avg_rating,'employer_review_count'=>$review_count]);
                //   }else{
                //     $update_total_rating_for_executor=ExecutorProfile::where('id',$task->executor_profile_id)->update(['total_reiting'=>$user_fild_avg_rating,'executor_review_count'=>$review_count]);
                //   }

                $this->finter($opposite_user_fild,$task->$opposite_user_fild,$rating,$task->user_id, $task->executor_profile_id);

                // ----------send notification when someone already comment you-----------------
                if(Auth::id()==$task->user_id){
                    $ratingforexecutor=Reiting::with('tasks.users','tasks.executor_profiles.users')->where('task_id',$request->task_id)->first();
                    $executor = ExecutorProfile::where('id',$task->executor_profile_id)->first();
                    $executor->users->notify(new NotifyExecutorForGettingRating($ratingforexecutor));
                }else{

                    $ratingforemployer=Reiting::with('tasks.executor_profiles.users')->where('task_id',$request->task_id)->first();

                    $task->users->notify(new NotifyEmployerForGettingRating($ratingforemployer));

                }



                return response()->json([
                    'message' =>'Спасибо за оценку и отзив'], 404);

            }else{

                $result = $request->validated();
                $result[$rating] = $request->rating;
                $result[$review] = $request->content;
                $result['user_id'] = $task->user_id;
                $result['executor_profile_id'] = $task->executor_profile_id;

                $reiting = Reiting::with('users')->create($result);


                $this->finter($opposite_user_fild,$task->$opposite_user_fild,$rating,$task->user_id, $task->executor_profile_id);





                    // notification section statr
                        // $executor = ExecutorProfile::where('id',$task->executor_profile_id)->first();

                        // $executor->users->notify(new RatingForCompletedTask($reiting,$task));


                    if(Auth::id()==$task->user_id){

                        $ratingforexecutor=Reiting::with('tasks.users','tasks.executor_profiles.users')->where('task_id',$request->task_id)->first();
                        $executor = ExecutorProfile::where('id',$task->executor_profile_id)->first();
                        // $executor->users->notify(new RatingForCompletedTask($reiting,$task));


                        $executor->users->notify(new NotifyExecutorForGettingRating($ratingforexecutor));
                    }else{

                        $ratingforemployer=Reiting::with('tasks.executor_profiles.users')->where('task_id',$request->task_id)->first();

                        $task->users->notify(new NotifyEmployerForGettingRating($ratingforemployer));

                    }

                    return new ReitingResource($reiting);

            };


    }
    public function finter($opposite_user_fild,$task_opposite_user_fild,$rating,$task_user_id, $task_executor_profile_id){


        // writing code for executor and employer  via calling  function finter  in the  createReiting function

        $total_sum= Reiting::where($opposite_user_fild, $task_opposite_user_fild)->sum($rating);
        $count_for_user_fild = Reiting::where($opposite_user_fild, $task_opposite_user_fild)->whereNotNull($rating);

        $review_count=$count_for_user_fild->count();
        $user_fild_avg_rating = $total_sum/$review_count;

        if(Auth::user()->id == $task_user_id){
            $update_total_rating_for_executor=ExecutorProfile::where('id',$task_executor_profile_id)->update(['total_reiting'=>$user_fild_avg_rating,'executor_review_count'=>$review_count]);
        }else{

          $update_total_rating_for_employer=User::where('id',$task_user_id)->update(['employer_avg_rating'=>$user_fild_avg_rating,'employer_review_count'=>$review_count]);
        }

    }
}
