<?php

namespace App\Http\Controllers;

use App\Models\Magazine;
use App\Http\Requests\StoreMagazineRequest;
use App\Http\Requests\UpdateMagazineRequest;
use App\Http\Resources\BookResource;
use App\Http\Resources\MagazineResource;
use App\Models\Book;
use App\Traits\BookTrait;
use Illuminate\Http\Request;

class MagazineController extends Controller
{

    use BookTrait;

    // public function __construct()
    // {
    //     $this->authorizeResource(Magazine::class, 'magazine');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd(Magazine::find(1));
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
     * @param  \App\Http\Requests\StoreMagazineRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMagazineRequest $request)
    {
        $validated = $request->validated();
        $filePath = BookTrait::storeFile($request, class_basename(Magazine::class));
        $imagePath = BookTrait::storeImage($request, class_basename(Magazine::class));

        $validated += [
            'author' => null,
            'category' => null,
        ];

        $book = BookTrait::createBook($validated, $imagePath, $filePath);


        $magazine = Magazine::create([
            'book_id' => $book->id,
            'issn' => $validated['issn'],
        ]);

        return redirect('/dashboard/books')->with('success', 'Magazine has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Magazine  $magazine
     * @return \Illuminate\Http\Response
     */
    public function show(Magazine $magazine)
    {
        
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMagazineRequest  $request
     * @param  \App\Models\Magazine  $magazine
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMagazineRequest $request, Book $book)
    {
        $validated = $request->validated();
        $filePath = BookTrait::updateFile($request, $book, class_basename(Magazine::class));
        $imagePath = BookTrait::updateImage($request, $book, class_basename(Magazine::class));

        $attrib = [
            'issn' => $validated['issn'],
        ];

        BookTrait::updateBook($book->id, $validated, $imagePath ?? $request->oldImage, $filePath ?? $request->oldFile);
        Magazine::where('book_id', $book->id)->update($attrib);

        return redirect('/dashboard/books')->with('success', 'Magazine has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Magazine  $magazine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Magazine $magazine)
    {
        //
    }

    public function showToken()
    {
        echo csrf_token();
    }
}
