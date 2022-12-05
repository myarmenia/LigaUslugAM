@extends('layouts.admin_app')


@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10 bg-white">
            <div class="panel-body justify-content-center my-5 p-2">

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
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach($errors->all() as $error)

                        <li>{{$error}}</li>

                    @endforeach
                    </ul>
                </div>
                @endif
                    <h3 class="my-5 font-weight-bold p-2" >Все письма</h3>
                    @if (count($all_letter)<1)
                        <div class="p-3 h4">На данный момент писем нет</div>
                @else

                <table class="table table-bordered table-striped" >
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        {{-- <th scope="col">User ID</th> --}}
                        <th scope="col">Имя исполнителя</th>
                        <th scope="col">Эл. адрес</th>
                        <th scope="col">Показать</th>
                        <th scope="col">Удалить</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($all_letter as $items)
                        <tr>
                            <td>{{ $items->id }}</td>
                            {{-- <td scope = "col">{{ $items->user_id  }}</td> --}}
                            <td scope = "col">{{ $items->users->name }}</td>
                            <td scope="col">{{$items->email }}</td>
                            <td class="text-center">
                                <a  href = "{{ route('letters.show', $items->id )}}">
                                    Показать
                                </a>
                            </td>

                            <td>
                                <form role="form"  action="{{ route('letters.destroy',$items->id) }}"  method="POST" style="width:70%;margin:0 auto">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn my-2" style="background:#394a59;color:#fff"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @endif
                <div class="pagination">
                    {{ $all_letter->links()}}
                </div>

            </div>
        </div>
    </div>
</div>

@endsection('content')
