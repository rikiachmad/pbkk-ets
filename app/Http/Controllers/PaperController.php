<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use App\Http\Requests\StorePaperRequest;
use App\Http\Requests\UpdatePaperRequest;
use App\Models\Book;
use App\Traits\BookTrait;

class PaperController extends Controller
{
    use BookTrait;
    
    public function __construct()
    {
        $this->authorizeResource(Paper::class, 'paper');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorePaperRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaperRequest $request)
    {
        // dd($request);
        $validated = $request->validated();
        $filePath = BookTrait::storeFile($request, class_basename(Paper::class));
        $imagePath = BookTrait::storeImage($request, class_basename(Paper::class));

        $validated += [
            'author' => null,
            'category' => null,
        ];

        $book = BookTrait::createBook($validated, $imagePath, $filePath);


        $paper = Paper::create([
            'book_id' => $book->id,
            'doi' => $validated['doi'] ?? '',
        ]);

        return redirect('/dashboard/books')->with('success', 'Paper has been added');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaperRequest  $request
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaperRequest $request, Book $book)
    {
        $validated = $request->validated();
        $filePath = BookTrait::updateFile($request, $book, class_basename(Paper::class));
        $imagePath = BookTrait::updateImage($request, $book, class_basename(Paper::class));

        $attrib = [
            'doi' => $validated['doi'] ?? '',
        ];

        BookTrait::updateBook($book->id, $validated, $imagePath ?? $request->oldImage, $filePath ?? $request->oldFile);
        Paper::where('book_id', $book->id)->update($attrib);

        return redirect('/dashboard/books')->with('success', 'Paper has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paper  $paper
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paper $paper)
    {
        //
    }
}
