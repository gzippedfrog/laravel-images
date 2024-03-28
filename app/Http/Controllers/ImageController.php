<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('images.index', [
            'images' => Image::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('images.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'images' => 'required|array|max:2',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $images = $request->file('images');

        foreach ($images as $image) {
            $name = $this->generateUniqueFileName($image);

            $image->storeAs('public/images', $name);
            Image::create([
                'name' => $name,
            ]);
        }

        return redirect(route('images.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        //
    }

    public function download()
    {
        return response('download');
    }

    private function generateUniqueFileName(UploadedFile $image): string
    {
        $extension = $image->extension();
        $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $name = Str::slug($name);


        if (File::exists(storage_path('app/public/images/' . $name . '.' . $extension))) {
            $i = 1;
            while (File::exists(storage_path('app/public/images/' . $name . '-' . $i . '.' . $extension))) {
                $i++;
            }
            $name .= '-' . $i;
        }

        return $name . '.' . $extension;
    }
}
