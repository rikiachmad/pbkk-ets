<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Http\Requests\StoreBookmarkRequest;
use App\Http\Requests\UpdateBookmarkRequest;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{

    // public function __construct()
    // {
    //     $this->authorizeResource(Bookmark::class, 'bookmark');
    // }

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
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookmarkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookmarkRequest $request)
    {
        $validated = $request->validated();
        
        if(Bookmark::isExist($request->book_id, auth()->user()->id)) {
            $bookmark = Bookmark::where('book_id', '=', $request->book_id)->where('user_id', auth()->user()->id)->get();
            Bookmark::destroy($bookmark);
        }

        Bookmark::create([
            'user_id' => auth()->user()->id,
            'book_id' => $request->book_id,
            'page' => $validated['page'],
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function show(Bookmark $bookmark)
    {
        $book = $bookmark->load('book')->book;
        // return view('books.read', [
        //     'book' => $book,
        //     'page' => $bookmark->page,
        // ]);

        return redirect('/books/' . $book->slug . '/read')->with('bookmark', $bookmark->page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookmarkRequest  $request
     * @param  \App\Models\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookmarkRequest $request, Bookmark $bookmark)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bookmark  $bookmark
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bookmark $bookmark)
    {
        Bookmark::destroy($bookmark->id);

        return redirect()->back()->with('success', 'Bookmark has been deleted');
    }
}
