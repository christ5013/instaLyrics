<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

@foreach($comments as $comment)
<div class="display-comment">
    <div class="d-flex">
        <img class="rounded-circle w-100" style="max-width:20px" src="{{$comment->user->profile->profileImage()}}">
        <span class="font-weight-bold ml-2">{{ $comment->user->username }}</span>
         <span class="ml-2"> <a href="/delete/{{$comment->id}}" class="fa fa-trash-o text-danger"></a></span>
        </div>
    <div class="w-100 ml-5">
        {{ $comment->comment }}
    </div>

</div>
@endforeach 