<?php
namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'original_url' => 'required|url',
        ]);

        $shortcode = str()->random(6);

        $link = Link::create(array_merge($validated, ['short_code' => $shortcode]));

        return redirect('/')->with('new_link', $link);

    }

    public function restore($shortcode)
    {
        $link = Link::where('short_code', $shortcode)->firstOrFail();

        return redirect($link->original_url);

    }
}
