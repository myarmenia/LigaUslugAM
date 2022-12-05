@extends('layouts.admin_app')


@section('content')

 <section id="main-content">
    <section class="wrappe">
      <!--overview start-->
     <div class="row justify-content-center mt-5">
        <div class="col-lg-6 bg-white mt-5" >
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
                <h3 class="font-weight-bold my-3">Все категории</h3>
            <table class="table table-bordered table-striped" >
                <thead>
                <tr>
                    <th scope="col" style="width:100px">ID</th>
                    <th scope="col" style="width:250px">Название категории</th>

                    <th scope="col" class= "text-center" colspan=2>Редактировать</th>

                </tr>
                </thead>
                <tbody>
                @foreach( $all_category as $items)
                    <tr>
                        <td>{{ $items->id }}</td>
                        <td style="width:100px">{!! $items->category_name !!}</td>

                        <td style="width:100px" class="text-center"> <a href="{{ route ('category.edit',$items->id) }}" class="btn btn-info btn-sm mr-1 "><i class="fa fa-edit"></i></a></td>
                        {{-- <td>
                            <form role="form"  action="{{ route('category.destroy',$items->id) }}"  method="POST" style="width:70%;margin:0 auto">
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
                {{ $all_category->links()}}
            </div>
    </div>
      </div>
    </section>

  </section>


@endsection('content')
