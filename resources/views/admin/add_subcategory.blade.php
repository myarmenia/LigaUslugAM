@extends('layouts.admin_app')


@section('content')

 <div class="row justify-content-center mt-5 w-100">
        <div class="col-lg-6 mt-5" >
            <div class="panel-body">
                <div class="card mx-4 bg-whight">
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
                        <form role="form" method="POST" action="{{route('subcategory.store')}}" enctype="multipart/form-data"  style="width:70%;margin:0 auto">
                            @csrf

                            <div class="form-group my-5">
                                <label for="tema_id"><h4 class="font-weight-bold my-2"> Виберите название категорию </h4></label>
                                    <select name="category_id" id="tema_id" class="form-control p-2">
                                    <optgroup label="Виберите название категории">
                                        @foreach($category as $k=>$v)

                                            <option value="{{$k}}">{{$v }}</option>

                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                            <div class="form-group px-2">
                                <label for="tema_name"><h4 class="font-weight-bold my-2">Название подкатегории</h4></label>
                                <textarea type=text   class="form-control" id="subcategory_name"  name="subcategory_name" cols="20" value="{{ old('sabcategory_name') }}"></textarea>
                                <input type="hidden" value="0" name="status">
                            </div>
                            <div class="form-group px-2">
                                <label for="subcategory_name_price"><h4 class="font-weight-bold my-2">Стоимость подкатегории</h4></label>
                                <input type=text   class="form-control" id="subcategory_name_price"  name="subcategory_name_price" cols="20" value="{{ old('subcategory_name_price') }}">
                                <input type="hidden" value="0" name="status">
                            </div>


                                 <button type="submit" class="btn my-2" style="background:#394a59;color:#fff">Сохранить</button>

                        </form>
                  </div>

                </div>
            </div>
      </div>
    </div>

@endsection('content')
