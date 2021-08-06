<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comments;
use App\User;
use Illuminate\Support\Facades\DB;
class CommentController extends Controller
{

    // public function __construct(){
    //     $this->middleware('auth');
    // }

    public function store(Request $request)
    {
        $comment = new Comments;
        $comment->comment = $request->comment;
        $comment->user()->associate($request->user());
        $post = Post::find($request->post_id);
        $post->comments()->save($comment);
        return back();

    }


    public function deleteComment($id){

        $comment_id = Comments::findorFail($id);
        if(auth()->user()->id == $comment_id->user_id){
                $comment_id->delete();
             
        }
        return back(); 

      
       
    }
    // public function edit(Comments $comment){
    // //    dd($comment->id);
    // //   $this->authorize('update', $comment);
          
     
    //      //  return "hahahakdog ka";
    //     return view("posts.partials.editComment");
    //     // dd(view("posts.partials.editComment"));
    // }

    // public function update(Comments $comment){
    //     $data = request()->validate([
    //         'comment' => 'required'
    //     ]);

    //     Comments::where('id', $comment)->update($data);
    //     return back();
    // }
}
