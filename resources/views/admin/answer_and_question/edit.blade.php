@extends('layouts.admin_app')
@section('content')
<section id="main-content" >
    <section class="wrappe" style="margin-top:70px">
        <div class="container">
            {{-- {{dd($edit_question)}} --}}
            <form role="form" method="POST" action="{{route('updateanswer',$edit_question->id)}}" enctype="multipart/form-data"  style="width:70%;margin:0 auto">
                @csrf
                {{-- @method('Putch') --}}
                <div class="form-group px-2">
                    <label for="tema_name"><h3 class="font-weight-bold my-3">Редактирование</h3></label>
                    <textarea type=text   class="form-control"   name="question" cols="20"  row=10>{{$edit_question->question}}</textarea>

                </div>
                <div class="form-group px-2">
                    <label for="tema_name"><h3 class="font-weight-bold my-3">Редактирование</h3></label>
                    <textarea type=text   class="form-control"   name="answer" cols="20"  row=10>{{$edit_question->answer}}</textarea>

                </div>
                <div>
                <div class=" px-2" style="height:250px;width:200px;overflow:hidden">

                    <div id="delete_file"  data-id="{{$edit_question->id}}" style="height:30px;width:30px;color:red;font-size:20px;margin-left:86%;text-align:center;background-color:#e2e2e2;border-radius:5px;line-height:30px">x</div>
                    <div  style="height:200px;width:200px;overflow:hidden">
                        <img id="question_img" calss="responsive" src="{{$edit_question->img_path != Null ? route('get-file',['path'=>$edit_question->img_path]) : asset('/images/logo_footer.png')}}" alt="" style="object-fit:contain;width:100%;height:100%" >
                    </div>
                </div>
                <input type="file" name="img_path" id="img_path" multiple>
            </div>

                <button type="submit" class="btn my-3" style="background:#3158c9;color:#fff">Сохранить</button>
            </form>
        </div>

    </section>
</section>
<script>
    //  CKEDITOR.replace('question',{
    //         filebrowserUploadUrl:"{{route('create_question',['_token'=>csrf_token()])}}",
    //         filebrowserUploadMethod:'form'
    //     });
    //  CKEDITOR.replace('question')

// =========== delete file from db ======================
img_path.addEventListener('change',(e)=>{
    console.log(e.target.files[0])

    question_img.src=URL.createObjectURL(e.target.files[0])
})

delete_file.addEventListener('click', (e) =>{


        let that = e
        let file_id = e.target.getAttribute('data-id')
        console.log(file_id)

        csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        fetch('/delete-file/'+file_id,{
                    method: 'get',
                    headers:  {

                            'X-CSRF-TOKEN':csrf
                        },

                }).then(async response => {
                        if (!response.ok) {
                        }else{
                            const success = await response.json();
                            if(success.message == 'deleted'){
                                // that.parentNode.remove()
                                question_img.setAttribute('src','/images/logo_footer.png')

                            }
                        }
                    })

    })
    // =========== delete file from db ======================



</script>
@endsection('content')

