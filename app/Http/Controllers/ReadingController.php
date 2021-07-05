<?php

namespace App\Http\Controllers;

use App\Models\Reading;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ReadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $readings=Reading::where('user_id', Auth::user()->id)->simplePaginate(6);
        //dd($readings);
        return view('backend/readingBook', compact(['readings']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $post=new Post();
        $post->title=request('title');
        $post->thumbnail=request('thumbnail');
        $post->user_id=Auth::user()->id;
       //dd($post);
        $post->save();
        
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reading=new Reading();
        $reading->book_id=request('book_id');
        $reading->user_id=Auth::user()->id;
        //dd($reading);
        $reading->save();
        session()->flash('message', 'Ajout effectué dans la liste des lectures en cours !');

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
    public function destroy(Reading $reading)
    {
        $reading->delete();
        session()->flash('Livre supprimé');

        return back();
    
    }
}
