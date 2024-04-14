<?php

namespace App\Http\Controllers;

use App\Models\News; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; 


class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('news.index', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $newNews = News::create($request->all());

        return redirect('/news')->with('success', 'News article created successfully!');
    }

    public function show(News $news) 
    {
        return view('news.show', compact('news'));
    }

    public function edit(News $news) 
    {
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, News $news) 
    {
        $validator = Validator::make($request->all(), [
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    
        $news->update($request->all()); // Update existing model
    
        return redirect('/news')->with('success', 'News article updated successfully!');
    }
    
    public function destroy(News $news) 
    {
        $news->delete();

        return redirect('/news')->with('success', 'News article deleted successfully!');
    }

}
