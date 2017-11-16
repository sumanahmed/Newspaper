<?php

namespace App\Http\Controllers;

use App\Page;
use App\Comment;
use App\Post;
use App\Category;
use App\Slider;
use App\View;
use DB;
use App\Email;
use Mail;
use Illuminate\Http\Request;

class NewspaperController extends Controller
{
    public function index(){
        $posts = DB::table('posts')
                ->take(4)
                ->orderBy('id','desc')
                ->get();

        $comment = DB::table('posts')
                ->join('comments', 'posts.id', '=', 'comments.post_id')
                ->get();

        $sliders= Slider::where('publication_status', '1')
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();

        $lifeStylePosts = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('posts.*', 'categories.category_name')
            ->where('categories.category_name', '=', 'Life Style')
            ->get();

        $businessPosts= DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('posts.*', 'categories.category_name')
            ->where('categories.category_name', '=', 'Business')
            ->get();

        $technologyPosts= DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('posts.*', 'categories.category_name')
            ->where('categories.category_name', '=', 'Technology')
            ->get();

        return view('front.home.home-content', [
            'posts'=>$posts,
            'sliders'=>$sliders,
            'lifeStylePosts'=>$lifeStylePosts,
            'businessPosts'=>$businessPosts,
            'technologyPosts'=>$technologyPosts,
            'comment'=>$comment
        ]);
    }

    public function postDetails($id){

        $data = array();
        $postById = Post::find($id);
        $data['views']= $postById->views+1;
        DB::table('posts')
            ->where('id',$id)
            ->update($data);

        $relatedPosts = Post::where('category_id', $postById->category_id)->take(4)->get();
        $comments = Comment::where('approval_status', 1)
                    ->where('post_id', '=', $postById->id)
                    ->orderBy('id', 'desc')
                    ->get();
        return view('front.post.post-details', [
            'postById' => $postById,
            'comments' => $comments,
            'relatedPosts' => $relatedPosts
        ]);
    }

    public function categoryPost($id){
        $categoryPosts = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('posts.*', 'categories.category_name')
            ->where('posts.category_id', $id)
            ->orderBy('id','desc')
            ->get();

        return view('front.category.category-content',['categoryPosts'=>$categoryPosts]);

    }

    public function aboutContent(){
        $pageContents = Page::all();
        return view('front.about.about-content', ['pageContents'=>$pageContents]);
    }

    public function contactContent(){
        $pageContents = Page::all();
        return view('front.contact.contact-content', ['pageContents'=>$pageContents]);

    }

    public function sendEmail(Request $request){
        $email = new Email();

        $email->name = $request->name;
        $email->email = $request->email;
        $email->subject = $request->subject;
        $email->message = $request->message;
        $email->save();

        $data= $email->toArray();
        Mail::send('mail.congratulation-mail', $data, function ($message) use ($data) {
            $message->to($data['email']);
            $message->name($data['name']);
            $message->subject($data['subject']);
            $message->message($data['message']);
        });

        return redirect('contact-content');
    }

}
