<?php
namespace App\Http\Controllers\api\v1;


use App\Http\Controllers\Controller;
use App\Models\ExecutorProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use Glorand\Model\Settings\Models\ModelSettings;

class ProfileController extends Controller
{
    public function show(){

        $user=User::with('reitings','reitings.executor_profiles.users')->where('id',Auth::id())->get();
        return response()->json(['user'=>$user]);
    }

    public function updateAvatar(Request $request){
        $user=Auth::user();


        $imgPathvalidate = $request->validate([
            'img_path'=>'required|image'

        ]);



        $file=$request->file('img_path');
        $filename=time().$file->getClientOriginalName();
        $file->move(public_path('admin/img/img_user'),$filename);

        $update_user_avatar=User::where('id',$user->id)->update([
            'img_path'=> $filename
        ]);


        if($update_user_avatar){

            $settings = $user->user_settings();
            $settings['img_path']=1;
            $user->settings()->apply((array)$settings);
        }





        $response = ['message' => 'Вы успешно обновили аватар своего профиля!!','img_name'=>$filename,'url'=>'https://api.nver.am/public/admin/img/img_user/'];
        return response()->json($response);

    }


    public function updateSocLink(Request $request){
        $user_id=Auth::user()->id;
        $userprof='';
        $face='';
        $instagram='';
        if($request->has('fasebook_link')){

            $updatefields = $request->validate([
                'fasebook_link'=>'required|url',

            ]);
            if( $updatefields){
                $updatesoclinks=User::where('id',$user_id)->update(['fasebook_link'=>$request->fasebook_link]);
                $face= ['message'=>'Вы успешно обновили ссылку на Вконтакте'];

                if($updatesoclinks){
                    $settings = Auth::user()->user_settings();
                    $settings['fasebook_link']=1;
                    Auth::user()->settings()->apply((array)$settings);

                }

                $userprof=User::where('id',$user_id)->first();
            }

        }

        if($request->has('instagram_link')){

            $updatefields = $request->validate([
                'instagram_link'=>'required|url',

            ]);
            if( $updatefields){
                $updatesoclinks=User::where('id',$user_id)->update(['instagram_link'=>$request->instagram_link]);

                $instagram=['message'=>'Вы успешно обновили ссылку в Однокласснике'];
                if($updatesoclinks){
                    $settings = Auth::user()->user_settings();
                    $settings['instagram_link']=1;
                    Auth::user()->settings()->apply((array)$settings);

                }
                $userprof=User::where('id',$user_id)->first();
            }

        }
         return response(['facebook'=>$face,'instagram'=>$instagram,'user'=>$userprof]);

    }
    public function updateNotification(Request $request){
        $user_id=Auth::user()->id;

        $geting_notification=$request->geting_notification;
        $updatenotification=User::where('id',$user_id)->update(['geting_notification'=>$geting_notification]);
        return response(['message'=>'Вы успешно обновили свой увидомления по заказам']);
    }
    public function userRegionAddress(Request $request){
        $user_id=Auth::user()->id;
        $users=User::where('id',Auth::id())->update($request->all());
        $user = User::where('id',$user_id)->first();


         return response()->json(['user' => $user]);

    }
    public function destroy($id){

        // $user = User::find( Auth::id());
        $delete_user = User::where('id',Auth::id())->delete();

        // $user->delete();

        return response()->json(["message"=>"deleted"]);
    }

}
