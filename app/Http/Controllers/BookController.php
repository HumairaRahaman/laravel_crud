<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\Book;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Book::query()->paginate(20);
        return  Inertia::render('books', [
            'data' => $data
        ]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        Validator::make($request->all(),[
            'title' => 'required',
            'author' => 'required'

        ])->validate();

        Book::create($request->all());
        return redirect()->back()
            ->with('message', 'Book created');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateBookRequest $request
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\RedirectResponse
     * @throws ValidationException
     */
    public function update(UpdateBookRequest $request, Book $book): \Illuminate\Http\RedirectResponse
    {
        Validator::make($request->all(),[
            'title' => 'required',
            'author' => 'required'

        ])->validate();

        $book->update($request->all());

        return redirect()->back()
            ->with('message', 'Book updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Book $book): \Illuminate\Http\RedirectResponse
    {
        $book->delete();
        return redirect()->back()
            ->with('message', 'Book Deleted');
    }

    public function count(int $int)
    {
    }
}
