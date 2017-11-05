<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function saveComment(Request $request){

        $this->validate($request, [
            'name' => 'required|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|email|unique:comments,email',
            'message' => 'required'
        ]);

        $comment = new Comment();
        $comment->post_id = $request->post_id;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->message = $request->message;
        $comment->approval_status = 0;
        $comment->save();
        return view('front.post.post-details');
    }

    public function manageComment(){
        $comments = Comment::all();
        return view('/admin.comments.comments', ['comments' => $comments]);
    }

    public function unapprovedComment($id){
        $commentById = Comment::find($id);
        $commentById->approval_status = 0;
        $commentById->save();

        return redirect('/comments')->with('message', 'Comment Unapporved Successfully');
    }

    public function approvedComment($id){
        $commentById = Comment::find($id);
        $commentById->approval_status = 1;
        $commentById->save();

        return redirect('/comments')->with('message', 'Comment Apporved Successfully');
    }

    public function viewComment($id){
        $commentById = Comment::where('id' ,$id)->first();
        return view('/admin.comments.view-comment', [ 'commentById' => $commentById ]);
    }

    public function deleteComment($id){
        $commentById = Comment::find($id);
        $commentById->delete();
        return redirect('comments')->with('message','Comment Deleted Successfully');
    }


}
