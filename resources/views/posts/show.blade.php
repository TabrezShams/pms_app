<x-admin-master>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">           
                    <h2>{{ $post->title }}</h2>
                    <h5><strong> By </strong> {{ $post->user->name}}</h5>
                    <p>{{ $post->body }}</p>
                    <hr />     
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

</x-admin-master>
   