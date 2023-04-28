<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContractDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contract_document=Contract::all();
        // foreach($contract_document as $item){
        //     $item['contract_path']=Storage::path($item->contract_path);
        // }

        return response()->json(['message'=>$contract_document]);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendSms()
    {
        $data=array(
            "login"=>"cadastre",
            "password"=>"NY71kAc8",
            "Sender (Originator)"=> "E-cadastre",
            "form"=>"submit"

        );
        $ch = curl_init();
        $header = array();
        // $header[] = 'Content-length: 0';
        $header[] = 'Content-type: application/json';
        $posted_fild = array();
        // $posted_fild[]='messages:[{"recipient":"37498054449","priority":"2","sms":{"originator":"E-cadastre","content":{"text":"Тест .44 priority 2"}},"message-id":"201902280917"}]';
        $posted_fild[]='"login":"cadastre","password":"NY71kAc8","Sender (Originator)": "E-cadastre","messages":[{"recipient":"37498054449","priority":"2","sms":{"originator":"E-cadastre","content":{"text":"Тест .44 priority 2"}},"message-id":"201902280917"}]';
// dd($posted_fild);
        $k='{"login":"cadastre","password":"NY71kAc8","Sender (Originator)": "E-cadastre","messages":[{"recipient":"37498054449","priority":"2","sms":{"originator":"E-cadastre","content":{"text":"Тест .44 priority 2"}},"message-id":"201902280917"}]}';


        curl_setopt($ch, CURLOPT_URL, "https://sendsms.nikita.am/broker-api/send");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER,  $header);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        // загрузка страницы и выдача её браузеру
        curl_exec($ch);
        $rest = curl_exec($ch);
        if ($rest === false){
            print_r('Curl error: ' . curl_error($ch));
        }
        curl_close($ch);
        echo $rest;
            // $url = "https://www.javatpoint.com/";
            // $ch = curl_init();
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            // curl_setopt($ch, CURLOPT_URL, $url);
            // $res = curl_exec($ch);
            // echo $res;


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
