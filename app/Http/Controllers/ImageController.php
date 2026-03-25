<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageRequest;
use App\Models\Media;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;


class ImageController extends Controller
{


    public function create()
    {
        return view('images.create');
    }

    public function store(StoreImageRequest $request)
    {
        $folder = "images/" . date("Y/m");

        foreach ($request->file('images') as $imageFile) {

            $fileName = $this->makeUniqueFileName($imageFile);

            $image = $this->resizeImage($imageFile);

            $path = $folder . '/' . $fileName;

            Storage::disk('public')->put(
                $path,
                (string) $image->encode()
            );

            Media::create([
                'file_name' => $fileName,
                'mime_type' => $imageFile->getMimeType(),
                'size'      => $imageFile->getSize(),
                'path'      => $path,
            ]);
        }

        return to_route('images.index');
    }

    protected function makeUniqueFileName(UploadedFile $imageFile)
    {
        $originalName = $imageFile->getClientOriginalName();

        $info = pathinfo($originalName);

        return Str::slug($info['filename']) . "-" . time() . '.' . $info['extension'];
    }

    protected function resizeImage(UploadedFile $imageFile)
    {
        $manager = new ImageManager(['driver' => 'gd']);

        $image = $manager->make($imageFile->getRealPath());

        $image->resize(
            1200,
            null,
            function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            }
        );

        return $image;
    }

    public function index()
    {
        $media = Media::latest()->get();

        return view('images.index', compact('media'));
    }
}