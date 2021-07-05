<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Expediteur;
use App\Models\Destinataire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::all();    
        return view("mails/messages", compact(['messages']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Message $message)
    {
        return view('mails/create',compact(['message']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $message=new Message();
        $expediteur=new Expediteur();
        $destinataire=new Destinataire();

        $expediteur->id_exp=Auth::user()->id;
        $expediteur->name=Auth::user()->name;
        //$expediteur->email=Auth::user()->email;
     
        $destinataire->id_dest=User::firstWhere('email',$request['destinataire'])->id;
        $destinataire->name=User::firstWhere('email',$request['destinataire'])->name;
        //$destinataire->email=User::firstWhere('email',$request['destinataire'])->email;
     
        $message->sujet=request('sujet');
        $message->contenu=request('contenu');
        $message->expediteur_id=Auth::user()->id;
        $message->destinataire_id=User::firstWhere('email',$request['destinataire'])->id;

        //$message->destinataire_id=Auth::user()->id; 
        //dd($message);
        $expediteur->save();
        $destinataire->save();
        $message->save();

        
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
    public function edit($message)
    {
        $message=Message::find($message);
        //dd($message);
        return view ('mails/reponse',compact(['message']));
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
    public function destroy(Message $message)
    {
       $message->delete();
       return back();
    }

/*
    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('users')
         ->where('name', 'like', '%'.$query.'%')
         ->orWhere('email', 'like', '%'.$query.'%')
         ->get();
         
      }
      else
      {
       $data = DB::table('users')
         ->orderBy('id', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->name.'</td>
         <td>'.$row->email.'</td>

        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
*/

public function search(Request $request){
      
    $destinataire=request()->input('destinataire');
    //dd($destinataire);
    $user=User::where('name',$destinataire)
         ->orWhere('name', 'like', '%'.$destinataire.'%')
         ->orWhere('name', 'like', '%'.$destinataire)
         ->orWhere('name', 'like',$destinataire.'%')
         ->orWhere('email', 'like', '%'.$destinataire.'%')
         ->orWhere('email', 'like', '%'.$destinataire)
         ->orWhere('email', 'like', $destinataire.'%')
         ->get();
  //dd($user);

        return $user;

  }

 
    
}
