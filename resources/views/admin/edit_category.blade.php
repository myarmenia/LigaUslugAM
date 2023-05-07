@extends('layouts.admin_app')


@section('content')

<div class="row justify-content-center h-100">
    <div class="col-lg-8 my-5" >
        <div class="panel-body  my-5">
            <div class="card" style="background:#fff">
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

                <form role="form"  action="{{ route('category.update',$show_special_category->id) }}"  method="POST" style="width:70%;margin:0 auto">
                    @csrf
                     @method('PUT')
                    <div class="form-group px-2">
                        <label for="tema_name"><h3 class="font-weight-bold my-3">Редактировать категорию</h3></label>
                        <textarea type=text   class="form-control" id="{{ $show_special_category->id }}"  name="category_name" cols="20"> {{ $show_special_category->category_name }} </textarea>
                        <input type="hidden" value="0" name="status">
                    </div>
                    <button type="submit" class="btn my-2" style="background:#3158c9;color:#fff">Сохранить</button>

                </form>
          </div>


        </div>
  </div>
</div>









@endsection('content')
