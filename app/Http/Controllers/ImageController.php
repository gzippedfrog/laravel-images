<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image as InterventionImage;
use ZipArchive;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $images = match ($request->input('sort')) {
            'name_asc' => Image::orderBy('name', 'asc'),
            'name_desc' => Image::orderBy('name', 'desc'),
            'date_asc' => Image::oldest(),
            'date_desc' => Image::latest(),
            default => Image::latest(),
        };

        return view('images.index', [
            'images' => $images->get(),
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
        $validatedData = $request->validate([
            // TODO: change max value to 5
            'images'   => 'required|array|max:2',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $images = $request->file('images');

        foreach ($images as $image) {
            $name = $this->generateUniqueFileName($image);

            $image->storeAs('public/images', $name);

            $thumbnail_path = 'public/images/thumbnails';

            if (!Storage::exists($thumbnail_path)) {
                Storage::makeDirectory($thumbnail_path);
            }

            $thumbnail = InterventionImage::read($image->getRealPath());
            $thumbnail->scale(150, 150)
                ->save(storage_path('app/' . $thumbnail_path) . '/thumb_' . $name);

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

    public function download(Request $request)
    {
        $validated = $request->all();
        dd($validated);

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
