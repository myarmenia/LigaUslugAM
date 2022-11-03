@extends('layouts.admin_app')




<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
<div class="container-fluid">
    <div class="row d-flex justify-content-center ">
        <div class="col-md-8"  style="height:760px">
       
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


            {{-- <tr>
                <td colspan=3><h4 class="font-weight-bold">Районы выезда к клиентам</h4></td>
            </tr>
            <tr>
              <td colspan=3>
                    @foreach ($executor_profile->executor_working_regions as $items)
                                <p>{{$items->executorwork_region}}</p>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td colspan=3><h4 class="font-weight-bold">Специальность и опыт</h4></td>
            </tr>



            @foreach ($executor_profile->executor_working_regions as $items)
                    <tr>
                        <td>Рабочее место</td>
                        <td colspan=2>{{$items->executorwork_region}}  от {{ date('d-m-Y', strtotime($items->created_at))}} до {{date('d-m-Y', strtotime($items->updated_at))}}</td>
                    </tr>
            @endforeach







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
            @endforeach--}}
            </tbody>
            </table>
        </div>

</div>

@endsection('content')

