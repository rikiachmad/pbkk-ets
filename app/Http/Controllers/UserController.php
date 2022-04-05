<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function show(User $user)
    {
        $loadedUser = $user->load('bookmark');
        $bookmarks = $loadedUser->bookmark();
        $type = request('type') ?? 'magazine';

        $bookmarks = $bookmarks->type($type);

        return view('profile', [
            'user' => $loadedUser,
            'bookmarks' => $bookmarks->paginate(3)->withQueryString(),
        ]);
    }
}
