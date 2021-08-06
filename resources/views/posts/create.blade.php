@extends('layouts.app')

@section('content')
<div class="container">

   <form action="/p" method="post" enctype="multipart/form-data">
        @csrf

        <div class="col-8 offset-2">
        
            <div class="row">
                <h1>Add New Song</h1>
            </div>

            <div class="form-group row">
                <label for="caption"> Song Title: </label>
                <input type="text" 
                id="caption" 
                class="form-control @error('caption') is-invalid @enderror" 
                name="caption" 
                value="{{old('caption') }}"
                autocomplete="caption" autofocus>

                @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- for lyrics input -->

            <div class="form-group row">
                <label for="lyrics">Song Lyrics:</label>
                <textarea type="text" id="lyrics" name="lyrics" 
                cols="30" rows="5" class="form-control @error('lyrics') is-invalid @enderror"
                autocomplete="lyrics" autofocus style="height:500px;"></textarea>

                @error('lyrics')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <!-- for image -->

            
            <div class="row">
                <label for="image">Song Profile: </label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>

                @error('image')       
                <strong>{{ $message }}</strong>
                @enderror

                <!-- submit button -->
                <div class="row p-4">
                    <button type="submit" class="btn btn-primary">Add new Song</button>
                </div>
        </div>
    </form>

</div>
@endsection
