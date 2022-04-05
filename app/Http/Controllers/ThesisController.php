<?php

namespace App\Http\Controllers;

use App\Models\Thesis;
use App\Http\Requests\StoreThesisRequest;
use App\Http\Requests\UpdateThesisRequest;

class ThesisController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Thesis::class, 'thesis');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreThesisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreThesisRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Thesis  $thesis
     * @return \Illuminate\Http\Response
     */
    public function show(Thesis $thesis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Thesis  $thesis
     * @return \Illuminate\Http\Response
     */
    public function edit(Thesis $thesis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateThesisRequest  $request
     * @param  \App\Models\Thesis  $thesis
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateThesisRequest $request, Thesis $thesis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Thesis  $thesis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thesis $thesis)
    {
        //
    }
}
