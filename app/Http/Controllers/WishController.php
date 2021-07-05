<?php

namespace App\Http\Controllers;

use App\Models\Wish;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class WishController extends Controller
{
    //
    public function index(){

        $wishes=Wish::where('user_id', Auth::user()->id)->simplePaginate(6);

        return view("backend/wishes", compact(['wishes']));

    }

    public function store(Request $request){
        $wish=new Wish();
        $wish->book_id=request('book_id');
    //dd($wish);
        $wish->user_id=Auth::user()->id;
        session()->flash('message', 'Ajout effectué dans votre wish-list avec succès !');
        $wish->save();
        return back();
    }

    public function destroy(Wish $wish){
        $wish->delete();
        session()->flash('suppression', 'Retrait effectué avec succès');

        return back();
    }
}
