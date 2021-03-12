<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function index() {

        $feeds = Feed::with(['user', 'likes'])->latest()->paginate(20);

        return view('feeds/index', [
            'feeds' => $feeds,
        ]);
    }

    public function store(Request $request) {

        $this->validate($request, [
            'body' => 'required|max:255',
        ]);

        $request->user()->feeds()->create($request->only('body'));

        return back();
    }

    public function destroy(Feed $feed) {

        $feed->delete();
        return back();
    }
}
