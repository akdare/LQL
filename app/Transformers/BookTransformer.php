<?php
namespace App\Transformers;
use App\Models\Book;


class BookTransformer
{

    /**
     * Transform Request to Apidae Form
     * @param array $inputs
     * @return mixed|null
     */

    public static function toInstance($book){
        $newBook = new Book();
        $newBook->fill([
            'title' => $book->title,
            ]);

            return $newBook;
    }
   
     
}