@extends('layouts.admin_app')
@section('style')
<style>
    .more{
        display:none;
    }
</style>

@endsection





<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
<div class="container-fluid ">
    <div class="row d-flex justify-content-center my-5 pt-5" style="min-height:750px">
        <div class="col-md-8" >

            <table class="table table-bordered bg-white">
            <tbody>
                <tr>
                    <td colspan="3" class="text-center"><h3 class="font-weight-bolder">{{ $show_user_profile->name }} {{ $show_user_profile->last_name }}</h3></td>
                </tr>

            <tr>
                <td rowspan="5" style="height:200px;width:200px" ><img src="{{asset('admin/img/img_user')}}/{{ $show_user_profile->img_path}}" style="height:200px;width:200px"></td>
                <td style="width:200px" >Дата рождения</td>
                <td>{{ $show_user_profile->birth_date }}</td>
            </tr>
            <tr>
                <td style="width:200px" >Пол</td>
                <td>{{ $show_user_profile->gender }}</td>
            </tr>
            <tr>
                <td style="width:200px" >Эл. адрес</td>
                <td>{{ $show_user_profile->email }}</td>
            </tr>
            <tr>
                <td style="width:200px" >Телефонный номер</td>
                <td>{{ $show_user_profile->phonenumber }}</td>
            </tr>
            <tr>
                <td style="width:200px" >Ссылки на личные страницы</td>
                <td>
                    <p>{{ $show_user_profile->fasebook_link }}</p>
                    <p>{{ $show_user_profile->instagram_link }}</p>
                </td>
            </tr>



            </tbody>
            </table>
             @if ($show_user_profile->tasks!=null)
                <h3 class="mt-5 ">Заказы</h3>

                @foreach ($show_user_profile->tasks as $key=>$item)

                    @if($key<2)
                        <p><a href="{{route('task.show',$item->id )}}">{{$item->title}}</a></p>
                    @elseif($key==2)
                        <p><a href="{{route('task.show',$item->id )}}">{{$item->title}}</a><span id="dots">.....</span> </p>


                    @else

                        <p class="more"><a href="{{route('task.show',$item->id )}}">{{$item->title}}</a></p>

                    @endif
                @endforeach
                <button class="btn btn-info" onclick="myFunction()" id="myBtn" >Смотреть больше</button>


            @endif

        </div>



</div>
<script>
    function myFunction() {
      let dots = document.getElementById("dots");
      let moreText = document.querySelectorAll(".more");
      console.log(moreText)
      let btnText = document.getElementById("myBtn");


      if (btnText.innerHTML !== "Смотреть больше") {
        dots.style.display = "inline";
        btnText.innerHTML = "Смотреть больше";
        for (const el of moreText) {
            el.style.display="none"
        }

        // moreText.style.display = "none";

      }
      else{
        dots.style.display = "none";
        btnText.innerHTML = "Свернуть";
        for (const el of moreText) {
            el.style.display="block"
        }

      }
    }
    </script>


@endsection('content')

