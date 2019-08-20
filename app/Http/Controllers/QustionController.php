<?php

namespace App\Http\Controllers;

use App\Qustion;
use Illuminate\Http\Request;

class QustionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qustions = Qustion::with('user')->latest()->paginate(10);

        return view('qustions.index', compact('qustions'));
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
     * @param  \App\Qustion  $qustion
     * @return \Illuminate\Http\Response
     */
    public function show(Qustion $qustion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Qustion  $qustion
     * @return \Illuminate\Http\Response
     */
    public function edit(Qustion $qustion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Qustion  $qustion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Qustion $qustion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Qustion  $qustion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Qustion $qustion)
    {
        //
    }
}
