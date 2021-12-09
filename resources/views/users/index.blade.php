<x-admin-master>

    @section('content')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <h1>Manage Users</h1>
        <table class="table table-bordered">
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Role</th>
            <th width="250px">Action</th>
        </thead>
        <tbody>
        @foreach($users as $user)
         <tr>
             <td>{{ $user->id }}</td>
             <td>{{ $user->name }}</td>
             <td><strong>{{ $user->role->name}}</strong></td>
             </td>
                        <td>
                        <a class="btn btn-primary" href="{{ route('user.edit',$user->id) }}">Edit</a>                       
                        {!! Form::open(['method' => 'DELETE','route' => ['user.destroy', $user->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}                        
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
       
                </table>
            </div>
        </div>
    </div>
    
    @endsection
    
    
    
    </x-admin-master>