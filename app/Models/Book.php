<?php

namespace App\Models;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;


    protected $table = 'books';
    protected $fillable = [
        'name',
        'room',
        'shelf',
        'row',
        'genre_id',
        'author_id',
        'publish_date',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);

    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
