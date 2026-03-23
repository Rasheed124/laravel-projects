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
            'short_code'   => 'nullable|alpha_dash|unique:links,short_code',
        ]);

        $shortcode = $validated['short_code'] ?? str()->random(6);

        $link = Link::create([
            'original_url' => $validated['original_url'],
            'short_code'   => $shortcode,
        ]);

        return redirect('/')->with('new_link', $link);
    }

    public function restore($shortcode)
    {
        $link = Link::where('short_code', $shortcode)->firstOrFail();

        $link->increment('clicks');

        return redirect($link->original_url);

    }
}
