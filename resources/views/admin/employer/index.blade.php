
@extends('layouts.admin_app')


@section('content')
     <div class="container">
        <div class="row">
            <div class="panel-body justify-content-center my-5">

                @if(session()->has('message'))
                    <div class="alert alert-success text-center">
                        {{ session()->get('message') }}
                    </div>
                @endif
                @if(session()->has('message_error'))
                <div class="alert alert-danger text-center">
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
                    <h3 class="my-5 font-weight-bold">Все заказчики</h3>
                    <div>

                        <form  action="/employer/" method="get">
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <select name="filter_category" class="form-control">
                                        <option value="" >Фильтровать </option>
                                        <option value="employer_name_last_name" {{$session_filterCategory == 'employer_name_last_name'? 'selected' : null}}>По ФИ</option>
                                        <option value="employer_review_count"{{$session_filterCategory == 'employer_review_count'? 'selected' : null}} > По количество отзывов</option>
                                        <option value="phone_number" {{$session_filterCategory == 'phone_number'? 'selected' : null}} >По номер телефона</option>

                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="input_filter"  placeholder=" " value="{{ request()->input('input_filter') }}" >
                                </div>
                                <div class="form-group col-md-2 mx-3">
                                    <button type="submit" class="btn btn-success px-3">Фильтровать</button>
                                </div>


                            </div>

                        </form>

                    </div>
                <table class="table table-bordered table-striped" >
                    <thead>
                    <tr>
                        <th scope="col">№</th>
                        <th scope="col">User Id</th>
                        <th scope="col">Имя заказчика</th>
                        <th scope="col">Фамилия заказчика</th>
                        <th scope="col">Регион</th>
                        <th scope="col">Населённый пункт</th>
                        <th scope="col">Адрес</th>
                        <th scope="col">Эл. адрес</th>
                        <th scope="col">Телефонный номер</th>
                        <th scope="col">Количество отзывов</th>
                        <th scope="col"> Показать</th>
                      {{--  <th scope="col">Удалить</th> --}}
                    </tr>
                    </thead>
                    <tbody>
                        @if ($employer->total()==0)
                            <tr>
                                <th colspan=11 class="btn-success">
                                    По этим параметрам ничего не найдено
                                </th>
                            </tr>

                        @endif
                        {{-- {{dd($employer[0]->tasks)}} --}}

                    @foreach($employer as $items)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $items->id }}</td>
                            <td scope = "col">{{ $items->name }}</td>
                            <td scope = "col">{{ $items->last_name }}</td>
                            <td scope = "col">{{ $items->region }}</td>
                            <td scope = "col">{{ $items->country_name }}</td>
                            <td scope = "col">{{ $items->address }}</td>
                            <td scope = "col">{{ $items->email }}</td>
                            <td scope = "col">{{$items->phonenumber }}</td>
                            <td scope = "col">{{$items->employer_review_count }}</td>
                            <td><a  href = "{{ route('user.show', $items->id )}}">Показать </a></td>



                            {{-- <td>
                                <form role="form"  action="{{ route('user.destroy',$items->id) }}"  method="POST" style="width:70%;margin:0 auto">
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
                    {{$employer->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection('content')
