@extends('layouts.admin_app')

<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .scroll_section{
        height:200px;
        overflow-y:scroll;
    }
</style>

@section('content')
<div class="container">
    <div class="row d-flex my-5   justify-content-center ">
        <div class="col-md-8 my-5" >

            <table class="table table-bordered bg-white">
            <tbody>
                <tr>
                    <td colspan="3" class="text-center"><h3 class="font-weight-bolder">{{ $executor_profile->users->name }} {{ $executor_profile->users->last_name }}</h3></td>
                </tr>

            <tr>
                <td rowspan="6" style="height:200px;width:200px" >
                    @php
                        $k = $executor_profile->users->img_path != Null ? $executor_profile->users->img_path :  'avatar.png';
                    @endphp
                    <img src="{{  asset('admin/img/img_user')}}/{{$k}}"  style="height:200px;width:200px">
                </td>
                <td style="width:200px" >Дата рождения</td>
                <td>{{ $executor_profile->users->birth_date }}</td>
            </tr>
            <tr>
                <td style="width:200px" >Пол</td>
                <td>{{ $executor_profile->users->gender }}</td>
            </tr>
            <tr>
                <td style="width:200px" >Номер телефона</td>
                <td>{{ $executor_profile->users->phonenumber }}</td>
            </tr>
            <tr>
                <td style="width:200px" >Эл. адрес</td>
                <td>{{ $executor_profile->users->email }}</td>
            </tr>

            <tr>
                <td style="width:200px" >Регион</td>
                <td>{{ $executor_profile->region }}</td>
            </tr>
            <tr>
                <td style="width:200px" >Населенный пункт / Город</td>
                <td>{{ $executor_profile->country_name }}</td>
            </tr>

            <tr>
                <td style="width:200px" >Адрес</td>
                <td>{{ $executor_profile->address }}</td>
            </tr>
            <tr>
                <td style="width:200px" >Баланс</td>
                <td colspan=2>
                    <p class="font-weight-bolder">{{ $executor_profile->balance ?? 'Нету баланса'}}</p>

                </td>
            </tr>
            <tr>
                <td style="width:200px" >Ссылки на личные страницы</td>
                <td colspan=2>
                    <p>{{ $executor_profile->users->fasebook_link }}</p>
                    <p>{{ $executor_profile->users->instagram_link }}</p>
                </td>
            </tr>
            <tr>
                <td colspan=3><h4 class="font-weight-bold">Обо мне</h4></td>
            </tr>
            <tr>
                <td colspan=3>{{ $executor_profile->users->about_me}}</td>
            </tr>
            <tr>
                <td colspan=3><h4 class="font-weight-bold">Pегионы выезда к клиентам</h4></td>
            </tr>
            <tr>
              <td colspan=3>
                    @foreach ($executor_profile->executor_working_regions()->distinct('executorwork_region')->pluck('executorwork_region') as $items)
                                <p class="d-inline-block bg-light m-2 p-2 " >{{$items}}</p>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td colspan=3><h4 class="font-weight-bold">Районы выезда к клиентам</h4></td>
            </tr>
            <tr>
              <td colspan=3>

                    @foreach ($executor_profile->executor_working_regions as $items)
                                <p class="d-inline-block bg-light m-2 p-2 " >{{$items->working_rayon}}</p>
                    @endforeach



                </td>
            </tr>
            <tr>
                <td colspan=3><h4 class="font-weight-bold">Специальность и опыт</h4></td>
            </tr>
            <tr>
                <td>Категории услуг</td>
                <td colspan=2>
                    @foreach ($executor_profile->executor_categories as $items)
                            <p>{{$items->category_name}}</p>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>Подкатегории услуг</td>
                <td colspan=2 class="scroll_section">
                    @foreach ($executor_profile->executor_subcategories as $items)
                            <p>{{$items->subcategory_name}}</p>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td colspan=3><h4 class="font-weight-bold">Опыт работы</h4></td>
            </tr>
            <tr>
                <td>Рабочее место</td>
                <td colspan=2 class="scroll_section">
                  
                    @foreach ($executor_profile->executor_profile_work_experiences as $items)
                        <p>{{$items->working_place}}  от {{ date('d-m-Y', strtotime($items->created_at))}} до {{date('d-m-Y', strtotime($items->updated_at))}}</p>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td colspan=3><h4 class="font-weight-bold">Портфолио</h4></td>
            </tr>
            <tr>
                <td>Фотографии</td>
                <td colspan=2>
                    @foreach ($executor_profile->executor_portfolios as $items)
                            <img src="{{asset('admin/img/img_executor_portfolios')}}/{{ $items->portfolio_pic }}" class="mr-2" width="100px">
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>Ссылки</td>
                <td colspan=2>
                    @foreach ($executor_profile->executor_portfolio_links as $items)
                        <p>{{$items->portfolio_link}}</p>
                    @endforeach

                </td>
            </tr>
            <tr>
                <td colspan=3><h4 class="font-weight-bold">Образование и сертификаты</h4></td>
            </tr>
            <tr>
                <td>Образование</td>
                <td colspan=2>
                    @foreach ($executor_profile->executor_educations as $items)

                    <p> {{ $items->education_type }}</p>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>Образовательное учереждение</td>
                <td colspan=2>
                    @foreach ($executor_profile->executor_educations as $items)

                    <p>  {{ $items->education_place }}</p>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>Сертификаты</td>
                <td colspan=2>
                    @foreach ($executor_profile->executor_education_certificates as $items)

                    <img src="{{asset('admin/img/img_executor_certificate')}}/{{$items->certificate }}"  class="mr-2" width="100px">
                    @endforeach
                </td>
            </tr>

            <tr>
                <td colspan=3><h4 class="font-weight-bold">Отзывы клиентов</h4></td>
            </tr>

            @foreach ($rating as $items)
                <tr>
                    <td colspan="3">
                        <div class="d-flex">
                            <div><img src="{{ asset('admin/img/img_user')}}/{{ $items->users->img_path }} " style="height:150px;width:150px"></div>
                            <div class="ml-3">
                                <p>{{$items->users->name}}</p>
                                <p>
                                    @php
                                        $count=$items->employer_star_count_to_executor;
                                        for($i=0;$i<$count;$i++){
                                            echo "<i class='fa fa-star' style='color:orange'></i>";
                                        }
                                    @endphp

                                </p>

                            </div>
                        </div>
                        <div>{{ $items->employer_review_to_executor }}</div>
                    </td>

                <tr>
            @endforeach
            </tbody>
            </table>
        </div>
        <div class="col-md-2">
            <form>
                @csrf
                <div class="form-group">
                    <label for="status">Status:</label>

                    <span class="error-text email_err  {{$executor_profile->users->status=='Актив' ? 'text-success' : 'text-danger'}}" data-id="{{ $executor_profile->users->id }}"  data-status =" {{$executor_profile->users->status=="Актив" ? "Пасив" : "Актив"}}" id = "status"> {{ $executor_profile->users->status }}</span>
                </div>
                <button  class="btn btn-primary btn-submit" id="change_status">{{$executor_profile->users->status=="Актив"?"Пасив":"Актив"}}

                </button>
            </form>
    </div>
</div>
<script>
    $(".btn-submit").click(function(e){
                e.preventDefault();


                var status = $("#status").attr('data-status');
                var id=$("#status").attr('data-id');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
            });

                $.ajax({
                    url: "{{ route('ajax.request.store') }}",
                    type:'POST',
                    data: {status,id},
                    success: function(data) {
                        $('#status').html(data);
                        $('#status').toggleClass("text-success")
                        $('#status').toggleClass("text-danger")
                        if(data == "Актив"){

                            $('#change_status').html("Пасив")
                            $('#status').attr('data-status',"Пасив")

                        }else{

                            $('#change_status').html("Актив")
                            $('#status').attr('data-status',"Актив")
                        }
                        console.log(data)
                    }
                });
    })



</script>

@endsection('content')

