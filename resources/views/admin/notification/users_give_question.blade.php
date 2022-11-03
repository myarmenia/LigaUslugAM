@extends('layouts.admin_app')


@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb bg-white p-5">
        <div class="pull-left my-3">
            <h2>Вопросы, заданные пользователями</h2>
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
                    <th scope="col">Эл. адрес</th>
                    <th scope="col">Действие</th>
                </tr>
                </thead>
                <tbody>
                    @php
                        $count=1;
                    @endphp

                @foreach($users_give_question_notification as $key)

                    <tr>
                       <td>{{ $count++}}</td>
                        <td scope="col">{{$key->data['email'] }}</td>
                        <td><a  href = "{{ route('user-question.show', $key->id )}}">Показать</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

