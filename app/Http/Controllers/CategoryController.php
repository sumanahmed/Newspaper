<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory()
    {
        return view('/admin.category.add-category');
    }

    public function saveCategory(Request $request){
        $this->validate($request,[
            'category_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'category_description' => 'required',
            'publication_status' => 'required'
        ]);
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status = $request->publication_status;
        $category->save();
        return redirect('/add-category')->with('message', 'Category Info Save Successfully');
    }

    public function manageCategory()
    {
        $allCategories = Category::all();

        return view('/admin.category.manage-category', ['allCategories' => $allCategories]);
    }

    public function editCategory($id){
        $categoryById = Category::where('id', $id)->first();
        return view('/admin.category.edit-category', ['categoryById' => $categoryById]);
    }



    public function unpublishedCategory($id){
        $categoryById = Category::find($id);
        $categoryById->publication_status = 0;
        $categoryById->save();
        return redirect('/manage-category')->with('message', 'Unpublished Successfully');
    }

    public function publishedCategory($id){
        $categoryById = Category::find($id);
        $categoryById->publication_status = 1;
        $categoryById->save();
        return redirect('/manage-category')->with('message', 'Published Successfully');
    }

    public function viewCategory($id){
        $categoryById = Category::where('id', $id)->first();
        return view('/admin.category.view-category', ['categoryById' => $categoryById]);
    }

    public function updateCategory(Request $request)
    {
        $this->validate($request,[
            'category_name' => 'required|regex:/^[\pL\s\-]+$/u',
            'category_description' => 'required',
            'publication_status' => 'required'
        ]);

        $categoryById = Category::find($request->category_id);
        $categoryById->category_name = $request->category_name;
        $categoryById->category_description = $request->category_description;
        $categoryById->publication_status = $request->publication_status;
        $categoryById->save();
        return redirect('/manage-category')->with('message', 'category info update successfully');
    }

    public function deleteCategory($id)
    {
        $categoryById = Category::where('id', $id)->first();
        $categoryById->delete();
        return redirect('/manage-category')->with('message', 'Delete successfully');
    }
}
