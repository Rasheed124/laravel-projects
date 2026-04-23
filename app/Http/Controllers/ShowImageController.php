<?php
namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ShowImageController extends Controller
{
    public function __invoke(Image $image, Request $request)
    {

        $image->load(['comments' => function ($query) {
            $query->approved();
        }, 'comments.user']);

        $disableComments = $image->user->setting->disable_comments;

        if (! $disableComments) {
            $image->load(['comments' => function ($query) {
                $query->approved();
            }, 'comments.user']);
        }
        return view('image-show', compact('image', 'disableComments'));
    }
}
