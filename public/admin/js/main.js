$('#notyfy').on('click',function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
});

    $.ajax({
        url: "{{ route('ajax.request.store') }}",
        type:'get',

        success: function(data) {
            // $('#status').html(data);
            // $('#status').toggleClass("text-success")
            // $('#status').toggleClass("text-danger")
            // if(data == "Актив"){

            //     $('#change_status').html("Пасив")
            //     $('#status').attr('data-status',"Пасив")

            // }else{

            //     $('#change_status').html("Актив")
            //     $('#status').attr('data-status',"Актив")
            // }
            // console.log(data)
        }
    });
})
