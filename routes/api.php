
<?php

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator; 

Route::get('/user', function (Request $request) {
  return $request->user();
})->middleware('auth:sanctum');


Route::post('/news', function (Request $request) {
  $validator = Validator::make($request->all(), [
    'title' => 'required|max:255',
    'content' => 'required',
  ]);

  if ($validator->fails()) {
    return response()->json($validator->errors(), 422);
  }

  $newNews = News::create($request->all());

  return response()->json($newNews, 201); 
});


Route::get('/news', function (Request $request) {
  $news = News::all();

  return response()->json($news);
});


Route::get('/news/{id}', function (Request $request, $id) {
  $news = News::find($id);

  if (!$news) {
    return response()->json(['error' => 'News article not found'], 404);
  }

  return response()->json($news);
});


Route::put('/news/{id}', function (Request $request, $id) {
  $validator = Validator::make($request->all(), [
  ]);

  if ($validator->fails()) {
    return response()->json($validator->errors(), 422);
  }

  $news = News::find($id);

  if (!$news) {
    return response()->json(['error' => 'News article not found'], 404);
  }

  $news->update($request->all());

  return response()->json($news);
});


Route::delete('/news/{id}', function (Request $request, $id) {
  $news = News::find($id);

  if (!$news) {
    return response()->json(['error' => 'News article not found'], 404);
  }

  $news->delete();

  return response()->json(['message' => 'News article deleted successfully'], 204); // No content status code
});
