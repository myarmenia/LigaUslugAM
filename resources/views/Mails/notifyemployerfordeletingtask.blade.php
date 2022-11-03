
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
            <p>Уважаемый(ая) {{$deletetask->users->name }} {{$deletetask->users->last_name }} , ваша задача будет удалена, так как никто не откликнулся на заказ "{{$deletetask->title }}"  №{{$deletetask->id}}!</p>
        </div>
    </body>
</html>

