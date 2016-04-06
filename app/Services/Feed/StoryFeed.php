<?php

namespace Poc\Services\Feed;

use Concat\Http\Handler\CacheHandler;
use Doctrine\Common\Cache\FilesystemCache;
use GuzzleHttp\Client;

class StoryFeed
{

    protected $baseUri = 'http://ec2-54-69-58-248.us-west-2.compute.amazonaws.com/wp-json/wp/v2/';

    protected function getResponse($uri)
    {
        $cacheProvider = new FilesystemCache(base_path('storage/framework/cache/guzzle'));

        $handler = new CacheHandler($cacheProvider, null, [
            'methods' => ['GET', 'HEAD', 'OPTIONS'],
            'expire' => 28800,
            'filter' => null,
        ]);

        $client = new Client(['base_uri' => $this->baseUri, 'handler' => $handler]);

        $response = $client->get($uri);

        return (string)$response->getBody();
    }

    public function getLatestPosts($max = 4)
    {
        $finalPosts = [];
        $posts = json_decode($this->getResponse('posts/?per_page=' . $max));

        foreach($posts as $post) {
            $finalPosts[] = [
                'title' => $post->title->rendered,
                'excerpt' => strip_tags(trim($post->excerpt->rendered)),
                'feature_image' => $this->getMediaUrl($post->featured_media),
                'link' => $post->link,
                'slug' => $post->slug
            ];
        }

        return $finalPosts;
    }

    public function getMediaUrl($id)
    {
        if ($id > 0) {
            $featuredMedia = json_decode($this->getResponse('media/' . $id));
        }

        return $featuredMedia->guid->rendered ?? null;
    }

    public function getPostBySlug($slug)
    {
        $posts = json_decode($this->getResponse('posts/?per_page=1&slug=' . $slug));

        if (isset($posts[0])) {
            return [
                'title' => $posts[0]->title->rendered,
                'excerpt' => $posts[0]->excerpt->rendered,
                'content' => $posts[0]->content->rendered,
                'link' => $posts[0]->link,
                'date' => $posts[0]->date,
                'author' => $this->getAuthor($posts[0]->author)
            ];
        }

        return [];
    }

    public function getAuthor($id)
    {
        $author = json_decode($this->getResponse('users/' . $id));

        return $author ? array_only((array)$author, ['name', 'slug', 'description']) : [];
    }

}
