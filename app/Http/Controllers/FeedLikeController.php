<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Http\Request;

class FeedLikeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function store(Feed $feed, Request $request) {

        if($feed->likedBy($request->user())) {
            return response(null, 409);
        }

        $feed->likes()->create([
            'user_id' => $request->user()->id
        ]);

        return back();
    }

    public function destroy(Feed $feed, Request $request) {

        $request->user()->likes()->where('feed_id', $feed->id)->delete();

        return back();
    }
}
