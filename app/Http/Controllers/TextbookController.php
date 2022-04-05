<?php

namespace App\Http\Controllers;

use App\Models\Textbook;
use App\Http\Requests\StoreTextbookRequest;
use App\Http\Requests\UpdateTextbookRequest;
use App\Models\Book;
use App\Traits\BookTrait;

class TextbookController extends Controller
{
    use BookTrait;
    // public function __construct()
    // {
    //     $this->authorizeResource(Textbook::class, 'textbook');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTextbookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTextbookRequest $request)
    {
        $validated = $request->validated();
        $filePath = BookTrait::storeFile($request, class_basename(Textbook::class));
        $imagePath = BookTrait::storeImage($request, class_basename(Textbook::class));

        $book = BookTrait::createBook($validated, $imagePath, $filePath);

        $magazine = Textbook::create([
            'book_id' => $book->id,
            'isbn' => $validated['isbn'],
            'edition' => $validated['edition']
        ]);

        return redirect('/dashboard/books')->with('success', 'Textbook has been added');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTextbookRequest  $request
     * @param  \App\Models\Textbook  $textbook
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTextbookRequest $request, Book $book)
    {
        $validated = $request->validated();
        $filePath = BookTrait::updateFile($request, $book, class_basename(Textbook::class));
        $imagePath = BookTrait::updateImage($request, $book, class_basename(Textbook::class));

        $attrib = [
            'isbn' => $validated['isbn'],
            'edition' => $validated['edition']
        ];

        BookTrait::updateBook($book->id, $validated, $imagePath ?? $request->oldImage, $filePath ?? $request->oldFile);
        Textbook::where('book_id', $book->id)->update($attrib);

        return redirect('/dashboard/books')->with('success', 'Textbook has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Textbook  $textbook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Textbook $textbook)
    {
        //
    }
}
