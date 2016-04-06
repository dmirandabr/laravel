<?php

namespace Poc\Http\Controllers\Blog;

use Poc\Http\Controllers\Controller;
use Poc\Services\Feed\StoryFeed;

class BlogController extends Controller
{

    public function story(StoryFeed $storyFeed, $slug)
    {
        $story = $storyFeed->getPostBySlug($slug);

        return view('blog.story', compact('story'));
    }

}
