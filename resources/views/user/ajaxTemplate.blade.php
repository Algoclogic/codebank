<form id="user-form">

        {{ csrf_field() }} 
    <div class="form-group">
        <input type="hidden" name="id" value="{{ $user->id}}">
        <label for="name">Name:</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $user->name}}" style="background: aliceblue">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" name="email" id="email" value="{{ $user->email}}" style="background: aliceblue">
    </div>
    <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" class="form-control" name="address" id="address" value="{{ $user->address  }}" style="background: aliceblue">
    </div>
    <button type="submit" class="btn btn-primary" id="update">Update</button>
</form>