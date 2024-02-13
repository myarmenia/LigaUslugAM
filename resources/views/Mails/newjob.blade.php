
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <img src="{{ $message->embed(public_path().'/images/logo_footer.png') }}" style="width:70px;display:block;">
             <div  style="height:70px;width:300px;display:flex;align-items:center">

                <span style="font-weight: bolder;font-size:20px;display:block;margin-top:10px">Лига услуг</span>
            </div>
            <p>{{__('message.You_are_the_first_to_see_these_orders_respond_quickly')}}</p>

            <div class="row">
                @foreach ($newjob as $item)
                <div class="col-sm-3 col-xs-12  mb-3">
                    <h3 class="fw-bolder"><a href=''  style="color:blue">{{$item->title}}</a></h3>
                    <p  style="font-weight: bolder;font-size:12px">{{ __('messape.the_price_is_negotiated')}}</p>
                    <p class="m-2">{{$item->task_description}}</p>
                    <p>{{__('message.interesting_hurry_up_with_your_response_now_the_order_is_available_to_a_limited_number_of_performers_but_in_an_hour_we_will_show_the_rest')}}</p>
                    <div><button type="button" class="btn" style="background-color: #4B9A2D;border-radius:15px;padding:7px 10px; border:none;outline:none"><a href="{{ env('BASE_CLIENT_URL')}}/order_about_page/{{$item->id}}" style="color:white;text-decoration:none">{{__('message.respond')}}</a></button></div>
                    </div>
                @endforeach
            </div>

        </div>
    </body>
</html>

