@extends('layouts.admin_app')
@section('style')
    <style>
        .incorrectly{
            border:1px solid red;
        }
        .error_message{
            color:red
        }

    </style>

@endsection
@section('content')
<section id="main-content" >
    <section class="wrappe" style="min-height:800px;margin-top:70px">
        <div class="container">

            <form role="form" method="POST" action="{{route('create_question')}}" enctype="multipart/form-data"  style="width:70%;margin:0 auto">
                @csrf
                <div class="form-group px-2">
                    <label for="tema_name"><h5 class="font-weight-bold my-3">Создать вопрос</h5></label>
                    <textarea type=text   class="form-control @error('question') incorrectly @enderror"   name="question" cols="50" rows="8" ></textarea>
                </div>
                @error('question')
                    <div class="my-3 error_message" >{{$message }}</div>
                @enderror
                <div class="form-group px-2">
                    <label for="tema_name"><h5 class="font-weight-bold my-3">Создать ответ</h5></label>
                    <textarea type=text   class="form-control @error('answer') incorrectly @enderror"   name="answer" cols="50" rows="8" ></textarea>
                </div>
                @error('answer')
                    <div class="my-3 error_message" >{{$message }}</div>
                @enderror
                <div class="form-group px-2">
                    <input type="file" name="img_path" multiple>
                </div>

                <button type="submit" class="btn my-2" style="background:#3158c9;color:#fff">Сохранить</button>
            </form>

        </div>
        <
    </section>
</section>
<script>
    //  CKEDITOR.replace('question',{
    //         filebrowserUploadUrl:"{{route('create_question',['_token'=>csrf_token()])}}",
    //         filebrowserUploadMethod:'form'
    //     });
    //  CKEDITOR.replace('question')
</script>
@endsection('content')

