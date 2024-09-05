<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class SongsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all songs from the database
        $songs = Song::all();

        // Return the songs to the view 'songs.index'
        return view('songs.index', compact('songs'));
    }

    /**
     * Store a newly created song in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',


            'description' => 'nullable|string',
            'image_url' => 'required|url'
        ]);

        // Lấy dữ liệu từ request
        $title = $validatedData['title'];
        $description = $validatedData['description'];
        $imageUrl = $validatedData['image_url'];

        // Tải hình ảnh từ URL và lưu vào storage
        $imageContent = Http::get($imageUrl)->body();
        $imageName = basename($imageUrl);
        $path = 'public/images/' . $imageName;
        Storage::put($path, $imageContent);

        // Tạo bản ghi mới trong bảng songs


        $song = new Song();
        $song->title = $title;


        $song->description = $description;


        $song->image = $path;
        $song->save();

        return redirect()->route('page.songs')->with('success', 'Song added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
