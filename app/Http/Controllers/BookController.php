<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookResource;


class BookController extends Controller
{

    // public function __construct()
    // {
    //     $this->authorizeResource(Book::class, 'book');
    // }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        if(request('sort') === 'asc') {
            $books = Book::oldest();
        }
        else {
            $books = Book::latest();
        }
        

        if(request('search')) {
            $books = $books->search(request('search'));
        }

        if(request('book_type')) {
            $books = $books->type(request('book_type'));
        }

        return view('books.index', [
            'books' => $books->paginate(9)->withQueryString(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show', [
            'book' => $book
        ]);
    }

    public function read(Book $book)
    {
        return view('books.read', [
            'book' => $book
        ]);
    }


}
