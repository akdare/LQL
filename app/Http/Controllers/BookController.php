<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\UploadTrait;
use App\Services\BookService;
use App\Transformers\BookTransformer;
use Google\Auth\Cache\Item;

class BookController extends Controller
{
    use UploadTrait;

    private $bookService;

    public function __construct(BookService $bookService){
        $this->middleware('auth');
        $this->bookService = $bookService;
    }
   
    
    
    public function index() {
       // $books = Auth::user()->books;
       $books=Book::where('user_id', Auth::user()->id)->simplePaginate(6);
       
       //dd(Auth::user()->id);
       //dd($books);

        return view('backend/listBook',compact('books'));
    }
/*
    public function actu(){
        return view('backend/actu');
    }*/

    public function store(Request $request,Book $book){
       /* $data =  $request->validate([
            'isbn' => 'required|string',
            'title' => 'required|string',
            'presentation' => 'required|string',
            'description' => 'required|string',
            'buying_price' => 'required|string',
            'genre' => 'required|string',
            
        ]);*/
dd($book);
      // dd($data);

     
       // $newBook=new Book();
        //$book->isbn=request('isbn');

       // $newBook->title=$book->title;
        
        //$book->presentation=request('presentation');
        /*
        $book->description=request('description');
        $book->buying_price=request('buying_price');
        $book->reading_state=request('reading_state');
        $book->genre=request('genre');

        if ($request->has('photo_principale')) {
            // Get image file
            $image = $request->file('photo_principale');
            // Make a image name based on user name and current timestamp
            $name = \Str::slug($request->input('name')).'_'.time();
            // Define folder path
            $folder = 'storage/books/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $book->photo_principale = $filePath;
           
        }
        */
        $book->user_id=Auth::user()->id;
        $book->save();
        return back();
    }

    public function create(){
        return view('backend/addBook');
    }

    public function delete(Book $book){
        $book->delete();
        session()->flash('suppression', 'Retrait effectué avec succès');

        return back();
    }

    public function update(Request $request,Book $book){
        $book->update($request->all());
        return back();
    }

    public function filter(Request $request){
        $data = $request->only('filter');
        //dd($data);
        $books = null;
        if($data != null){
            if($data['filter']==0){
                $books = Auth::user()->books;
            }else{
                $books = Auth::user()->books->where('reading_state', $data['filter']);
            }
           
        }
        return redirect()->action(
            [BookController::class, 'index']
        );
    }


    public function updateProfile(Request $request)
    {
        // Form validation
        $request->validate([
            'name'              =>  'required',
            'photo_principale'     =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Get current user
        $user = User::findOrFail(auth()->user()->id);
        // Set user name
        $user->name = $request->input('name');

        // Check if a profile image has been uploaded
        if ($request->has('photo_principale')) {
            // Get image file
            $image = $request->file('photo_principale');
            // Make a image name based on user name and current timestamp
            $name = Str::slug($request->input('name')).'_'.time();
            // Define folder path
            $folder = 'books/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $user->photo_principale = $filePath;
        }
        // Persist user record to database
        $user->save();

        // Return user back and show a flash message
        return redirect()->back()->with(['status' => 'Profile updated successfully.']);
    }

    public function deconnexion(){
        auth()->logout();
        return redirect('/');
    }
  

    public function search(){
      
    
      $q=request()->input('q');

      if($q==null){
        return back();
      }else{

     
      /*
      $books=Book::where('title','like',"%$q%")
            ->orWhere('description','like',"%$q%")
            ->paginate(6);*/
            $query = array (

                'q' => $q
            );

           // $result=$this->bookService->getBooks($query)->items;
       
          $books=$this->bookService->getBooks($query)->items;

           // dd($books);
           /*
            $books=collect($result)->map(function($item,$key){
                  
                $book= BookTransformer::toInstance($item->volumeInfo);
                dd($book);
                $book->id=$key;
                return $book;
            });
            */

          //dd($books);
        //dd($books[0]->volumeInfo);
        
    return view('backend/searchBook',compact('books'));
}
    }
/*
    public function getBooks(Request $request)
    {
        $query = array (

            'q' => 'Henry David Thoreau'
        );

        dd($this->bookService->getBooks($query));

    }
    */


    public function addBook(Request $request){

         
       // $newBook=new Book();

       // $newBook->title=$book->title;
        
        
        dd($request);

    }

    public function ajout(Request $request){
        $book=new Book();
        $book->title=request('title');
        $book->thumbnail=request('thumbnail');



        $book->user_id=Auth::user()->id;

        
        //dd($book);
        $book->save();
         
        session()->flash('message', 'Livre ajouté dans votre bibliothèque avec succès !');

        return back();
       // dd($book);
    }
}
