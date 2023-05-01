@extends('layouts.admin_app')


@section('content')
    <section id="main-content"  class="container" style="border:1px solid red;margin-top:100px;margin-bottom:100px">
    <section class="mt-5">
      <!--overview start-->
      <div class="row  justify-content-center">
        <div class="col-lg-12 col-md-12 bg-white">
            <div class="panel-body m-4">

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
                    <h3 class="my-5">Все Заказы</h3>

                    <div>
                        <form  action="/task/" method="get">
                            <div class="form-row">


                                <div class="form-group col-md-4">

                                    <input type="text" class="form-control" name="searchtask_name"  placeholder="Поиск по названию заказа" value="{{ request()->input('searchtask_name') }}" id="searchtask_name">

                                </div>

                                <div class="form-group col-md-4">

                                    <select  class="form-control" name='category_name' id="category_name" >
                                        <option  value=''>Категории заказа</option>

                                            @foreach ($category as $item)
                                                @if ($session_categoryName && $session_categoryName==$item->category_name)
                                                    <option  selected value="{{ $item->category_name }}" >{{ $item->category_name }}</option>
                                                @else
                                                    <option value="{{ $item->category_name }}" >{{ $item->category_name }}</option>
                                                @endif
                                            @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <select id="task_status" name="task_status"  class="form-control" value="{{ request()->input('task_status') }}">
                                        <option value=''>Статус заказа</option>
                                        <option value="not confirmed">Не подтверждён специальный заказ</option>
                                        <option value="false">Не выбран</option>
                                        <option value="inprocess">В процессе</option>
                                        <option value="finished">Завершён</option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group d-flex justify-content-around  align-items-center col-md-8"  style="height:80px">
                                    <label class="form-group font-weight-bold" > Период заказа </label><br>
                                    <label class="form-group font-weight-bold" for=""> От </label><input type='date' class="form-control w-25" name="date_from" id="date_from" value="{{ request()->input('date_from') }}"><br>
                                    <label class="form-group font-weight-bold" for=""> До </label><input type='date' class="form-control w-25" name="date_to" id="date_to" value="{{ request()->input('date_to') }}"><br>
                                    <button  type="submit" class="btn btn-success px-3">Фильтровать</button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <table class="table table-bordered table-striped"  style="border:1px solid green">
                        <thead>
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col">Название заказа</th>

                                <th scope="col" class="text-center">Показать заказ </th>

                                <th scope="col">Удалить</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $task as $items)
                                    <tr>
                                        <td>{{ $items->id }}</td>
                                        <td>{{ $items->id}}</td>
                                        <td class="text-center">
                                            <a  href ="{{ route('task.show', $items->id )}}">Показать</a>
                                        </td>

                                        <td>
                                            <form role="form"  action="{{ route('task.destroy',$items->id) }}"  method="POST" style="width:70%;margin:0 auto">
                                                @csrf
                                                @method('DELETE')
                                                    <button type="submit" class="btn my-2" style="background:#394a59;color:#fff"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            {{-- @if ($task->total()==0)
                                <tr>
                                    <th colspan=4 class="btn-success">
                                        По этим параметрам ничего не найдено
                                    </th>
                                </tr>
                            @else
                                @foreach( $task as $items)
                                    <tr>
                                        <td>{{ $items->id }}</td>
                                        <td>{!! $items->title !!}</td>
                                        <td class="text-center">
                                            <a  href = "{{ route('task.show', $items->id )}}">
                                                Показать
                                            </a>
                                        </td>

                                        <td>
                                            <form role="form"  action="{{ route('task.destroy',$items->id) }}"  method="POST" style="width:70%;margin:0 auto">
                                                @csrf
                                                @method('DELETE')
                                                    <button type="submit" class="btn my-2" style="background:#394a59;color:#fff"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif --}}
                        </tbody>

                    </table>

                    <div class="pagination">
                        {{ $task->links()}}
                    </div>

            </div>
        </div>
      </div>

    </section>

  </section>


    <script src="{{asset('/admin/js/back/tasks/all_task.js')}}"></script>


@endsection('content')
