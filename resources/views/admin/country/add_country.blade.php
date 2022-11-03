@extends('layouts.admin_app')


@section('content')

 <div class="row  ">
        <div class="col-lg-8" >
            <div class="panel-body">
                <div class="card mx-4" style="background:#fff">
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
                        <form role="form" method="POST" action="{{route('country.store')}}" enctype="multipart/form-data"  style="width:70%;margin:0 auto">
                            @csrf
                            <div class="form-group my-5">
                                <label for="tema_id"><h4 class="font-weight-bold my-2">Выберите регион</h4></label>
                                    <select name="region_id" id="tema_id" class="form-control p-2">
                                    <optgroup label="Выберите регион">
                                        @foreach ($regions as $item)
                                            <option value="{{$item->id }}" >{{$item->region }}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                            <div class="form-group px-2">
                                <label for="tema_name"><h4 class="font-weight-bold my-2">Название населенного пункта</h4></label>
                                <textarea type=text   class="form-control" id="subcategory_name"  name="country_name" cols="20" value="{{ old('country_name') }}"></textarea>
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
