<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shortlink;
use Str;

class ShortLinkController extends Controller
{
    public function index()
    {
        $latestRecord = Shortlink::latest()->first();
        $shortLinks = Shortlink::latest()->get();
        
        return view('index', compact('shortLinks', 'latestRecord'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required|url'
        ]);

        $input['link'] = $request->link;
        $input['code'] = Str::random(3);

        Shortlink::create($input); 

        return redirect('generate-link')->withSuccess('Shortenlink generated successfully');
    }

    public function shortenLink($code)
    {
        $find = Shortlink::where('code', $code)->first();

        return redirect($find->link);
    }
}
