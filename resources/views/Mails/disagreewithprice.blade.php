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
                    <h3>Уважаемый(ая) {{ $disagreewithprice->tasks->executor_profiles->users->name.' '.$disagreewithprice->tasks->executor_profiles->users->last_name }} </h3>
                    <h4>Название заказа:{{$disagreewithprice->tasks->title}}</h4>
                    <p class="m-2">{{$disagreewithprice->problem_description}}</p>
                    <h5>С уважением</h5>
                    <div  style="height:70px;width:300px;display:flex;align-items:center">
                        <img src="{{ $message->embed(public_path().'/images/logo_footer.png') }}" style="width:70px;display:block;">
                    </div>
                </div>
                <div style="margin-top:20px"><button type="button" class="btn" style="background-color: #4B9A2D;border-radius:15px;padding:5px 8px; border:none;outline:none"><a href="http://ligauslug.ru/" style="color:white;text-decoration:none">Перейти по ссылке</a></button></div>
            </div>
        </div>
    </body>
</html>
