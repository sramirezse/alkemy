<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Image;
use App\Models\SectionContent;
use Illuminate\Support\Facades\Storage;
class HomeController extends Controller
{
    public function index(Request $request){

        $sections = Section::all();
        // dd($sections);
        $images = Image::all();
        $sectionContent1 = SectionContent::find(1)->content['images'];
        $sectionContent4 = SectionContent::find(4)->content['cards'];
        return view('home.index', [
            'sections' => $sections,
            'images' => $images,
            'sectionContent1' => $sectionContent1,
            'sectionContent4' => $sectionContent4,
        ]);
    }

    public function uploadImagesToBanner(Request $request){
        $section = Section::find($request->section)->with('contents')->first();
        $content = $section->contents->first();
        $content = SectionContent::find($content->id);
        $ext = $request->file('file')->getClientOriginalExtension();
        $name = 'section_'.$section->id.'_'.$request->prefix.'_image_'.time().'.'.$ext;
        // dd($name);
        $images = $content->content['images'];
        $image = $request->file->move(public_path('images'), $name);
        // dd($image);
        $image = [
            'alt' => $request->alt,
            'path' => 'images/'.$name,
        ];

        array_push($images, $image);
        $contentd = [
            'images'=> $images
        ];
        $content->content = $contentd;
        $content->save();
    }

    public function fetchImagesToBanner(Request $request){
        $section = Section::find($request->section)->with('contents')->first();
        $content = $section->contents->first();
        $content = SectionContent::find($content->id);
        $images = $content->content['images'];
        // $images = arsort($images);
        // dd($images);
        return $images;
    }
}
