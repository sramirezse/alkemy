<?php

namespace App\Http\Controllers;

use App\Models\ServiceDetail;
use Illuminate\Http\Request;

class ServiceDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->limit;
        $offset = $request->offset;

        $total = ServiceDetail::count();

        // dd($request->all());
        // $total = $serviceDetails->count();
        $serviceDetails = ServiceDetail::orderBy('id', 'desc')->limit($limit);
        if ($offset > 0) {
            $serviceDetails->offset($offset);
        }
        // $serviceDetails = $serviceDetails->orderBy('id', 'DESC');

        if ($request->search) {
            $search = strtolower($request->search);
            $serviceDetails = ServiceDetail::whereRaw('lower(description) like (?)', ["%{$search}%"]);
            $total = $serviceDetails->count();
            //    ->where('id', $search);
        }
        $serviceDetails = $serviceDetails->get();
        $arrayQuery = array('total' => $total, 'data' => $serviceDetails);
        return $arrayQuery;
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
     * @param  \App\Models\ServiceDetail  $serviceDetail
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceDetail $serviceDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceDetail  $serviceDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceDetail $serviceDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceDetail  $serviceDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceDetail $serviceDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceDetail  $serviceDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceDetail $serviceDetail)
    {
        //
    }
}
