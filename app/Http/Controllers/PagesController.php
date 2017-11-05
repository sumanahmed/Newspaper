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

        $this->validate($request,[
            'about_page_title' => 'required|regex:/^[\pL\s\-]+$/u',
            'about_page_sub_title' => 'required|regex:/^[\pL\s\-]+$/u',
            'about_page_content' => 'required',
            'address' => 'required',
            'email' => 'required|email|unique:pages,email',
            'mobile_no' => 'required|size:11|regex:/(01)[0-9]{9}/',
            'gmap' => 'required'
        ]);

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
