<?php

namespace Poc\Http\Controllers;

use Poc\Services\Feed\StoryFeed as StoryFeed;

class HomeController extends Controller
{

    public function index(StoryFeed $storyFeed)
    {
        $stories = $storyFeed->getLatestPosts(4);

        return view('home.index', compact('stories'));
    }

}
