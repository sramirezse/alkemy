<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\SectionContent;
use Illuminate\Support\Facades\Storage;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    protected function getSectionContent(Request $request)
    {
        $section = Section::find($request->section)->with('contents')->first();
        $content = $section->contents->first();
        $content = SectionContent::find($content->id);
        return $content;
    }
    
    public function saveContent(SectionContent $content, $images)
    {
        $contentd = [
            'images' => $images
        ];
        $content->content = $contentd;
        $content->save();
        return $content;
    }

    public function fetchImagesToBanner(Request $request)
    {
        $content = $this->getSectionContent($request);
        $images = $content->content['images'];
        return $images;
    }

    public function uploadImagesToBanner(Request $request)
    {
        $content = $this->getSectionContent($request);
        $ext = $request->file('file')->getClientOriginalExtension();
        $name = 'section_' . $content->section_id . '_' . $request->prefix . '_image_' . time() . '.' . $ext;
        $images = $content->content['images'];
        $image = $request->file->move(public_path('images'), $name);
        $image = [
            'alt' => $request->alt,
            'path' => 'images/' . $name,
        ];

        array_push($images, $image);
        return $content = $this->saveContent($content, $images);

    }
    public function updateBanner(Request $request)
    {
        $content = $this->getSectionContent($request);
        $images = $content->content['images'];
        $image = [
            'alt' => $request->alt,
            'path' => $request->path,
        ];
        $images[$request->index] = $image;
        return $content = $this->saveContent($content, $images);

    }
    public function deleteBanner(Request $request)
    {
        $content = $this->getSectionContent($request);
        $images = $content->content['images'];
        unset($images[$request->index]);
        return $content = $this->saveContent($content, $images);
    }

    
}
