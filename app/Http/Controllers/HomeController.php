<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Image;
use App\Models\SectionContent;
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
}
