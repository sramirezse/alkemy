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
        //
    }

    protected function getSectionContent(Request $request){

    }
    public function uploadImagesToBanner(Request $request)
    {
        $section = Section::find($request->section)->with('contents')->first();
        $content = $section->contents->first();
        $content = SectionContent::find($content->id);
        $ext = $request->file('file')->getClientOriginalExtension();
        $name = 'section_' . $section->id . '_' . $request->prefix . '_image_' . time() . '.' . $ext;
        // dd($name);
        $images = $content->content['images'];
        $image = $request->file->move(public_path('images'), $name);
        // dd($request->all());
        $image = [
            'alt' => $request->alt,
            'path' => 'images/' . $name,
        ];

        array_push($images, $image);
        $contentd = [
            'images' => $images
        ];
        $content->content = $contentd;
        $content->save();
    }
    public function updateBanner(Request $request)
    {

        // dd($request->all());
        $section = Section::find($request->section)->with('contents')->first();
        $content = $section->contents->first();
        $content = SectionContent::find($content->id);
        $images = $content->content['images'];
        // dd($request->all());
        $image = [
            'alt' => $request->alt,
            'path' => $request->path,
        ];
        // dd($image);
        $images[$request->index] = $image;
        $contentd = [
            'images' => $images
        ];
        $content->content = $contentd;
        $content->save();
    }
    public function deleteBanner(Request $request)
    {
        $section = Section::find($request->section)->with('contents')->first();
        $content = $section->contents->first();
        $content = SectionContent::find($content->id);
        $images = $content->content['images'];
        unset($images[$request->index]);
        $contentd = [
            'images' => $images
        ];
        $content->content = $contentd;
        $content->save();
    }

    public function fetchImagesToBanner(Request $request)
    {
        $section = Section::find($request->section)->with('contents')->first();
        $content = $section->contents->first();
        $content = SectionContent::find($content->id);
        $images = $content->content['images'];
        // $images = arsort($images);
        // dd($images);
        return $images;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        //
    }
}
