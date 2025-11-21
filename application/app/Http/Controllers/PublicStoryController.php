<?php

namespace App\Http\Controllers;

use App\Models\GeneratedStory;

class PublicStoryController extends Controller
{
    public function show(string $public_id)
    {
        $story = GeneratedStory::where('public_id', $public_id)->firstOrFail();

        return view('stories.public-show', compact('story'));
    }
}