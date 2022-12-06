@extends('layouts.admin_app')


@section('content')
<section id="main-content">
    <section class="wrapper">
      <!--overview start-->
      <div class="row  my-5 justify-content-center">
        <div class="col-lg-5 my-5 bg-white">
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
                    @if (count($task)<1)
                        <div class="p-3"> На данный момент нет задач․</div>
                    @else


                    <table class="table table-bordered table-striped" >
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
                        </tbody>
                    </table>

                    <div class="pagination">
                        {{ $task->links()}}
                    </div>
                 @endif
            </div>


        </div>
      </div>

    </section>

  </section>

@endsection('content')
