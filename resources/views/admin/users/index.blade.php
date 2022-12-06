@extends('layouts.admin_app')


@section('content')
<div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb my-3  p-5">
                <div class="pull-left">
                    <h2 class="font-weight-bold my-3  pt-3">Пользователи с ролями</h2>
                </div>
                <div class="pull-right my-2">
                    <a class="btn btn-success" href="{{ route('users.create') }}">Создать нового пользователя с  ролью </a>
                </div>



                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                <p>{{ $message }}</p>
                </div>
                @endif


                    <table class="table table-bordered">
                    <tr>
                    <th>No</th>
                    <th>Имя пользователя</th>
                    <th>	Эл. адрес</th>
                    <th>Роль</th>
                    <th width="">Действие</th>
                    </tr>
                    @foreach ($data as $key => $user)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                        @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                            @endforeach
                        @endif
                        </td>
                        <td>
                        <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Показывать</a>
                        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Редактировать</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Удалять', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                    </table>


                    {!! $data->render() !!}
                </div>
            </div>

    </div>
@endsection
