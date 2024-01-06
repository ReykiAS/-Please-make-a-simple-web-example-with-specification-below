<?php

namespace App\Http\Controllers;
use App\Models\books;
use Illuminate\Http\Request;
use DB;

class BooksController extends Controller
{
    public function index(){
        $books = books::paginate(5);

        $books = DB::table('books')
        ->join('categories', 'books.category_id', '=', 'categories.id')
        ->join('authors', 'books.author_id', '=', 'authors.id')
        ->join('ratings', 'books.id', '=', 'ratings.books_id')
        ->groupBy('books.id', 'books.title', 'books.category_id', 'categoryName', 'authorName','books.author_id','books.rating_id','books.voter','books.created_at','books.updated_at')
        ->select('books.*', 'categoryName as category_name', 'authorName as author_name',\DB::raw('ROUND(AVG(ratings.rating), 2) as average_rating'))
        
        
        ->orderByDesc('average_rating')
        ->limit(1000)
        ->get();

        
        return view('welcome',['books' => $books]);

       
    }

}
