<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\ExecutorProfile;
use App\Models\TransactionApi;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class AcbaBalanceController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */




    public function store(Request $request)
    {


        $executor=ExecutorProfile::where('user_id',Auth::user()->id)->first();


        $transaction_api=TransactionApi::create([

                'executor_profile_id' => $executor->id,
                   'transaction_name' => "Increase balance",
            'transaction_description' => "Increase balance",
                            'account' => $request->executor_account,

        ]);

    $response= Http::withOptions([
        'verify' => false,
    ])->asForm()->post(

        'https://ipaytest.arca.am:8445/payment/rest/register.do',
        // 'https://ipay.arca.am/payment/rest/register.do',
    [
        'userName'=>env('ACBA_TEST_USER_NAME'),
        'password' => env('ACBA_TEST_PASSWORD'),
        // 'userName'=>env('ACBA_REAL_USER_NAME'),
        // 'password' => env('ACBA_REAL_PASSWORD'),
        'amount' => $request->executor_account*100,
        'currency' => '051',
        'language'=> 'en',
        'orderNumber'=> "A".$transaction_api->id,
        'returnUrl'=> url('').'/payment-result/'.$transaction_api->id

    ]);

        $responseBody = $response->getBody()->getContents();
        echo   $responseBody;


    }
    public function paymentResult(Request $request,$transactionId){

        $params = [
            'userName'=>env('ACBA_REAL_USER_NAME'),
            'password' => env('ACBA_REAL_PASSWORD'),
            'language'=> 'en',
            'orderId'=> $request['orderId'],
        ];

        $response = Http::withOptions([
            'verify' => false,
        ])->get('https://ipay.arca.am/payment/rest/getOrderStatusExtended.do', $params);

        $responseBody = $response->getBody()->getContents();
        dd($responseBody);
        // dd($transactionId);
        // dd($request['orderId']);
        $transaction_api=TransactionApi::where('id',$transactionId)->first();
        $transaction_api->paymentId = $request['orderId'];
        $transaction_api->status = "success";
        $transaction_api->save();

        if( $transaction_api->status=="success"){
            $executor_profile=ExecutorProfile::where('id',$transaction_api->executor_profile_id)->first();
            $old_balance=$executor_profile->balance;
            $new_balance=$old_balance+ $transaction_api->account;
            $executor_profile->balance=$new_balance;
            $executor_profile->save();
        }

        return Redirect::to('https://gorc-ka.am?status=ok');

    }
}
