@extends('layouts.admin_app')


@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb bg-white p-5">
        <div class="pull-left my-3">
            <h2>Новые зарегистрированные пользователи</h2>
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
                    <th scope="col">Действие</th>
                </tr>
                </thead>
                <tbody>
                    @php
                        $count=1;
                    @endphp

                @foreach($notification as $key)

                    <tr>
                       <td>{{ $count++}}</td>
                        <td scope = "col">{{ $key->data['name'] }}</td>
                        <td scope="col">{{$key->data['email'] }}</td>
              
                        <td><a  href = "{{ route('notification.show', $key->id )}}"> Показать </a></td>

                            {{-- <form role="form"  action="{{ route('user.destroy',$items->id) }}"  method="POST" style="width:70%;margin:0 auto">
                                @csrf
                                @method('DELETE')
                                    <button type="submit" class="btn my-2" style="background:#394a59;color:#fff"><i class="fa fa-trash"></i></button>
                            </form> --}}

                    </tr>
                @endforeach
                </tbody>
            </table>



            {{-- {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Имя :</strong>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Эл. адрес:</strong>
                        {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Пароль:</strong>
                        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Подтвердить Пароль:</strong>
                        {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Роль :</strong>
                        {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Создать</button>
                </div>
            </div>
            {!! Form::close() !!} --}}
        </div>
    </div>

</div>
@endsection
