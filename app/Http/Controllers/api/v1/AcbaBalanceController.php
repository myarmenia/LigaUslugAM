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
    ])->asForm()->post('https://ipaytest.arca.am:8445/payment/rest/register.do', [
        'userName'=>'gorcka_api',
        'password' => 'Nokia6300',
        'amount' => $request->executor_account,
        'currency' => '051',
        'language'=> 'en',
        'orderNumber'=> "G".$transaction_api->id,
        'returnUrl'=> url('').'/payment-result/'.$transaction_api->id

    ]);

        $responseBody = $response->getBody()->getContents();
        echo   $responseBody;


    }
    public function paymentResult(Request $request,$transactionId){
        // dd($transactionId);
        // dd($request['orderId']);
        $transaction_api=TransactionApi::where('id',$transactionId)->first();
        $transaction_api->paymentId = $request['orderId'];
        $transaction_api->status = "success";
        $transaction_api->save();
        // dd(777);
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
