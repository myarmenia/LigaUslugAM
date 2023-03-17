@extends('layouts.admin_app')


@section('content')
<div class="container">
    <div class="row my-5 justify-content-center " >
        <div class="col-lg-12 ">
            <div class="panel-body justify-content-center my-5 p-2 ">

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
                    <h3 class="my-5 font-weight-bold">Все исполнители</h3>
                    <div>

                        <form  action="/executor/" method="get">
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <select id="task_status"  name="filter_category"  class="form-control">
                                        @if ($session_filterCategory=='rating')
                                            <option value="rating" selected> По рейтингу</option>
                                            <option value="" >фильтровать </option>
                                            <option value="region" >По региону</option>
                                            <option value="phone_number" >По номер телефона</option>
                                            <option value="executor_name" >По ФИ</option>

                                        @elseif($session_filterCategory=='region')
                                            <option value="region"  selected>По региону</option>
                                            <option value="" >фильтровать </option>
                                            <option value="rating" > По рейтингу</option>
                                            <option value="phone_number" >По номер телефона</option>
                                            <option value="executor_name" >По ФИ</option>

                                        @elseif($session_filterCategory=='phone_number')
                                            <option value="phone_number" selected >По номер телефона</option>
                                            <option value="" >фильтровать </option>
                                            <option value="rating" > По рейтингу</option>
                                            <option value="region" >По региону</option>
                                            <option value="executor_name" >По ФИ</option>

                                        @elseif($session_filterCategory=='executor_name')
                                            <option value="executor_name" selected >По ФИ</option>
                                            <option value="" >фильтровать </option>
                                            <option value="rating" > По рейтингу</option>
                                            <option value="region" >По региону</option>
                                            <option value="phone_number" >По номер телефона</option>

                                        @else

                                            <option value="" >фильтровать </option>
                                            <option value="rating" > По рейтингу</option>
                                            <option value="region" >По региону</option>
                                            <option value="phone_number" >По номер телефона</option>
                                            <option value="executor_name" >По ФИ</option>

                                        @endif

                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" name="executor_filter"  placeholder=" " value="{{ request()->input('executor_filter') }}" >
                                </div>


                                <div class="form-group col-md-2 mx-3">
                                    <button  type="submit" class="btn btn-success px-3">Фильтровать</button>
                                </div>


                            </div>

                        </form>

                    </div>
                    @if (count($all_executor)<1)
                        <div class="p-3 h4">На данный момент исполнителей нет</div>
                    @else
                        <table class="table table-bordered table-striped" >
                            <thead>
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col">User Id</th>
                                <th scope="col">Имя исполнителя</th>
                                <th scope="col">Фамилия исполнителя</th>
                                <th scope="col">Эл. адрес</th>
                                <th scope="col" class="text-center">Oбщий рейтинг</th>
                                <th scope="col" class="text-center">Kоличество отзывов исполнителя</th>
                                <th scope="col" class="text-center">Область</th>
                                <th scope="col" class="text-center">Адрес</th>
                                <th scope="col" class="text-center"> Процент заполнение акаунта</th>
                                <th scope="col">Показать отдельную страницу исполнителя</th>
                                {{-- <th scope="col">Удалить</th> --}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($all_executor as $items)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td scope = "col">{{ $items->user_id  }}</td>
                                    <td scope = "col">{{ $items->users->name }}</td>
                                    <td scope = "col">{{ $items->users->last_name }}</td>
                                    <td scope="col">{{$items->users->email }}</td>
                                    <td scope="col" class="text-center">{{ $items->total_reiting }}</td>
                                    <td scope="col" class="text-center">{{ $items->	executor_review_count }}</td>
                                    <td scope="col" class="text-center">{{ $items->region }}</td>
                                    <td scope="col" class="text-center">{{ $items->address }}</td>
                                    <td scope="col" class="text-center"> {{ $items->profile_persent }}</td>
                                    <td class="text-center">
                                        <a  href = "{{ route('executor.show', $items->id )}}">
                                            Показать
                                        </a>
                                    </td>

                                    {{-- <td>
                                        <form role="form"  action="{{ route('task.destroy',$items->id) }}"  method="POST" style="width:70%;margin:0 auto">
                                            @csrf
                                            @method('DELETE')
                                                <button type="submit" class="btn my-2" style="background:#394a59;color:#fff"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td> --}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="pagination">
                            {{ $all_executor->links()}}
                        </div>
                @endif

            </div>
        </div>
    </div>
</div>

@endsection('content')
