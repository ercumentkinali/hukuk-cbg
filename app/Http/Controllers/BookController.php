<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
    $books = Book::all();
    $books->transform(function ($book) {
        $book->publish_date = Carbon::parse($book->publish_date)->format('Y');
        return $book;
    });

    return view('index.default', compact('books'));
    }
    public function search(Request $request)
    {
    $books=Book::all();
    $search = $request->input('search');
    $perPage = $request->input('per_page', 10);
    $books = Book::where('name', 'like', "%{$search}%")
        ->orWhereHas('author', function ($query) use ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhereRaw("CONCAT(first_name, ' ', last_name) like ?", ["%{$search}%"]);
            });
        })
        ->paginate($perPage);
        $books->transform(function ($book) {
            $book->publish_date = Carbon::parse($book->publish_date)->format('Y');
            return $book;
        });
    return view('index.default', compact('books', 'search'));
    }
    public function filter(Request $request)
    {
    $books=Book::all();
    $orderBy = $request->input('order_by', 'id');
    $sort = $request->input('sort', 'asc');
    $perPage = $request->input('per_page', 10);

    $books = Book::orderBy($orderBy, $sort)
                 ->paginate($perPage);

    $books->getCollection()->transform(function ($book) {
        $book->publish_date = Carbon::parse($book->publish_date)->format('Y');
        return $book;
    });

    return view('index.default', compact('books', 'sort', 'orderBy'));
    }
    public function show($id)
    {
        $publish_date = Carbon::today()->toDateString();
        $publish_date = Carbon::parse($publish_date)->format('d.m.Y');
        $book = Book::findOrFail($id);
        $bookDetails = [
            'Kitap İsmi' => $book->name,
            'Kitap Numarası' => $book->id,
            'Bulunduğu Oda' => $book->room,
            'Bulunduğu Raf' => $book->shelf,
            'Bulunduğu Sıra' => $book->row,
            'Kitap Türü' => $book->genre->name,
            'Yazar Adı' => $book->author ? $book->author->first_name . ' ' . $book->author->last_name : 'N/A',
            'Yayınlanma Tarihi' => Carbon::parse($book->publish_date)->format('d/m/Y'),
        ];
        return view('detail.default', compact('book', 'bookDetails',));
    }

    // public function update(Request $request, $id)
    // {
    //     $validated = $request->validate([
    //         'room' => 'required|string|max:255',
    //         'shelf' => 'required|string|max:255',
    //         'row' => 'required|string|max:255',
    //         'genre' => 'required|string|max:255',
    //         'author_name' => 'nullable|string|max:255',
    //         'publish_date' => 'nullable|date',
    //     ]);

    //     $book = Book::findOrFail($id);
    //     $book->update([
    //         'room' => $validated['room'],
    //         'shelf' => $validated['shelf'],
    //         'row' => $validated['row'],
    //         'genre' => $validated['genre'],
    //         'author_name' => $validated['author_name'],
    //         'publish_date' => $validated['publish_date'],
    //     ]);
    //     return redirect()->route('books.show', $id)->with('success', 'Kitap başarıyla güncellendi');
    // }
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Kitap başarıyla silindi');
    }
    public function create()
    {
        $genres = Genre::all();
        $authors = Author::all();
        return view('create.default', compact('authors','genres'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'room' => 'required|string|max:255',
            'shelf' => 'required|string|max:255',
            'row' => 'required|string|max:255',
            'genre_id' => 'required|exists:genres,id',
            'author_id' => 'nullable|exists:authors,id',
            'publish_date' => 'nullable|date',
        ]);

        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Kitap başarıyla eklendi.');
    }
}
