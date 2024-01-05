<?php

namespace App\Http\Controllers;
use App\Models\books;
use App\Models\authors;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index()
{
    $authors = authors::all();
    $books = $this->getBooks(); 

    return view('books.index', compact('books', 'authors'));
}

public function filterBooksByAuthor($authorId)
{
    $books = $this->getBooks($authorId); 

    return response()->json($books);
}
public function giveRating(Request $request)
{
    $request->validate([
        'book_id' => 'required|exists:books,id',
        'rating' => 'required|integer|min:1|max:10',
    ]);

    $bookId = $request->input('book_id');
    $rating = $request->input('rating');

    DB::table('ratings')->updateOrInsert(
        ['books_id' => $bookId],
        ['rating' => $rating]
    );

    Books::where('id', $bookId)->increment('voter');
    

    return response()->json(['success' => true]);
}
private function getBooks($authorId = null)
{
    $query = DB::table('books')
        ->join('authors', 'books.author_id', '=', 'authors.id')
        ->join('ratings', 'books.id', '=', 'ratings.books_id')
        ->groupBy('books.id', 'books.title', 'books.category_id', 'authorName', 'books.author_id', 'books.rating_id', 'books.voter', 'books.created_at', 'books.updated_at')
        ->select('books.*', 'authorName as author_name');

    if ($authorId !== null) {
        $query->where('authors.id', $authorId);
    }

    return $query->get();
}
}
