<?php

namespace App\Http\Controllers;

use App\Email;
use App\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function addAboutContent(){
        $pagesContents = Page::all();
        return view('admin.about.edit-about', ['pagesContents' => $pagesContents]);
    }
    public function updateAboutContent(Request $request){
        $pageContentById = Page::find($request->page_id);

        $pageContentById->about_page_title = $request->about_page_title;
        $pageContentById->about_page_sub_title = $request->about_page_sub_title;
        $pageContentById->about_page_content = $request->about_page_content;
        $pageContentById->address = $request->address;
        $pageContentById->email = $request->email;
        $pageContentById->mobile_no = $request->mobile_no;
        $pageContentById->gmap = $request->gmap;
        $pageContentById->save();

        return redirect('edit-about')->with('message','Pages contnet update Successfully');
    }






}
