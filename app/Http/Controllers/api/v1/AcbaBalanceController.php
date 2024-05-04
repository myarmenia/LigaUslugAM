<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\ExecutorProfile;
use App\Models\TransactionApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

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
        // dd($transaction_api->id);

        // $response = Http::withHeaders(['Content-Type' => 'application/json'])
        //                     ->post('https://ipaytest.arca.am:8445/payment/rest/register.do', [

        //                         'userName'=>'gorcka_api',
        //                         'password' => 'Nokia6300',
        //                         'amount' => $request->executor_account,
        //                         'currency' => '051',
        //                         'language'=> 'en',
        //                         'orderNumber'=> $transaction_api->id,
        //                         'returnUrl'=> 'https://gorc-ka.am/'
        //                     ]);
        
                            $data=[
                                'userName'=>'gorcka_api',
                                'password' => 'Nokia6300',
                                'amount' => $request->executor_account,
                                'currency' => '051',
                                'language'=> 'en',
                                'orderNumber'=> $transaction_api->id,
                                'returnUrl'=> 'https://gorc-ka.am/'
                            ];
                            $response = Http::withOptions([
                                CURLOPT_CUSTOMREQUEST => 'POST', // Set the request method to POST
                                CURLOPT_POSTFIELDS => json_encode($data), // Set the request body
                                CURLOPT_HTTPHEADER => ['Content-Type: application/json'], // Set custom headers
                            ])->get('https://ipaytest.arca.am:8445/payment/rest/register.do');


            $responseBody = $response->body();
            echo $responseBody;

    }
}
