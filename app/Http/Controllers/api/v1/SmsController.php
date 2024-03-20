<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\PhoneNumberVerification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Http;

class SmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
// ----old
    // public function GetPhoneNumber(Request $request){

    //     if($request->has('phone_number')){
    //         $user_id = Auth::user()->id;
    //         // generating code for verification
    //         $str = "";
    //         $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
    //                $max = count($characters) - 1;
    //             for ($i = 0; $i < 6; $i++) {
    //               $rand = mt_rand(0, $max);
    //               $str .= $characters[$rand];
    //             }

    //                 $smsru = new Smsru('D3F08502-1F17-1EBE-E472-7993198291C8');
    //                  $data = new stdClass();
    //              $data->to = $request->phone_number;
    //            $data->text = $str;
    //                   $sms = $smsru->send_one($data);

    //                 if ($sms->status == "OK") {
    //                     $phone_number_verification=PhoneNumberVerification::create([
    //                         "user_id" => $user_id,
    //                           "token" => $str,
    //                     ]);
    //                     $user = User::where('id',$user_id)->update([
    //                         "phonenumber"=>$request->phone_number
    //                     ]);
    //                     if($user){
    //                         return response()->json(['message' => "Отправить код подтверждения"]);
    //                     }


    //                 } else {
    //                     return response()->json(['message' => "faild"]);
    //                 }


    //     }

    // }
    // public  function getSms(Request $request){

    //     if($request->has('verification_code')){

    //         $user_id = Auth::user()->id;


    //         $select = PhoneNumberVerification::where(['user_id'=>$user_id,'token'=>$request->verification_code])->first();
    //         if($select){
    //             $update = PhoneNumberVerification::where('user_id',$user_id)->update([
    //                 'status' => "OK"
    //             ]);
    //             if($update){
    //                 $user=User::where('id',$user_id)->update([
    //                     "phone_status"=>"verified"
    //                 ]);

    //                     $check_phone_number_verified=User::where('id',Auth::id())->first();
    //                     if($check_phone_number_verified->phone_status=="verified"){
    //                         $settings = Auth::user()->user_settings();

    //                         $settings['phone_status'] = 1;
    //                         // dd($settings);
    //                         $check_phone_number_verified->settings()->apply((array)$settings);
    //                         return response()->json(['message'=>"Ваш номер был успешно подтвержден"]);
    //                     }




    //             }else{
    //                 return response()->json(['message'=>"Ваш номер не подтвержден"]);
    //             }

    //         }else{

    //             return response()->json(['message'=>"Ваш номер не подтвержден"]);
    //         }

    //     }



    // }
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
                            return response()->json(['message'=>"Ваш номер был успешно подтвержден"]);
                        }




                }else{
                    return response()->json(['message'=>"Ваш номер не подтвержден"]);
                }

            }else{

                return response()->json(['message'=>"Код подтверждения неправильный"]);
            }

        }



    }




    // public function GetPhoneNumber(Request $request)
    // {

    //         if($request->has('phone_number')){

    //             // $user=User::where('id',Auth::id())->first();

    //             $check_user_phone=User::where(['phonenumber'=>$request->phone_number,'phone_status'=>'verified'])->first();
    //             if($check_user_phone){
    //                 return response()->json(['message' => "Этот номер уже подтвержден."]);
    //             }else{
    //                     $user=PhoneNumberVerification::where('user_id',Auth::id())->delete();
    //                     $user=User::where('id',Auth::id())->update(['phone_status'=>'not verified','phonenumber'=>'']);

    //                     $smsru = new Smsru('D3F08502-1F17-1EBE-E472-7993198291C8');
    //                     $data = new stdClass();
    //                     $ch = curl_init("https://sms.ru/code/call");
    //                     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //                     curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    //                     curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
    //                         "phone" => $request->phone_number, // номер телефона пользователя
    //                         "ip" => $_SERVER["REMOTE_ADDR"], // ip адрес пользователя
    //                         "api_id" => "D3F08502-1F17-1EBE-E472-7993198291C8"



    //                     )));
    //                     $body = curl_exec($ch);
    //                     curl_close($ch);
    //                     $json = json_decode($body);
    //                     if($json) { // Получен ответ от сервера

    //                         // print_r($json); // Для дебага
    //                         if ($json->status == "OK") { // Запрос выполнился
    //                             // echo "Звонок выполняется. ";
    //                             // echo "Четырехзначный код (последние 4 цифры номера, с которого мы позвоним пользователю): ".$json->code.". ";
    //                             // echo "ID звонка: ".$json->call_id.". ";
    //                             // echo "Стоимость звонка: ".$json->cost." руб. ";
    //                             // echo "Ваш баланс после звонка: ".$json->balance." руб. ";
    //                             // echo "";
    //                             // $check_user_phone=User::where(['id'=>Auth::id(),'phonenumber'=>$request->phone_number])->first();
    //                             // if($check_user_phone){
    //                             //     return response()->json(['message' => "Этот номер уже подтвержден."]);
    //                             // }

    //                             $phone_number_verification=PhoneNumberVerification::create([
    //                                         "user_id" => Auth::id(),
    //                                         "token" => $json->code,
    //                                     ]);

    //                                     $user = User::where('id',Auth::id())->update([
    //                                         "phonenumber"=>$request->phone_number,
    //                                         "phone_status"=>'not verified'
    //                                     ]);
    //                                     if($user){
    //                                         $settings = Auth::user()->user_settings();

    //                                         $settings['phone_status'] = 0;

    //                                         return response()->json(['message' => "Отправить код подтверждения"]);
    //                                     }

    //                             // return response()->json(['message'=>"Ваш номер был успешно подтвержден"]);
    //                         } else { // Ошибка в запросе
    //                             // echo "Звонок не может быть выполнен. ";
    //                             // echo "Текст ошибки: ".$data->status_text.". ";
    //                             // echo "";
    //                             // return $json;
    //                             return response()->json(['message'=>$json]);
    //                             return response()->json(['message'=>"Ваш номер не подтвержден"]);
    //                         }

    //                     }else{
    //                         // echo "Запрос не выполнился. Не удалось установить связь с сервером. ";
    //                         return response()->json(['message'=>"Запрос не выполнился. Не удалось установить связь с сервером. "]);
    //                     }
    //                 }


    //         }
    // }
    public function GetPhoneNumber(Request $request)
    {

            if($request->has('phone_number')){

                // $user=User::where('id',Auth::id())->first();

                $check_user_phone=User::where(['phonenumber'=>$request->phone_number,'phone_status'=>'verified'])->first();
                if($check_user_phone){
                    return response()->json(['message' => "Этот номер уже подтвержден."]);
                }else{

                        $user=PhoneNumberVerification::where('user_id',Auth::id())->delete();
                        $user=User::where('id',Auth::id())->update(['phone_status'=>'not verified','phonenumber'=>'']);
                        $text ="Հարգելի օգտատեր Ձեզ հեռախոսահամարն ակտիվացված է";
                        $user_phone_number=37498054449;

                                    // $obj = new stdClass();
                                    // $obj->messages['recipient'] = $user_phone_number;
                                    // $obj->messages['priority'] = 2;
                                    // $obj->messages['message-id'] = "201902280917";
                                    // $obj->messages['sms']['originator']="Gorc-ka.am";
                                    // $obj->messages['sms']['content']['text']=$text;
                                    // $json_data=json_encode($obj, true);

                                    //     $ch = curl_init();


                                    //     curl_setopt($ch, CURLOPT_URL, 'https://sendsms.nikita.am/broker-api/send');
                                    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                    //     curl_setopt($ch, CURLOPT_POST, 1);
                                    //     curl_setopt($ch, CURLOPT_POSTFIELDS,$json_data);
                                    //     curl_setopt($ch, CURLOPT_USERPWD, 'webex' . ':' . 'GbrE29X1EV');

                                    //     $headers = array();
                                    //     $headers[] = 'Content-Type: application/json; charset=utf-8';
                                    //     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                                    //     $result = curl_exec($ch);
                                    //     if (curl_errno($ch)) {
                                    //         echo 'Error:' . curl_error($ch);
                                    //     }
                                    //     curl_close($ch);
                                    //     echo $result ;
                        $response = Http::withBasicAuth('webex', 'GbrE29X1EV')
                            ->post('https://sendsms.nikita.am/broker-api/send', [
                                'messages' => [
                                    [
                                        'recipient' => '37498054449',
                                        'priority' => '2',
                                        'sms' => [
                                            'originator' => 'Gorc-ka.am',
                                            'content' => [
                                                'text' => 'Հարգելի օգտատեր Ձեզ հեռախոսահամարն ակտիվացված է'
                                            ]
                                        ],
                                        'message-id' => '201902280917'
                                    ]
                                ]
                            ])->throw();

                           echo  $response;

                    }


            }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
