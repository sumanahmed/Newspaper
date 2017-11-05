<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function addTagInfo(){
        return view('admin.tag.add-tag');
    }

    public function saveTagInfo(Request $request){

        $this->validate($request, [
            'tag_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'publication_status' => 'required'
        ]);

        $tag = new Tag();
        $tag->tag_name = $request->tag_name;
        $tag->publication_status = $request->publication_status;
        $tag->save();
        return redirect('add-tag')->with('message','Tag info save successfully');
    }

    public function manageTagInfo(){
        $tags = Tag::all();
        return view('admin.tag.manage-tag',['tags'=>$tags]);
    }
    public function unpublishedTagInfo($id) {
        $tagById = Tag::find($id);
        $tagById->publication_status = 0;
        $tagById->save();
        return redirect('manage-tag')->with('message', 'Tag info unpublished successfully');
    }
    public function publishedTagInfo($id) {
        $tagById = Tag::find($id);
        $tagById->publication_status = 1;
        $tagById->save();
        return redirect('manage-tag')->with('message', 'Tag info published successfully');
    }

    public function editTagInfo($id) {
        $tagById = Tag::find($id);
        return view('admin.tag.edit-tag', ['tagById'=>$tagById]);
    }

    public function updateTagInfo(Request $request) {

        $this->validate($request, [
            'tag_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'publication_status' => 'required'
        ]);

        $tagById = Tag::find($request->tag_id);
        $tagById->tag_name = $request->tag_name;
        $tagById->publication_status = $request->publication_status;
        $tagById->save();

        return redirect('/manage-tag')->with('message', 'Tag info update successfully');
    }
    public function deleteTagInfo($id) {
        $tagById = Tag::find($id);
        $tagById->delete();

        return redirect('/manage-tag')->with('message', 'Tag info delete successfully');
    }
}
