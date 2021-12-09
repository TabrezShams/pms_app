@extends('layouts.app')

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
        <div class="pull-left">
            <h2>All Posts</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success"  href="{{ route('posts.create') }}"> Create Post</a>
            
        </div>

        <br>

        <table class="table table-bordered">
        <thead>
        
        <th width="150px">Title</th>
        <th>Description</th>
        <th>Author</th>
        <th width="250px" >Action</th>
        </thead>
        <tbody>
        @foreach($posts as $post)
         <tr>
         
         <td><strong>{{ $post->title }}</strong></td>
         <td>{{ $post->body }}</td>
         <td>{{ $post->user->name}}</td>
        
                    <td>
                    <a class="btn btn-info" href="{{ route('posts.show', $post->id) }}">Show</a>
                    
                    <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
                   
                    {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $post->id],'style'=>'display:inline']) !!}
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



