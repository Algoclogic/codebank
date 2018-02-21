
    var html='<form method="POST" action="{{ route("user.detail")}}" >';
        html+='{{ csrf_field() }}'; 
        html+='<div class="form-group">';   
        html+='<label for="name">Name:</label>';
        html+='<input type="text" class="form-control" name="name" id="name"  required >';
        html+='</div>';
        html+='<div class="form-group">';
        html+='<label for="email">Email:</label>';
        html+='<input type="email" class="form-control" name="email" id="email" required>';
        html+='</div>';
        html+='<div class="form-group">';
        html+='<label for="address">Address:</label>';
        html+='<input type="text" class="form-control" name="address" id="address" required >';
        html+='</div>';
        html+='<button type="submit" class="btn btn-primary" >Add</button>';
        html+='</form>';

function update(value){
//alert();
    var user_id = (value.id);
    $.ajax({
                
        type: "get",

        url : "{{ route('user.update') }}?id="+user_id,
            success : function(data){
               $('#template').html(data);
               //alert('User detail updated successfully!');
                
            }          
    });
}



function delet(value){

    var user_id = (value.id);
     $('.alert').delay(2000).slideUp(2000);
    //alert(user_id);

    $.ajax({

    type: "get",
       // data: user_id,
      //  url : "user/update/id="+user_id,
        url : "{{ route('user.delet') }}?id="+user_id,
            success : function(data){
                //alert(data);
                $('#table').html(data);
                $('.delete-message').show();
               
                // $('#template #name').val("");
                // $('#template #email').val("");
                // $('#template #address').val("");
                // $('#update').text("Add");
            //$('#template').html(data);
               // onSuccess(data);
            }  
    });         
}


    

    // $(document).ready(function(){

      
        $(document).on('click','#update',function(e){
             $('.alert').delay(2000).slideUp(2000);
            $.ajaxSetup({
                header:$('meta[name="_token"]').attr('content')
            });
            e.preventDefault();
          //  alert('here');

            $.ajax({
                
                type: "post",
                data: $('#user-form').serialize(),
                url : "{{ route('user.detail.update') }}",
                    success : function(data){
                        // if(data.code == 422){
                        //     //$('#table').html(data.table);
                        //     $('#table').html(data.table.original);
                        //     console.log(data.table.original);

                        //    //  $('#divToDisplayErrors').html(data.errors);

                        // } 
                         $('#table').html(data);

                        
                       // console.log(data);



// $.each( parsedJson.errors, function( key, value) {
//               errorString += '<li>' + value + '</li>';
// });
// 

                        $('#template').empty();
                        $('#template').append(html);
                        $('.message').show();


                        // if(data.code === 422){
                        //     $('#divToDisplayErrors').html(data.errors);

                        // } 
                        // $('#template #name').val("");
                        // $('#template #email').val("");
                        // $('#template #address').val("");
                        // $('#update').text("Add");

                    }          
            }); 
        });     
    // }
   
    

