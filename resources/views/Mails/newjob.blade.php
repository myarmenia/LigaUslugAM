
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div  style="height:70px;width:300px;display:flex;align-items:center">
                <img src="{{ $message->embed(public_path().'/images/logo_footer.png') }}" style="width:70px;display:block;">
                <span style="font-weight: bolder;font-size:20px;display:block;margin-top:10px">Лига услуг</span>
            </div>
            <p>Вы первый, кто увидит эти заказы - откликайтесь скорее!</p>

            <div class="row">
                @foreach ($newjob as $item)
                <div class="col-sm-3 col-xs-12  mb-3">
                    <h3 class="fw-bolder"><a href=''  style="color:blue">{{$item->title}}</a></h3>
                    <p  style="font-weight: bolder;font-size:12px">Цена договорная</p>
                    <p class="m-2">{{$item->task_description}}</p>
                    <p>Интересно? Поторопитесь с откликом - сейчас заказ доступен ограниченному  числу исполнителей, но уже через час мы покажем  остальными.</p>
                    <div><button type="button" class="btn" style="background-color: #4B9A2D;border-radius:15px;padding:5px 8px; border:none;outline:none"><a href="http://ligauslug.ru/order_about_page/{{$item->id}}" style="color:white;text-decoration:none">Откликнуться</a></button></div>


                    </div>
                @endforeach
            </div>

        </div>
    </body>
</html>

