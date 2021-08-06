@extends('layouts.app')

@section('content')
<div class="container">

   <form action="/update/{{$post->id}}" method="post" enctype="multipart/form-data">
         @csrf
        
        @method('PATCH')
        <div class="col-8 offset-2">
        
            <div class="row">
                <h1> Edit Song</h1>
            </div>

            <div class="form-group row">
                <label for="caption"> Edit Title</label>
                <input type="text" 
                id="caption" 
                class="form-control @error('caption') is-invalid @enderror" 
                name="caption" 
                value="{{old('caption') ?? $post->caption }}"
                autocomplete="caption" autofocus>

                @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <!-- for lyrics -->

            <div class="form-group row">
                <label for="lyrics">Edit Lyrics</label>
                <textarea type="text" 
                id="lyrics" 
                class="form-control @error('lyrics') is-invalid @enderror" 
                name="lyrics" 
                value="{{old('lyrics') ?? $post->lyrics }}"
                autocomplete="lyrics" autofocus
                style="height:500px;"
                >{{old('lyrics') ?? $post->lyrics }}
                </textarea>
              
               
                

                @error('lyrics')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- for image -->

            <div class="row">
                <label for="image">Edit Image Profile</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>

                @error('image')       
                <strong>{{ $message }}</strong>
                @enderror

                <div class="row p-4">
                    <button type="submit" class="btn btn-primary">Update Post</button>
                </div>
        </div>
    </form>

</div>
@endsection
