@extends('layouts.admin_app')


@section('content')
<div class="container">
<div class="row my-5">
    <div class="col-lg-12 my-5 margin-tb bg-white p-5">
        <div class="pull-left my-3">
            <h2>Уведомление от служба поддержки </h2>
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
                    <th scope="col">Имя заказчика</th>
                    <th scope="col">Эл. адрес</th>
                    {{-- <th scope="col">жалоба</th> --}}
                    {{-- <th scope="col">Выбранный день</th>
                    <th scope="col">Выбранное время</th> --}}
                </tr>
                </thead>
                <tbody>
                    @php
                        $count=1;
                    @endphp
                @foreach($admin_support_feedback as $key)
                {{-- "id" => $user->id,
                "name"=>$user->name ,
                "last_name"=>$user->last_name,
                "email"=>$user->email,
                "text" => $this->insert_message->text, --}}


                    <tr>
                       <td>{{ $count++ }}</td>

                       <td scope = "col">{{ $key->data['name'].' '.$key->data['last_name'] }}</td>
                        <td scope = "col">{{ $key->data['email'] }}</td>
                        {{-- <td scope = "col">{{ $key->data['text'] }}</td> --}}

                        <td><a  href = "{{ route('admin_support_feedback.show', $key->id )}}"> Показать </a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
