<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\ExecutorProfile;
use App\Models\TransactionApi;
use GuzzleHttp\Client;
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

        // dd(Auth::user()->id);
        $executor=ExecutorProfile::where('user_id',Auth::user()->id)->first();


        $transaction_api=TransactionApi::create([

                'executor_profile_id' => $executor->id,
                   'transaction_name' => "Increase balance",
            'transaction_description' => "Increase balance",
                            'account' => $request->executor_account,

        ]);
// dd($transaction_api->id);
                            // $data=[
                            //     'userName'=>'gorcka_api',
                            //     'password' => 'Nokia6300',
                            //     'amount' => $request->executor_account,
                            //     'currency' => '051',
                            //     'language'=> 'en',
                            //     'orderNumber'=> $transaction_api->id,
                            //     'returnUrl'=> 'https://gorc-ka.am/'
                            // ];
                            $data=[
                                'userName'=>$request->userName,
                                'password' => $request->password,
                                'amount' => $request->amount,
                                'currency' => $request->currency,
                                'language'=> $request->language,
                                'orderNumber'=>$request->orderNumber,
                                'returnUrl'=> $request->returnUrl
                            ];

        // $curl = curl_init();

        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => 'https://ipaytest.arca.am:8445/payment/rest/register.do',
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => '',
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 0,
        //     CURLOPT_FOLLOWLOCATION => true,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => 'POST',
        //     CURLOPT_POSTFIELDS =>  $data,
        //     CURLOPT_HTTPHEADER => array( 'Cookie: PHPSESSID=pm3nbuec05dmb5n3pc8cfmse94' ),

        // ));


        // $response = curl_exec($curl);
        // dd($response);

        // echo $response;
      $client = new Client(['verify' => false]);

    //   $response = $client->post('https://ipaytest.arca.am:8445/payment/rest/register.do', [
    //       'headers' => [
    //         'Content-Type' => 'application/json',

    //       ],
    //       'body' => json_encode([
    //                 'userName'=>'gorcka_api',
    //                 'password' => 'Nokia6300',
    //                 'amount' => $request->executor_account,
    //                 'currency' => '051',
    //                 'language'=> 'en',
    //                 'orderNumber'=> $transaction_api->id,
    //                 'returnUrl'=> 'https://gorc-ka.am/'

    //       ])
    //   ]);
    //   $responseBody = $response->getBody()->getContents();
    //   echo   $responseBody;
    $response= Http::withOptions([
        'verify' => false,
    ])->asForm()->post('https://ipaytest.arca.am:8445/payment/rest/register.do', [
        'userName'=>'gorcka_api',
        'password' => 'Nokia6300',
        'amount' => $request->executor_account,
        'currency' => '051',
        'language'=> 'en',
        'orderNumber'=> $transaction_api->id,
        'returnUrl'=> 'https://gorc-ka.am/'
    ]);
       $responseBody = $response->getBody()->getContents();
      echo   $responseBody;


    }
}
