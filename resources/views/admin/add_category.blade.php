@extends('layouts.admin_app')


@section('content')

 <div class="row  justify-content-center mt-5">
        <div class="col-lg-8 my-5 py-3">
            <div class="panel-body">
                <div class="card bg-wight" >
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
                        <form role="form" method="POST" action="{{route('category.store')}}" enctype="multipart/form-data"  style="width:70%;margin:0 auto">
                            @csrf
                            <div class="form-group px-2">
                                <label for="tema_name"><h3 class="font-weight-bold my-3">Создать категорию</h3></label>
                                <textarea type=text   class="form-control" id="category_name"  name="category_name" cols="20" value="{{ old('category_name') }}"></textarea>
                                <input type="hidden" value="0" name="status">
                            </div>


                                 <button type="submit" class="btn my-2" style="background:#3158c9;color:#fff">Сохранить</button>

                        </form>
                  </div>

                </div>

      </div>
    </div>
    <script>
         Echo.channel('notification_chanal.65')
                .listen('.notification', (e)=>{
                    console.log(e)
                })
    Echo.channel('unreadnotificationcount_chanal.65')
    .listen('.unreadnotificationcount', (e)=>{
        console.log(e)
    })
    Echo.channel('showAllTaskCountforexecutor_chanal.65')
    .listen('.showAllTaskCountforexecutor', (e)=>{
        console.log(e)
    })
    // --------employer task action
    // Echo.channel('employernotappliedtaskcount_chanal.34')
    // .listen('.employernotappliedtaskcount', (e)=>{
    //     console.log(e)
    // })
    Echo.channel('SectionTaskCount_chanal.34')
    .listen('.SectionTaskCount', (e)=>{
        console.log(e)
    })

    Echo.channel('ExecutorSectionTaskCount_chanal.136')
    .listen('.ExecutorSectionTaskCount', (e)=>{
        console.log(e)
    })
    </script>

@endsection('content')
