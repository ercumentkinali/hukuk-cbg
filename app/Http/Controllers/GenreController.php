<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{

public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $genre = Genre::create([
            'name' => $validated['name'],
        ]);
        return redirect()->to('/index/create')->with('success', 'Kitap Türü başarıyla kaydedildi!');
    }
}
