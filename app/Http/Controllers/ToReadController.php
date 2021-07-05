<?php

namespace App\Http\Controllers;
use App\Models\ToRead;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ToReadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $to_reads=ToRead::where('user_id', Auth::user()->id)->simplePaginate(6);
        return view("backend/to_read", compact(['to_reads']));
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
        $to_read=new ToRead();
        $to_read->book_id=request('book_id');
        $to_read->user_id=Auth::user()->id;
        $to_read->save();
        session()->flash('message', 'Ajout effectué dans votre pile à lire avec succès !');
        return back();
    }

    /**
     * Display the specified resource. 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ToRead $to_read)
    {
        $to_read->delete();
        session()->flash('suppression', 'Retrait effectué avec succès');

        return back();
    }
}
