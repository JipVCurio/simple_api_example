<?php

namespace App\Http\Controllers\Api;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiBookController extends Controller
{
    public function index() {
        return response()->json(Book::all()->toResourceCollection());
    }

    public function show($id) {
        return response()->json(Book::findOrFail($id)->toResource());
    }

    public function store(Request $request): JsonResponse {
        $validated = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'publishing_date' => 'required',
        ]);

        $book = Book::create([
            'title' => $validated['title'],
            'author' => $validated['author'],
            'description' => $validated['description'],
            'publishing_date' => $validated['publishing_date'],
        ]);

        return response()->json($book->toResource());
    }

    public function destroy($id) {
        $book = Book::findOrFail($id);
        $book->delete();
        
        return response()->json("{$book->title} has been destroyed. You heretic!");
    }
}
