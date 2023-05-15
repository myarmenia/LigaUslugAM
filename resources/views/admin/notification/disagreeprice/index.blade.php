@extends('layouts.admin_app')


@section('content')
<div class="container">
<div class="row my-5">
    <div class="col-lg-12 my-5 margin-tb bg-white p-5">
        <div class="pull-left my-3">
            <h2>Уведомление от Не согласна с ценой </h2>
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
                    <th scope="col">№ заказчика</th>
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
                @foreach($admin_disagree_price_notification as $key)


                    <tr>
                       <td>{{ $count++ }}</td>
                       <td>{{ $key->data['employer_id'] }}</td>
                       <td scope = "col">{{ $key->data['employer_name'] }}</td>
                        <td scope = "col">{{ $key->data['employer_email'] }}</td>
                        {{-- {{dd($key->data['problem_message_id'])}} --}}

                        {{-- <td><a  href = "{{ route('problem-message-show', [$key->id,$key->data['problem_message_id']] )}}"> Показать </a></td> --}}

                        <td><a  href = "{{ route('admin_disagree_price.show', $key->id )}}"> Показать </a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
