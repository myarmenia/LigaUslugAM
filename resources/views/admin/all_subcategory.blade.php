@extends('layouts.admin_app')


@section('content')
<section id="main-content">
    <section class="wrapper ">
      <!--overview start-->
      <div class="row justify-content-center">
        <div class="col-lg-6 bg-white" >
            <div class="panel-body mx-5 ">

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
                    <h3 class="my-5">Все подкатегории</h3>
                <table class="table table-bordered table-striped" >
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Название категории</th>
                        <th scope="col">Название подкатегории</th>
                        <th scope="col">Цена отклика</th>
                        <th scope="col" colspan=2 class='text-center'> Редактировать</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach( $all_subcategory as $items)
                        <tr>
                            <td>{{ $items->id }}</td>
                            <td>{!! $items->categories->category_name!!}</td>
                            <td>{!! $items->subcategory_name !!}</td>
                            <td>{!! $items->price !!}</td>
                            <td class="text-center"> <a href="{{ route ('subcategory.edit',$items->id) }}" class="btn btn-info btn-sm float-left mr-1"><i class="fa fa-edit"></i></a></td>
                            <td>
                                <form role="form"  action="{{ route('subcategory.destroy',$items->id) }}"  method="POST" style="width:70%;margin:0 auto">
                                    @csrf
                                     @method('DELETE')
                                        <button type="submit" class="btn" style="background:#394a59;color:#fff"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="pagination">
                    {{ $all_subcategory->links()}}
                </div>

            </div>



      </div>
      </div>
    </section>

  </section>

@endsection('content')
