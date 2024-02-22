
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">


            <div class="row">

                <div class="col-sm-3 col-xs-12  mb-3">

                    <h3>Уважаемый(ая) пользователь</h3>
                    <p class="m-2">{{$supportfeedback->text}}</p>

                    <h5>С уважением</h5>
                    <div  style="height:70px;width:300px;display:flex;align-items:center">
                        <img src="{{ $message->embed(public_path().'/images/gorcka.png') }}" style="width:70px;display:block;">
                    </div>
                </div>

            </div>

        </div>
    </body>
</html>

