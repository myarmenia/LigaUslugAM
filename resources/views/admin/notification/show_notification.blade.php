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
                    <th scope="col">Имя исполнителя</th>
                    <th scope="col">Эл. адрес</th>
                    <th scope="col">Посмотрен</th>

                    {{-- <th scope="col" class="text-center"> Ссылки на личные страницы</th> --}}
                    {{-- <th scope="col"> Показать</th> --}}

                </tr>
                </thead>
                <tbody>



                    <tr>
                       <td>{{ $notification_read->id }}</td>
                        <td scope = "col">{{ $notification_read->data['name'] }}</td>
                        <td scope="col">{{$notification_read->data['email'] }}</td>
                        <td scope="col">{{$notification_read->read_at }}</td>
                    </tr>

                </tbody>
            </table>




        </div>
    </div>

</div>
@endsection
