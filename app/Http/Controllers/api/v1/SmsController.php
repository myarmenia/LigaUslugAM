<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhoneNumberRequest;
use App\Models\PhoneNumberVerification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use stdClass;
// use GuzzleHttp\Client;
class SmsController extends Controller
{


    public  function getSms(Request $request){

        if($request->has('verification_code')){

            $user_id = Auth::user()->id;


            $select = PhoneNumberVerification::where(['user_id'=>$user_id,'token'=>$request->verification_code])->first();
            if($select){
                $update = PhoneNumberVerification::where('user_id',$user_id)->update([
                    'status' => "OK"
                ]);
                if($update){
                    $user=User::where('id',$user_id)->update([
                        "phone_status"=>"verified"
                    ]);

                        $check_phone_number_verified=User::where('id',Auth::id())->first();
                        if($check_phone_number_verified->phone_status=="verified"){
                            $settings = Auth::user()->user_settings();

                            $settings['phone_status'] = 1;
                            // dd($settings);
                            $check_phone_number_verified->settings()->apply((array)$settings);
                            return response()->json(['message'=>'Ձեր հեռախոսահամարն ակտիվացված է']);
                        }




                }else{
                    return response()->json(['message'=>"Ваш номер не подтвержден"]);
                }

            }else{

                return response()->json(['message'=>"Հաստատման կոդն անվավեր է "]);
            }

        }



    }





    public function GetPhoneNumber(PhoneNumberRequest $request)
    {

            if($request->has('phone_number')){


                        $user=PhoneNumberVerification::where('user_id',Auth::id())->delete();
                        $user=User::where('id',Auth::id())->update(['phone_status'=>'not verified','phonenumber'=>'']);

                        $user_phone_number=$request->phone_number;
                        // dd($user_phone_number);
                        // $client = new \GuzzleHttp\Client([
                        //     'verify' => false,
                        //   ]);

                        $sms = mt_rand(1000000, 9999999);
                        $response = Http::withBasicAuth('webex', 'GbrE29X1EV')
                            ->post('https://sendsms.nikita.am/broker-api/send', [
                                'messages' => [
                                    [
                                        'recipient' => $user_phone_number,
                                        'priority' => '2',
                                        'sms' => [
                                            'originator' => 'Gorc-ka.am',
                                            'content' => [
                                                'text' => $sms
                                            ]
                                        ],
                                        'message-id' => '201902280917'
                                    ]
                                ]
                            ])->throw();
                        // dd($client);
                            // $response = $client->request('POST', 'https://sendsms.nikita.am/broker-api/send', [
                            //     'auth' => ['webex', 'GbrE29X1EV'],
                            //     'form_params' => [
                            //             'messages' => [
                            //                 [
                            //                     'recipient' => $user_phone_number,
                            //                     'priority' => '2',
                            //                     'sms' => [
                            //                         'originator' => 'Gorc-ka.am',
                            //                         'content' => [
                            //                             'text' => 'Հարգելի օգտատեր Ձեզ հեռախոսահամարն ակտիվացված է'
                            //                         ]
                            //                     ],
                            //                     'message-id' => '201902280917',
                            //                 ],
                            //             ],
                            //         ]
                            //     ]);

                            // $pin = mt_rand(1000000, 9999999);
                            // echo $pin;

                            $user=PhoneNumberVerification::create([
                                'user_id'=>Auth::id(),
                                'token'=>$sms

                            ]);

                            $body = $response->getBody()->getContents();
                            echo $body;


            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
