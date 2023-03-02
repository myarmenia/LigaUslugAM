@extends('layouts.admin_app')
@section('content')
<section id="main-content" >
    <section class="wrappe" style="height:700px;margin-top:70px">
        <div class="container">

            <form role="form" method="POST" action="{{route('create_question')}}" enctype="multipart/form-data"  style="width:70%;margin:0 auto">
                @csrf
                <div class="form-group px-2">
                    <label for="tema_name"><h3 class="font-weight-bold my-3">Создать вопрос с ответом</h3></label>
                    <textarea type=text   class="form-control"  id="question"  name="question" cols="20" ></textarea>

                </div>
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
     CKEDITOR.replace('question')
</script>
@endsection('content')

