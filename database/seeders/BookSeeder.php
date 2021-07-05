<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;



class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $book=new Book();
        $book->isbn="12345678";
        $book->title="Enfant noir";
        $book->presentation="Roman neuf , 100 pages";
        $book->description="Dans ce roman, Camara Laye parle de sa biographie  "; 
        $book->buying_price="250";
        $book->reading_state="Lu";
        $book->genre="Roman";
        $book->photo_principale="1.jpeg";
        $book->user_id=1;
        $book->save();

        $book=new Book();
        $book->isbn="56781234";
        $book->title="Pere Goriot";
        $book->presentation="Roman un peu usé à la première page , 200 pages";
        $book->description="Dans ce roman, On raconte Eugène de Rastignac  "; 
        $book->buying_price="403,12";
        $book->reading_state="Possède mais pas encore lu";
        $book->genre="Roman";
        $book->photo_principale="2.jpeg";
        $book->user_id=1;
        $book->save();

        $book=new Book();
        $book->isbn="002334455";
        $book->title="Xala";
        $book->presentation="Couverture un peu abimé mais ça va , 335 pages";
        $book->description="Dans ce roman, On raconte Sambène ousmane  "; 
        $book->buying_price="934,15";
        $book->reading_state="Souhaite lire";
        $book->genre="Roman";
        $book->photo_principale="3.jpeg";
        $book->user_id=1;
        $book->save();

        $book=new Book();
        $book->isbn="11112334";
        $book->title="Titeuf";
        $book->presentation="BD tout neuf , 100 pages";
        $book->description="Dans ce BD, On parle du petit titeuf aux cheveux jaune "; 
        $book->buying_price="321,10";
        $book->reading_state="Possède mais pas encore lu";
        $book->genre="BD/Manga";
        $book->photo_principale="4.jpg";
        $book->user_id=1;
        $book->save();
        
        $book=new Book();
        $book->isbn="6666112334";
        $book->title="ihave a dream";
        $book->presentation="Roman tout neuf , 170 pages";
        $book->description="Dans ce roman, On parle de la vie de Martin Luther King "; 
        $book->buying_price="71,10";
        $book->reading_state="Possède mais pas encore lu";
        $book->genre="BD/Manga";
        $book->photo_principale="5.jpeg";
        $book->user_id=2;
        $book->save();
        
        $book=new Book();
        $book->isbn="777112334";
        $book->title="Malcolm X";
        $book->presentation="Roman seconde main , 120 pages";
        $book->description="Dans ce roman, On parle de l'histoire de Malcolme X "; 
        $book->buying_price="91,10";
        $book->reading_state="lu";
        $book->genre="BD/Manga";
        $book->photo_principale="6.jpeg";
        $book->user_id=2;
        $book->save();
        
    
    }
}
