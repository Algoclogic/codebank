
<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Test</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   
<!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script> -->
        <!-- <script src="" rel="stylesheet" type="text/css"> -->
        <!-- Styles -->
        
    </head>
    <body>
    <br>
    <div class="col-md-12">

    <div class="alert alert-success message" style="display: none">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        User detail updated successfully!
    </div>
    <div class="alert alert-success delete-message" style="display: none">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        User deleted successfully!
    </div>

    @if (session('status'))
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{ session('status') }}
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div id="divToDisplayErrors"></div>
    	<div class=" col-md-4 col-md-offset-1">
        <h3> Add New User</h3>
        <hr>
            <div id="template">
        		<form method="POST" action="{{ route('user.detail')}}" >
                        {{ csrf_field() }} 
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">Name:</label>

                        <div>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="name">Email:</label>

                        <div>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        <label for="addredd">Address:</label>

                        <div>
                            <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required autofocus>

                            @if ($errors->has('address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
    			  <button type="submit" class="btn btn-primary" >Add</button>
    			</form>
            </div>    
    	</div>
    	<div class=" col-md-5 col-md-offset-1">
        <h3> User Detail</h3>
        <hr>
        <div id="table">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->address }}</td>
                        <td>
                            <button id= "{{ $user->id }}" onclick="update(this)" type="button" class="btn btn-success btn-sm" >Update</button>
                            <button id= "{{ $user->id}}" onclick="delet(this)" type="button" class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>  
    	</div>
    </div>

      <script type="text/javascript">
          

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
        var user_id = (value.id);
        $.ajax({
                    
            type: "get",

            url : "{{ route('user.update') }}?id="+user_id,
                success : function(data){
                   $('#template').html(data);
                }          
        });
    }
    function delet(value){

        var user_id = (value.id);
         $('.alert').delay(2000).slideUp(2000);
        //alert(user_id);

        $.ajax({

        type: "get",
            url : "{{ route('user.delet') }}?id="+user_id,
                success : function(data){
                    $('#table').html(data);
                    $('.delete-message').show();
                   
                    $('#template #name').val("");
                    $('#template #email').val("");
                    $('#template #address').val("");
                    $('#update').text("Add");
                }  
        });         
    }

      
    $(document).on('click','#update',function(e){
         $('.alert').delay(2000).slideUp(2000);
        $.ajaxSetup({
            header:$('meta[name="_token"]').attr('content')
        });
        e.preventDefault();
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
                    $('#template').empty();
                    $('#template').append(html);
                    $('.message').show();

                }          
        }); 
    });     

    </script> 
</body>



</html>
