<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Company;
use App\Models\Service;
use App\Models\ServiceDetail;
use Illuminate\Http\Request;

class ServiceController extends Controller
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

        $total = Service::count();

        // dd($request->all());
        // $total = $service->count();
        $service = Service::orderBy('id', 'desc')->limit($limit);
        $service = $service->addSelect([
            'company_name' => Company::select('name')->whereColumn('services.company_id', 'companies.id'),
            'car_serie' => Car::select('serie')->whereColumn('services.car_id', 'cars.id'),
            'service_name' => ServiceDetail::select('title')->whereColumn('services.service_detail_id', 'service_details.id'),
        ]);
        if ($offset > 0) {
            $service->offset($offset);
        }
        // $service = $service->orderBy('id', 'DESC');

        if ($request->search) {
            $search = strtolower($request->search);
            $service = Service::whereRaw('lower(description) like (?)', ["%{$search}%"]);
            $total = $service->count();
            //    ->where('id', $search);
        }
        $service = $service->get();
        $arrayQuery = array('total' => $total, 'data' => $service);
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
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
