<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\User;
use App\Comments;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
      

        if($request->query('q')) {
            $posts = Post::where('caption','LIKE','%'.$request->query('q').'%')->paginate(2);
        }else {
            $users = auth()->user()->following()->pluck('profiles.user_id');
            $posts = Post::whereIn('user_id',$users)->latest()->paginate(2);
        }
     
        
       

        return view('posts.index',compact('posts'));
    }


    // create posts
    public function create(){
        return view('posts.create');
    }

    // store image to the database
    public function store(){

        $data = request()->validate([
            'caption' => 'required',
            'lyrics' => 'required',
            'image' =>['required','image']
        ]);
        


        $imagePath = request('image')->store('uploads','public');

        $image = Image::make(public_path("storage/{$imagePath}"))->resize(1200,1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption'=> $data['caption'],
            'lyrics'=>$data['lyrics'],
            'image'=>$imagePath
        ]);

        return redirect('/profile/'.auth()->user()->id);
    }

    //   show image details when clicked
    public function show(\App\Post $post){
    
         return view("posts.show",compact('post'));

    }

    // delete post
    public function delete($id)
    {

        $postId = Post::findorFail($id);
        $postId->delete();

         return redirect('/profile/'.auth()->user()->id);
    }

    //edit post
    public function edit( Post $post){
         
        $this->authorize('update', $post);
        return view("posts.edit",compact('post'));
    }
    
    // update
    public function update(Post $post, $postid){


        $data = request()->validate([
            'caption'=> 'required',
            'lyrics' => 'required',
            'image' => '',

        ]);

         // condition if there's an existing image
         if(request('image')){

            $imagePath = request('image')->store('uploads','public');

            $image = Image::make(public_path("storage/{$imagePath}"))->resize(1200,1200);
            $image->save();

            $imageArray = ['image' => $imagePath];
  
            
            $updatedArray = array_merge($data,$imageArray);
            Post::where('id',$postid)->update($updatedArray);
        }
        else {
            $update = $data;
            Post::where('id',$postid)->update($update);
    

        }
    
         return redirect('/p/'.$postid);
    
    }

 



}
