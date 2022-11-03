@extends('layouts.admin_app')


@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb bg-white p-5">
        <div class="pull-left my-3">
            <h2>Вопрос пользователя</h2>
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
                    <th scope="col">{{ $notification_read->data['email'] }}</th>

                </tr>
                </thead>
                <tbody>


                    <tr>
                        <td scope = "col">{{ $notification_read->data['message'] }}</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
