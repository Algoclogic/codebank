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