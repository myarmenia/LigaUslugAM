<?php

namespace App\Http\Controllers;

use App\Models\ExecutorProfile;
use App\Models\TransactionApi;
use Illuminate\Http\Request;

class GetStatusTinkoffTransactionController extends Controller
{
        public function index(Request $request){

                // "TerminalKey":"1510572937960",

                // "OrderId":"test2",
                // "Success":true,
                // "Status":"CONFIRMED",
                // "PaymentId":2006896,
                // "ErrorCode":"0",
                // "Amount":102120,
                // "CardId":867911,
                // "Pan":"430000**0777",
                // "ExpDate":"1122",
                // "Token":"d0815e288f121255d5d6b77831fb486cc5e9f91914a3f58a99b6118b54676d84"
                if($request->has('TerminalKey') && $request->TerminalKey == '1644570310100')
            {

              $transaction=TransactionApi::where(['paymentId'=>$request->PaymentId,'status'=>"NEW"])->first();

                $executor=ExecutorProfile::where('id',$transaction->executor_profile_id )->first();
              if($request->Status=="CONFIRMED"){
                  $amount = $request->Amount/100;
                  $transaction->update([
                      "status"=>"CONFIRMED",
                      "account"=>$amount,

                    ]);

                    $total_balance=$executor->balance+$amount;
                    $executor->update([
                        "balance" => $total_balance
                    ]);
                }

                echo "OK";

            }

        }
}
