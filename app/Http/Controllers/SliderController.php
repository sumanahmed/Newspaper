<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function addNewSlider(){
        return view('admin.slider.add-slider');
    }

    public function saveNewSlider(Request $request){
        $sliderImage = $request->file('slider_image');
        $imageName = $sliderImage->getClientOriginalName();
        $directory = 'slider-images/';
        $sliderImage->move($directory, $imageName);
        $imgUrl = $directory.$imageName;

        $slider = new Slider();

        $slider->slider_name  = $request->slider_name;
        $slider->slider_title = $request->slider_title;
        $slider->slider_image = $imgUrl;
        $slider->publication_status = $request->publication_status;
        $slider->save();

        return redirect('add-slider')->with('message','Slider save successfuly');
    }

    public function manageSlider(){
        $sliders = Slider::all();
        return view('admin.slider.manage-slider', ['sliders'=>$sliders]);
    }

    public function unpublishedSlider($id){
        $sliderById = Slider::find($id);
        $sliderById->publication_status=0;
        $sliderById->save();
        return redirect('manage-slider')->with('message','Slider unpublished successfully');
    }
    public function publishedSlider($id){
        $sliderById = Slider::find($id);
        $sliderById->publication_status=1;
        $sliderById->save();
        return redirect('manage-slider')->with('message','Slider published successfully');
    }

    public function editSlider($id){
        $sliderById = Slider::find($id);
        return view('admin.slider.edit-slider',['sliderById'=>$sliderById]);
    }

    public function updateSlider(Request $request){
        $sliderImage = $request->file('slider_image');
        if($sliderImage){
            $sliderById = Slider::find($request->slider_id);
            unlink($sliderById->slider_image);

            $sliderImage = $request->file('slider_image');
            $imageName = $sliderImage->getClientOriginalName();
            $directory = 'slider-images/';
            $sliderImage->move($directory, $imageName);
            $imgUrl = $directory.$imageName;

            $sliderById->slider_name = $request->slider_name;
            $sliderById->slider_title = $request->slider_title;
            $sliderById->slider_image = $imgUrl;
            $sliderById->publication_status = $request->publication_status;
            $sliderById->save();

            return redirect('manage-slider')->with('Slider update successfully');

        }else{
            $sliderById = Slider::find($request->slider_id);

            $sliderById->slider_name = $request->slider_name;
            $sliderById->slider_title = $request->slider_title;
            $sliderById->publication_status = $request->publication_status;
            $sliderById->save();

            return redirect('manage-slider')->with('Slider update successfully');
        }
    }

    public function deleteSlider($id){
        $sliderById = Slider::find($id);
        unlink($sliderById->slider_image);
        $sliderById->delete();
        return redirect('manage-slider')->with('message', 'Slider delete successfully');
    }


}
