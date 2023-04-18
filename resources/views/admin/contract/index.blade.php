@extends('layouts.admin_app')

@section('content')
<div class="container">
        <div class="row my-5">
            <div class="col-lg-8 margin-tb bg-white p-5 my-5">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                            Были некоторые проблемы с вашим вводом.<br><br>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                <p class="text-center">{{ $message }}</p>
                </div>
                @endif
                @if ($message = Session::get('message-danger'))
                <div class="alert alert-danger">
                <p class="text-center">{{ $message }}</p>
                </div>
                @endif

                <div class="pull-left">
                    <h3 class="my-3">Загрузить форму договора</h3>
                </div>
                <form role="form" method="POST" action="{{route('contract.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">


                        <input type="text" class="form-control "   name="description" value="">

                    </div>

                    <div class="form-group">

                        <label for="contract_path"><i class="fa fa-upload" style="font-size:48px;color:#3158c9"></i></label>
                        <input type="file" class="form-control d-none" id="contract_path"  name="contract_path" value="">

                    </div>


                    <button type="submit" class="btn btn-primary my-3">Загрузить</button>
                </form>


                @if (count($contract)<1)
                    <div>На данный момент формы договора нет</div>

                @else

                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Описание</th>
                            <th>Имя файла </th>
                            <th width="">Действие</th>
                        </tr>
                        @foreach($contract as $key=>$items)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$items->description}}</td>
                            <td><a href="{{('/admin/contract')}}/{{ $items->contract_path}}" target="_blank">{{ $items->contract_path}}</a></td>
                            <td>
                                <form role="form"  action="{{ route('contract.destroy',$items->id) }}"  method="POST" style="width:70%;margin:0 auto">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn my-2" style="background:#394a59;color:#fff"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>




                            {{-- <td>
                            <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Показывать</a>
                            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Редактировать</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Удалять', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td> --}}
                            @endforeach
                        </tr>
                    </table>
                @endif

                </div>
            </div>

    </div>
    <script>


   </script>

    @section('script')

    @endsection

@endsection
