@extends('layouts.admin_app')


@section('content')
{{-- <link href="{{ asset( 'admin/css/bootstrap-theme.css') }}" rel="stylesheet"> --}}

 <!-- page start-->
 <div class="row justify-content-center  m-5">
    <div class="col-lg-6 p-3 my-5 bg-white">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Заказ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Заказчик
            </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Исполнитель</a>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active task" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Атрибуты</th>
                              <th scope="col">название</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Название</td>
                                <td> {{ $show_task->title}}</td>

                              </tr>
                              <tr>
                                <th scope="row">2</th>
                                <td>Категория услуг</td>
                                <td> {{ $show_task->category_name}}</td>

                              </tr>
                              <tr>
                                <th scope="row">3</th>
                                <td> Подкатегория</td>
                                <td> {{ $show_task->subcategory_name}}</td>

                              </tr>
                              <tr>
                                <th scope="row">4</th>
                                <td> Описание</td>
                                <td> {{ $show_task->task_description}}</td>
                              </tr>
                              <tr>
                                <th scope="row">5</th>
                                <td> Регион</td>
                                <td> {{ $show_task->region}}</td>
                              </tr>
                              <tr>
                                <th scope="row">6</th>
                                <td> Адрес</td>
                                <td> {{ $show_task->address}}</td>
                              </tr>
                              <tr>
                                <th scope="row">7</th>
                                <td> Место выполнения работы</td>
                                <td> {{ $show_task->task_location}}</td>
                              </tr>
                              <tr>
                                    <th scope="row">8</th>
                                    <td> Желаемый срок начала работ</td>
                                    <td>от {{ $show_task->task_starttime}} до {{ $show_task->task_finishtime}}  </td>
                              </tr>
                              <tr>
                                <th scope="row">9</th>
                                <td> Оплата</td>
                                <td>от {{ $show_task->price_from}} до {{ $show_task->price_to}} </td>
                              </tr>
                              <tr>
                                <th scope="row">10</th>
                                <td> Статус</td>
                                <td>{{ $show_task->status}} </td>
                              </tr>

                        </tbody>
                    </table>
                    <div>
                        <p>Фотографий</p>

                        @foreach ($show_task->image_tasks as $items)
                        @php
                            $file = $items->image_name;

                            $file_type = explode(".",$file);
                            // echo  $k=$file_type[1];
                            echo $file_type[1]=="docx" || $file_type[1]=="txt"? "<p><a href='admin/img/img_tasks/".$items->image_name."' target='_blanck'>".$items->image_name."</a></p>":"no";


                            // echo "<a href='' target='_blanck'>"{{$items->image_name}}"</a>";
                            //   @if(false)
                            // // /
                            //     echo "k";
                            //   @else
                            //   echo "aaaaaaa";
                            // //         <img src="{{asset('admin/img/img_tasks')}}/{{$items->image_name}}" width=150>
                            //   @endif



                        @endphp

                            {{-- @if($k==2)
                                yes

                            @else
                                 no
                            @endif --}}
                        @endforeach

                    </div>
                    @php
                    $k = "hello/world";
                    $k_type = explode('/','hello/world');
                    // echo $k_type[1]=="world" ? "yes": "no";
                    // @if({{$y}})
                    //      echo $k_type[1];
                    // @else
                    //     echo "kkkk";
                    // @endif

                    @endphp



            </div>
            <div class="tab-pane fade employer" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Атрибуты</th>
                          <th scope="col">название</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Имя</td>
                            <td> {{ $show_task->users->name}}</td>

                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>Телефонный номер</td>
                            <td> {{ $show_task->users->phonenumber}}</td>

                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td>Привязанные соцсети</td>
                            <td>
                                 <p>{{ $show_task->users->fasebook_link}}</p>
                                 <p>{{ $show_task->users->instagram_link}}</p>
                            </td>

                          </tr>
                          <tr>
                            <th scope="row">4</th>
                            <td> Увидомления по заказам</td>
                            <td> {{ $show_task->users->geting_notification}}</td>
                          </tr>
                          <tr>
                            <th scope="row">5</th>
                            <td> Рейтинг</td>
                            <td> {{ $show_task->users->employer_avg_rating}}</td>
                          </tr>
                          <tr>
                            <th scope="row">6</th>
                            <td> Kоличество отзывов</td>
                            <td> {{ $show_task->users->employer_review_count}}</td>
                          </tr>


                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade executor"  id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
               @if(empty($show_task->executor_profile_id))
                    <div class="mg-2 p-5 bg-white"><h4 class="text-center">В настоящее время у задание нет исполнителя.</h4></div>

                @else


                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Атрибуты</th>
                            <th scope="col">название</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Имя</td>
                                <td> {{ $executor->users->name }}</td>

                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Пол</td>
                                <td> {{ $executor->users->gender }}</td>

                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Дата рождения</td>
                                <td> {{ $executor->users->birth_date }}</td>

                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Телефонный номер</td>
                                <td> {{ $show_task->users->total_reiting}}</td>

                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Привязанные соцсети</td>
                                <td>
                                    <p>{{ $show_task->users->fasebook_link}}</p>
                                    <p>{{ $show_task->users->instagram_link}}</p>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td> Увидомления по заказам</td>
                                <td> {{ $show_task->users->geting_notification}}</td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td> Рейтинг</td>
                                <td> {{ $show_task->users->employer_avg_rating}}</td>
                            </tr>
                            <tr>
                                <th scope="row">6</th>
                                <td> Kоличество отзывов</td>
                                <td> {{ $show_task->users->employer_review_count}}</td>
                            </tr>
                        </tbody>
                    </table>

                @endif


            </div>
          </div>
    </div>
  </div>

  <!-- page end-->
@endsection('content')

