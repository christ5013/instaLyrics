@extends('layouts.app')

@section('content')
<div class="container">

<form action="/" method="get" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control"name="q"
            placeholder="Search song title" > <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search">search</span>
            </button>
        </span>
    </div>

</form>

<br>

    @foreach($posts as $post)
    
      <div class="row">
            <div class="col-6 offset-3 pt-4 pb-2">
                <a href="/profile/{{$post->user->id}}">
                   <img src="/storage/{{$post->image}}" class="w-100"> 
                </a> 
             

                    <p class="pt-2 pb-4">
                        <span class="font-weight-bold">
                          <a href="/profile/{{$post->user->id}}">
                            <span class="text-dark">{{$post->user->username }}</span>
                        </a>
                        </span>: {{$post->caption}}
                    </p>
                    
              

            </div>
          
          
       </div>
 

     @endforeach


     <div class="row">
       <div class="col-12 d-flex justify-content-center">
          {{ $posts->links() }}
       </div>

     </div>

</div>
@endsection
