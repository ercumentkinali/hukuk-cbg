<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
        ]);

        $author = Author::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
        ]);
        return redirect()->to('/index/create')->with('success', 'Yazar başarıyla kaydedildi!');
    }
}

