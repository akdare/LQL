<?php

namespace App\Http\Controllers;

use App\Models\Chronique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ChroniqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $chroniques=Chronique::where('user_id', Auth::user()->id)->simplePaginate(6);

        return view("backend/chronique", compact(['chroniques']));
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
        $chroniques=new Chronique();
        $chroniques->book_id=request('book_id');
        //dd($chroniques);
        $chroniques->user_id=Auth::user()->id;

        $chroniques->save();

        session()->flash('message', 'Ajout effectué dans votre chronique avec succès !');

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
    public function destroy(Chronique $chronique)
    {
        //
        $chronique->delete();

        session()->flash('suppression', 'Retrait effectué avec succès');

        return back();
    }
}
