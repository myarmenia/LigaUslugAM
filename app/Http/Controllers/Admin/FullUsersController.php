<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Executor;
use App\Models\ExecutorCategory;
use App\Models\ExecutorEducation;
use App\Models\ExecutorEducationCertificate;
use App\Models\ExecutorProfile;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class FullUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_users = User::orderBy('id','desc')->paginate(10);
        return view('admin.all_users', compact('all_users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $show_user_profile = User::where('id',$id)->first();
        // dd($show_user_profile);


        return view('admin.show_user_profile_page',compact('show_user_profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $executor=ExecutorProfile::where('user_id',$id)->first();

        if($executor){
            $executor_profile_work_experience = $executor->executor_profile_work_experiences()->delete();
            $executor_working_regions = $executor->executor_working_regions()->delete();
            $executor_portfolios = $executor->executor_portfolios()->delete();
            $executor_portfolio_links = $executor->executor_portfolio_links()->delete();
            $executor_educations = $executor->executor_educations()->delete();
            $executor_education_certificates = $executor->executor_education_certificates()->delete();
            $executor_category =$executor->executor_categories()->delete();
            $executor_subcategories =$executor->executor_subcategories()->delete();
            $executor_education = ExecutorEducation::where('executor_profile_id', $executor->id)->delete();

            $executor->delete();
        }
        $task=Task::where('user_id',$id)->get();
        if( $task->count()>0){
            foreach($task as $item){
                $item->image_tasks()->delete();
                $item->click_on_tasks()->delete();
                $item->chats()->delete();
                $item->reitings()->delete();
              $item->delete();
            }
        }
        $user=User::where('id',$id)->delete();

        return redirect()->back()->with('message_error','Пользователь удален.');

    }

}
