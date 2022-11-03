@extends('layouts.admin_app')


@section('content')

<div class="row  justify-content-center">
    <div class="col-lg-8" >
        <div class="panel-body">
            <div class="card px-5" style="background:#fff">
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

                    <form role="form"  action="{{ route('subcategory.update',$show_subcategory->id) }}"  method="POST">
                        @csrf
                         @method('PUT')
                        <div class="form-group px-2">
                            <div class="form-group">
                                <label for="category_name"><h4 class="font-weight-bold my-3">Название категории</h4></label>
                                <div>{{ $show_subcategory->categories->category_name }}</div>
                            </div>
                        </div>
                        <div class="form-group px-2">
                            <label for="subcategory_name"><h4 class="font-weight-bold my-2">Редактировать подкатегорию</h4></label>
                            <textarea type=text   class="form-control" id="{{ $show_subcategory->subcategory_name }}"  name="subcategory_name" cols="20"> {{ $show_subcategory->subcategory_name }} </textarea>
                            <input type="hidden" value="0" name="status">
                        </div>
                        <div class="form-group px-2">
                            <label for="subcategory_pricе"><h4 class="font-weight-bold my-2">Цена отклика</h4></label>
                            <input type="text" class="form-control" name="subcategory_price" value="{{ $show_subcategory->price }}">

                        </div>

                        <button type="submit" class="btn my-2" style="background:#3158c9;color:#fff">Сохранить</button>
                    </form>
              </div>


        </div>
  </div>
</div>


@endsection('content')
