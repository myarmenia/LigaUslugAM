@extends('layouts.admin_app')


@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb bg-white p-5">
        <div class="pull-left my-3">
            <h2>Уведомление</h2>
        </div>




            @if (count($errors) > 0)
            <div class="alert alert-danger">
                 Были некоторые проблемы с вашим входом.<br><br>
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
            @endif
             <table class="table table-bordered table-striped" >
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Обратный номер телефона</th>
                    <th scope="col">Выбранный день</th>
                    <th scope="col">Выбранное время</th>
                    <th scope="col">Посмотрен</th>

                    {{-- <th scope="col" class="text-center"> Ссылки на личные страницы</th> --}}
                    {{-- <th scope="col"> Показать</th> --}}

                </tr>
                </thead>
                <tbody>



                    <tr>
                       <td>{{ $callbacknotification_read->id }}</td>
                       <td scope = "col">{{ $callbacknotification_read->data['name'] }}</td>
                        <td scope = "col">{{ $callbacknotification_read->data['phone_number'] }}</td>
                        <td scope = "col">{{$callbacknotification_read->data['selected_date'] }}</td>
                        <td scope = "col">{{$callbacknotification_read->data['selected_time'] }}</td>
                        <td scope = "col">{{$callbacknotification_read->read_at }}</td>

                    </tr>

                </tbody>
            </table>




        </div>
    </div>

</div>
@endsection
