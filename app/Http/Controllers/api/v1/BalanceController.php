<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionApiReseource;
use App\Models\ExecutorProfile;
use App\Models\TransactionApi;
use App\Models\User;
use App\TinkoffMerchantAPI\TinkoffMerchantAPI;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class BalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




        // ------------------- index -----------------------------------------
    public function index(){
        $executor_profile = ExecutorProfile::where('user_id',Auth::user()->id)->get();
        $dd = TransactionApiReseource::collection($executor_profile);
        return response()->json($dd);
    }

    public function increaseBalance(Request $request){
    //  $t = new TinkoffMerchantApi('1644570310100DEMO','jgucz9bewfyang83');
    //  dd($t);
        if($request->has('executor_account')){
            // dump($request->executor_account);
            $executor=ExecutorProfile::where('user_id',Auth::user()->id)->first();
            // if($executor->balance>0){
                // $add=$executor->balance+$request->executor_account;
                // $update_executor_account = ExecutorProfile::where('user_id',Auth::user()->id)->update([
                //     'balance' =>$add
                // ]);

                $transaction_api=TransactionApi::create([

                        'executor_profile_id' => $executor->id,
                           'transaction_name' => "Пополнение баланса",
                    'transaction_description' => "Пополнение баланса",
                                    'account' => $request->executor_account,

                ]);

                // $executor_profile = ExecutorProfile::where('user_id',Auth::user()->id)->get();
                // $update_balance= TransactionApiReseource::collection($executor_profile);
                // return response()->json($update_balance);
            // }
            // else if($executor->balance == 0){
            //     $update_executor_account = ExecutorProfile::where('user_id',Auth::user()->id)->update([
            //         'balance' =>$request->executor_account
            //     ]);
            //     $executor_profile = ExecutorProfile::where('user_id',Auth::user()->id)->get();
            //     $update_balance= TransactionApiReseource::collection($executor_profile);
            //     return response()->json($update_balance);
            // }
            $api = new TinkoffMerchantApi(
                '1644570310100',  //Ваш Terminal_Key
                'vn9uzyxwiq4rhwdx'   //Ваш Secret_Key
            );

             $email = 'liga124@mail.ru';
             $emailCompany = 'liga124@mail.ru';
             $phone = '79659099970';

             $taxations = [
                  'osn'                => 'osn',                // Общая СН
                  'usn_income'         => 'usn_income',         // Упрощенная СН (доходы)
                  'usn_income_outcome' => 'usn_income_outcome', // Упрощенная СН (доходы минус расходы)
                  'envd'               => 'envd',               // Единый налог на вмененный доход
                  'esn'                => 'esn',                // Единый сельскохозяйственный налог
                  'patent'             => 'patent'              // Патентная СН
              ];

            $paymentMethod = [
                  'full_prepayment' => 'full_prepayment', //Предоплата 100%
                  'prepayment'      => 'prepayment',      //Предоплата
                  'advance'         => 'advance',         //Аванc
                  'full_payment'    => 'full_payment',    //Полный расчет
                  'partial_payment' => 'partial_payment', //Частичный расчет и кредит
                  'credit'          => 'credit',          //Передача в кредит
                  'credit_payment'  => 'credit_payment',  //Оплата кредита
              ];

            $paymentObject = [
                  'commodity'             => 'commodity',             //Товар
                  'excise'                => 'excise',                //Подакцизный товар
                  'job'                   => 'job',                   //Работа
                  'service'               => 'service',               //Услуга
                  'gambling_bet'          => 'gambling_bet',          //Ставка азартной игры
                  'gambling_prize'        => 'gambling_prize',        //Выигрыш азартной игры
                  'lottery'               => 'lottery',               //Лотерейный билет
                  'lottery_prize'         => 'lottery_prize',         //Выигрыш лотереи
                  'intellectual_activity' => 'intellectual_activity', //Предоставление результатов интеллектуальной деятельности
                  'payment'               => 'payment',               //Платеж
                  'agent_commission'      => 'agent_commission',      //Агентское вознаграждение
                  'composite'             => 'composite',             //Составной предмет расчета
                  'another'               => 'another',               //Иной предмет расчета
              ];

         $vats = [
                  'none'  => 'none', // Без НДС
                  'vat0'  => 'vat0', // НДС 0%
                  'vat10' => 'vat10',// НДС 10%
                  'vat20' => 'vat20' // НДС 20%
              ];


             $enabledTaxation = true;
             $amount = $request->executor_account*100;
            //  dd($amount);
            //  $price ='';
             $itemAmount = '';


            $receiptItem = [[
                    'Name'          => 'product1',
                    'Price'         => $amount,
                    'Quantity'      => 1,
                    'Amount'        => $amount,
                    'PaymentMethod' => $paymentMethod['full_prepayment'],
                    'PaymentObject' => $paymentObject['service'],
                    'Tax'           => $vats['none']
                ]];

             $isShipping = false;

                // if (!empty($this->isShipping[2]['Name'] === 'shipping')) {
                //     $this->isShipping = true;
                // }



                function balanceAmount($isShipping, $items, $amount)
                {
                // if (!empty($isShipping[2]['Name'] === 'shipping')) {
                //         $isShipping = true;
                //     }

                    $itemsWithoutShipping = $items;

                    if ($isShipping) {
                        $shipping = array_pop($itemsWithoutShipping);
                    }

                    $sum = 0;

                    foreach ($itemsWithoutShipping as $item) {
                        $sum += $item['Amount'];
                    }

                    if (isset($shipping)) {
                        $sum += $shipping['Amount'];
                    }

                    if ($sum != $amount) {
                        $sumAmountNew = 0;
                        $difference = $amount - $sum;
                        $amountNews = [];

                        foreach ($itemsWithoutShipping as $key => $item) {
                            $itemsAmountNew = $item['Amount'] + floor($difference * $item['Amount'] / $sum);
                            $amountNews[$key] = $itemsAmountNew;
                            $sumAmountNew += $itemsAmountNew;
                        }

                        if (isset($shipping)) {
                            $sumAmountNew += $shipping['Amount'];
                        }

                        if ($sumAmountNew != $amount) {
                            $max_key = array_keys($amountNews, max($amountNews))[0];    // ключ макс значения
                            $amountNews[$max_key] = max($amountNews) + ($amount - $sumAmountNew);
                        }

                        foreach ($amountNews as $key => $item) {
                            $items[$key]['Amount'] = $amountNews[$key];
                        }
                    }

                    return $items;
                }
                $receipt = [
                    'EmailCompany' => $emailCompany,
                    'Email'        => $email,
                    'Taxation'     => $taxations['osn'],
                    'Items'        => balanceAmount($isShipping, $receiptItem, $amount),
                ];
                $params = [
                    'OrderId' => $transaction_api->id,
                    'Amount'  => $amount,
                    'DATA'    => [
                        'Email'           => $email,
                        'Connection_type' => 'example'
                    ],
                ];
            if ($enabledTaxation) {
                $params['Receipt'] = $receipt;
            }

            $api->init($params);
                if($api->Success){
                    $update=TransactionApi::where('id',$transaction_api->id)->update([
                        'paymentId'=>$api->PaymentId,
                        'status'=>$api->Status,

                    ]);


                    return response()->json(["url"=>$api->paymentUrl]);
                }

    // -----------------------------------------------------------


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
