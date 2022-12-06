@extends('layouts.admin_app')


@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb bg-white p-5">
        <div class="pull-left my-3">
            <h2>Уведомление об обратном звонке</h2>
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
                    <th scope="col">Номер телефона</th>
                    <th scope="col">Выбранный день</th>
                    <th scope="col">Выбранное время</th>
                </tr>
                </thead>
                <tbody>
                    @php
                        $count=1;
                    @endphp
                @foreach($callbacknotification as $key)

                    <tr>
                       <td>{{ $count++ }}</td>
                       <td scope = "col">{{ $key->data['name'] }}</td>
                        <td scope = "col">{{ $key->data['phone_number'] }}</td>
                        <td scope="col">{{$key->data['selected_date'] }}</td>
                        <td scope="col">{{$key->data['selected_time'] }}</td>
                        {{-- <td scope="col">{{$key->read_at }}</td> --}}
                        <td><a  href = "{{ route('callback.show', $key->id )}}"> Показать </a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
