@extends('layouts.admin_app')




<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
<div class="container-fluid">
    <div class="row my-5 justify-content-center ">
        <div class="col-md-6 my-5 p-2  bg-white">
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

                <h3 class="m-5 py-3">{{$show_special_message->tasks->users->name}}</h3>
                <div class="p-3 bg-white">{{$show_special_message->problem_description}}</div>

                <form method = "Post" action="{{route('sopport-feedback-problem-message')}}" class="my-5" >
                    @csrf

                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Отправить ответ пользователю</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name='text'></textarea>
                    </div>
                    <input type = "hidden" value = "{{ $show_special_message->user_id }}" name = "user_id">
                    <input type = "hidden" value = "{{ $show_special_message->id }}" name = "problem_message_id">
                    <button type="submit" class = "btn my-2" style = "background:#3158c9;color:#fff">Отправлять</button>
                </form>

        </div>



    </div>
</div>

@endsection('content')

