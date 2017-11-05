<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tag;
use App\Post;
use DB;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function addPostInfo(){
        $categories = Category::where('publication_status',1)->get();
        $tags = Tag::where('publication_status',1)->get();
        return view('admin.post.add-post',[
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    public function savePostInfo(Request $request){
        $postImage = $request->file('post_image');
        $imageName = $postImage->getClientOriginalName();
        $directory = 'post-images/';
        $postImage->move($directory, $imageName);
        $imgUrl = $directory.$imageName;

        $this->validate($request, [
            'post_title' => 'required|regex:/^[\pL\s\-]+$/u',
            'breaking_news' => 'required|regex:/^[\pL\s\-]+$/u',
            'category_id' => 'required',
            'tag_id' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'publication_status' => 'required'
        ]);

        $post = new Post();
        $post->post_title = $request->post_title;
        $post->breaking_news = $request->breaking_news;
        $post->category_id = $request->category_id;
        $post->tag_id = $request->tag_id;
        $post->short_description = $request->short_description;
        $post->long_description = $request->long_description;
        $post->post_image = $imgUrl;
        $post->publication_status = $request->publication_status;
        $post->save();

        return redirect('add-post')->with('message','Post info save successfully');
    }

    public function managePostInfo(){
        $posts = Post::all();
        return view('admin.post.manage-post', ['posts' => $posts]);
    }

    public function unpublishedPostInfo($id) {
        $postById = Post::find($id);
        $postById->publication_status = 0;
        $postById->save();
        return redirect('manage-post')->with('message', 'Post info unpublished successfully');
    }
    public function publishedPostInfo($id) {
        $postById = Post::find($id);
        $postById->publication_status = 1;
        $postById->save();
        return redirect('manage-post')->with('message', 'Post info published successfully');
    }

    public function viewPostInfo($id){
        $postById = DB::table('posts')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->join('tags', 'posts.tag_id', '=', 'tags.id')
            ->select('posts.*', 'categories.category_name')
            ->get();
        return view('admin.post.view-post', ['postById'=>$postById]);
    }

    public function editPostInfo($id){
        $categories = Category::where('publication_status', 1)->get();
        $tags = Tag::where('publication_status', 1)->get();

        $postById = Post::find($id);
        return view('admin.post.edit-post', [
            'postById' => $postById,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    public function updatePostInfo(Request $request){
        $postImage = $request->file('post_image');
        //return $request->file();
        if($postImage){
            $post = Post::find($request->post_id);
            unlink($post->post_image);

            $postImage = $request->file('post_image');
            $imageName = $postImage->getClientOriginalName();
            $directory = 'post-images/';
            $postImage->move($directory, $imageName);
            $imgUrl = $directory.$imageName;


            $post->post_title = $request->post_title;
            $post->breaking_news = $request->breaking_news;
            $post->category_id = $request->category_id;
            $post->tag_id = $request->tag_id;
            $post->short_description = $request->short_description;
            $post->long_description = $request->long_description;
            $post->post_image = $imgUrl;
            $post->publication_status = $request->publication_status;
            $post->save();

            return redirect('manage-post')->with('message','Post info update successfully');
        }else{
            $post = Post::find($request->post_id);

            $post->post_title = $request->post_title;
            $post->breaking_news = $request->breaking_news;
            $post->category_id = $request->category_id;
            $post->tag_id = $request->tag_id;
            $post->short_description = $request->short_description;
            $post->long_description = $request->long_description;
            $post->publication_status = $request->publication_status;
            $post->save();

            return redirect('manage-post')->with('message','Post info update successfully');
        }
    }

    public function deletePostInfo($id){
        $postById = Post::find($id);
        unlink($postById->post_image);

        $postById->delete();

        return redirect('manage-post')->with('message','Post info delete successfully');

    }



}
