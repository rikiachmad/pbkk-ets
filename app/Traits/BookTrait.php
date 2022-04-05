<?php

namespace App\Traits;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait BookTrait {
    public static function createBook($request, $imagePath = null, $filePath = null)
    {
        return Book::create([
            'name' => $request['name'],
            'slug' => $request['slug'],
            'book_type' => $request['book_type'],
            'image' => $imagePath,
            'author' => $request['author'],
            'category' => $request['category'],
            'publisher' => $request['publisher'],
            'year_published' => $request['year_published'],
            'description' => $request['description'],
            'link' => $filePath
        ]);
    }

    public static function updateBook($id, $validated, $imagePath, $filePath) {
        $attrib = [
            'name' => $validated['name'],
            'slug' => $validated['slug'],
            'image' => $imagePath,
            'author' => $validated['author'] ?? '',
            'category' => $validated['category'] ?? '',
            'publisher' => $validated['publisher'],
            'year_published' => $validated['year_published'],
            'description' => $validated['description'],
            'link' => $filePath
        ];

        Book::where('id', $id)->update($attrib);
    }

    public static function storeFile(Request $request, $type)
    {
        $file = $request->file('file');
        if($file) {
            // $path = $file->storeAs(Str::lower($type) . '/' . $request->slug, $request->slug . '.' . $file->extension());
            $path = $file->store($type, 'public_uploads');
            return $path;
        }

        return null;
        
    }

    public static function updateFile(Request $request, Book $book, $type)
    {

        $file = $request->file('file');
        if($file) {
            if($request->oldFile) {
                Storage::delete($request->oldFile);
            }

            $path = $file->store($type, 'public_uploads');
            return $path;
        }

        return null;
        
    }

    

    public static function storeImage(Request $request, $type)
    {
        $image = $request->file('image');

        if($image) {
            // $path = $image->storeAs(Str::lower($type) . '/' . $request->slug, $request->slug . '.' . $image->extension());
            $path = $image->store($type, 'public_uploads');
            return $path;
        }

        return null;
        
    }

    public static function updateImage(Request $request, Book $book, $type)
    {

        $image = $request->file('image');

        if($image) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $path = $image->store($type);
            return $path;
        }

        return null;
        
    }
}

?>