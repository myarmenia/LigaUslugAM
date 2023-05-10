@extends('layouts.admin_app')


@section('content')
<div class="container">
<div class="row my-5">
    <div class="col-lg-12  my-5 margin-tb bg-white p-5">
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
                    <th scope="col">№</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Текст жалоб</th>

                    <th scope="col">Посмотрен</th>



                </tr>
                </thead>
                <tbody>
                    <tr>
                       <td>{{ $admin_disagree_price_notification_read->id }}</td>
                       <td scope = "col">{{ $admin_disagree_price_notification_read->data['employer_name'] }}</td>
                        <td scope = "col">{{ $admin_disagree_price_notification_read->data['text'] }}</td>

                        <td scope = "col">{{$admin_disagree_price_notification_read->read_at }}</td>
                    </tr>
                </tbody>
            </table>




        </div>
    </div>

</div>
@endsection
