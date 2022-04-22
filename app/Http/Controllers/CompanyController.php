<?php

namespace App\Http\Controllers;

use App\Models\Company;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class CompanyController extends Controller
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

        $total = Company::count();

        // dd($request->all());
        // $total = $companies->count();
        $companies = Company::orderBy('id', 'desc')->limit($limit);
        if ($offset > 0) {
            $companies->offset($offset);
        }
        // $companies = $companies->orderBy('id', 'DESC');

        if ($request->search) {
            $search = strtolower($request->search);
            $companies = Company::whereRaw('lower(description) like (?)', ["%{$search}%"]);
            $total = $companies->count();
            //    ->where('id', $search);
        }
        $companies = $companies->get();
        $arrayQuery = array('total' => $total, 'data' => $companies);
        return $arrayQuery;
        // return $companies;
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
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
