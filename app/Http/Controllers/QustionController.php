<?php

namespace App\Http\Controllers;

use App\Http\Requests\AskQustionRequest;
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
        $qustion = new Qustion();

        return view('qustions.create', compact('qustion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AskQustionRequest $request)
    {
        //dd('store'); //untuk debug
        $request->user()->qustions()->create($request->all('title','body')); //all() = untuk dapat semua input pada form

        return redirect()->route('qustions.index')->with('success', "Your question has been submitted"); //redirect = akan ke lokasi halaman yakni index
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Qustion  $qustion
     * @return \Illuminate\Http\Response
     */
    public function show(Qustion $qustion)
    {
        $qustion->increment('views');

        return view('qustions.show', compact('qustion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Qustion  $qustion
     * @return \Illuminate\Http\Response
     */
    public function edit(Qustion $qustion)
    {
        if(\Gate::denies('update-qustion', $qustion))
        {
            abort(403, "Access denied");
        }
        return view("qustions.edit", compact('qustion'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Qustion  $qustion
     * @return \Illuminate\Http\Response
     */
    public function update(AskQustionRequest $request, Qustion $qustion)
    {
        if(\Gate::denies('update-qustion', $qustion))
        {
            abort(403, "Access denied");
        }
        $qustion->update($request->only('title', 'body'));

        return redirect('/qustions')->with('success', "Your question has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Qustion  $qustion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Qustion $qustion)
    {
        if(\Gate::denies('delete-qustion', $qustion))
        {
            abort(403, "Access denied");
        }

        $qustion->delete();

        return redirect('/qustions')->with('success', "Your question has been deleted");
    }
}
