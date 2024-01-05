<?php

namespace App\Http\Controllers;
use App\Models\books;
use Illuminate\Http\Request;
use DB;

class FamousController extends Controller
{
    public function index(){
        $famous = books::paginate(5);

        $books = DB::table('books')
        ->join('categories', 'books.category_id', '=', 'categories.id')
        ->join('authors', 'books.author_id', '=', 'authors.id')
        ->join('ratings', 'books.id', '=', 'ratings.books_id')
        ->groupBy('authors.id', 'authors.authorName')
        ->havingRaw('COUNT(books.voter) > 5')
        ->orderByDesc(\DB::raw('COUNT(books.voter)'))
        ->limit(10)
        ->select('authors.authorName as author_name', \DB::raw('COUNT(books.voter) as voter_count'))
        ->get();

        
        return view('famous',['books' => $books]);

       
    }
}
