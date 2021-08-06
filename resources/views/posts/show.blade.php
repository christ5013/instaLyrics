@extends('layouts.app')

@section('content')

<div class="container">

  <div class="row">

        <div class="col-8">
            <div class="d-flex">
                  <div>
                    <img src="/storage/{{$post->image}}" class="w-100" style="max-width:200px;"> 
                  </div>
                  <div>
                        <h2 class="pl-5 pt-3 pr-5 ml-5 mt-5" >{{$post->caption}}</h2>
                      
                        <span class="font-weight-bold pl-5 ml-5">
                            <a href="/profile/{{$post->user->id}}">
                              <span class="text-dark">{{$post->user->username }}</span>
                          </a>
                        </span>
                  </div>
                  
                  <div class="nav-item dropdown" style="margin-left:100px;">
                      <a id="navBarDropdown" class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" style="color:black;" v-pre><i class="fa fa-ellipsis-h" style="font-size:23px;" aria-hidden="true"></i></a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navBarDropdown">
                           <a class="dropdown-item" href="/update/{{$post->id}}/edit">Edit</a> 
                           <a class="dropdown-item" href="/deletePost/{{$post->id}}" id="deleteBtn" >Delete</a>
                      </div>
                  </div>
            </div>

            <div class="col-8 mt-3" style="margin-left:150px;">
              <p> {{$post->lyrics}} </p>
            </div>
        </div>

        <div class="col-4">
          
              <div class="d-flex align-item-center">

                    <div class="pr-3">
                      <img src="{{$post->user->profile->profileImage()}}" class="rounded-circle w-100" style="max-width:40px;">
                    </div>

                    <div>
                    <h5 class="font-weight-bold">
                      <a href="/profile/{{$post->user->id}}"><span class="text-dark">{{$post->user->username }}</span></a>
                    </h5>
                    </div>
                
              </div>
              <hr>

              <!-- comment section -->
              <div>
                 <form method="post" action="{{ route('comment.add') }}">
                    @csrf
                      <img src="{{auth()->user()->profile->profileImage()}}" class="rounded-circle w-100" style="max-width:20px;">
                      <input class="rounded" type="text" required name="comment" id="comment"  placeholder="Write a comment here...">
                      <input type="hidden" name="post_id" value="{{ $post->id }}" />
                      <input type="submit" id ="addComment" class="btn btn-danger" style="font-size: 0.8em;" value="Add Comment" />
                  </form>
                </div>

              <hr>
              <!-- display comment-->
              <div class="text-center">
                <span class="font-weight-bold text-center">Display Comments</span>
              </div>
              <br>
              @include('posts.partials.replies', ['comments' => $post->comments, 'post_id' => $post->id])
              
             
        </div>
    
       
     
  </div>

</div>
@endsection
