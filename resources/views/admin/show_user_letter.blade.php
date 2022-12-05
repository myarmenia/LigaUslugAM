@extends('layouts.admin_app')




<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
<div class="container">
    <div class="row  justify-content-center ">
        <div class="col-md-6 bg-white">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            @if(session()->has('message_error'))
                <div class="alert alert-danger">
                    {{ session()->get('message_error') }}
                </div>
            @endif
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

                <h3 class="p-2 py-3">{{$show_user_letter->users->name}}</h3>
                <div class="p-3 bg-white">{{$show_user_letter->text}}</div>

                <form method = "Post" action="{{route('supportfeedback.store')}}" class="my-5" >
                    @csrf

                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Отправить ответ пользователю</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name='suportfeedback'></textarea>
                    </div>
                    <input type = "hidden" value = "{{ $show_user_letter->user_id }}" name = "user_id">
                    <button type="submit" class = "btn my-2" style = "background:#3158c9;color:#fff">Отправлять</button>
                </form>

        </div>



    </div>
</div>

@endsection('content')

