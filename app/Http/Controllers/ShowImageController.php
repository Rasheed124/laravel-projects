<?php
namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ShowImageController extends Controller
{
    public function __invoke(Image $image, Request $request)
    {

        $image->load(['comments', 'comments.user']);
        return view('image-show', compact('image'));
    }
}
