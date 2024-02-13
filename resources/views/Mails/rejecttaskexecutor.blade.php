<!DOCTYPE html>
<html lang="en">
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-xs-12  mb-3">
                   <h3>{{__('message.dear_executor')}},</h3>
                   <p class="m-2">{{__('message.thank_you_for_your_response_to')}} "{{ $click_on_task }}", {{__('message.this_time_the_client_chose_the_right_specialist')}}</p>
                    <h5>{{__('message.sincerely')}}</h5>
                    <div  style="height:70px;width:300px;display:flex;align-items:center">
                        <img src="{{ $message->embed(public_path().'/images/logo_footer.png') }}" style="width:70px;display:block;">
                    </div>

                </div>
                <div style="margin-top:20px">
                    <button type="button" class="btn" style="background-color: #4B9A2D;border-radius:15px;padding:5px 8px; border:none;outline:none"><a
                     href="http://ligauslug.ru/"
                     href="{{ env('BASE_CLIENT_URL')}}/"
                      style="color:white;text-decoration:none"
                      >Перейти по ссылке</a>
                    </button></div>

            </div>
        </div>
    </body>
</html>

