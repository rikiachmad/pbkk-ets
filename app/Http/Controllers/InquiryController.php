<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Http\Requests\StoreInquiryRequest;
use App\Http\Requests\UpdateInquiryRequest;

class InquiryController extends Controller
{

    // public function __construct()
    // {
    //     $this->authorizeResource(Inquiry::class, 'inquiry');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inquiry.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInquiryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInquiryRequest $request)
    {
        $validated = $request->validated();
        
        $inquiry = Inquiry::create([
            'user_id' => auth()->user()->id,
            'type' => $validated['type'],
            'text' => $validated['text'],
        ]);
        // dd($inquiry);

        return redirect('/contact')->with('success', 'Pesan anda berhasil dikirim');
    }
}
