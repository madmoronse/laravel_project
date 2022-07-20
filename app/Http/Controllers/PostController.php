<?php

namespace App\Http\Controllers;

use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('is_published', 1)->get();
        foreach ($posts as $post) {
            dump($post->title);
        }
    }
    public function create()
    {
        $postsArr = [
            [
                'title' => 'Заголовок поста №4',
                'content' => 'Текст поста №4',
                'image' => 'image3',
                'likes' => '36',
                'is_published' => '1',
            ],
            [
                'title' => 'Заголовок поста №5',
                'content' => 'Текст поста №5',
                'image' => 'image4',
                'likes' => '39',
                'is_published' => '0',
            ]
        ];

        foreach ($postsArr as $item) {
            dump($item);
            Post::create($item);
        }



        dd('created');
    }
    public function update()
    {
        $post = Post::find(4);

        $post->update([
            'title' => 'Заголовок поста №5 (upd)',
            'content' => 'Текст поста №5 (upd)',
            'image' => 'image4 (upd)',
            'likes' => '45',
            'is_published' => '0',
        ]);
    }

    public function delete()
    {
        $post = Post::find(5);

        $post->delete();
    }

    public function firstOrCreate()
    {
        $post = Post::find(1);

        $anotherPost = [
            'title' => 'Заголовок поста firstOrCreate',
            'content' => 'Текст поста firstOrCreate',
            'image' => 'image4',
            'likes' => 665,
            'is_published' => '0',
        ];

        $myPost = Post::firstOrCreate(
            [
                'title' => 'Заголовок поста firstOrCreate'
            ],
            [
                'title' => 'Заголовок поста firstOrCreate',
                'content' => 'Текст поста firstOrCreate',
                'image' => 'image4',
                'likes' => 665,
                'is_published' => '0'
            ]
        );

        dump($myPost->content);
        dd('finished');
    }

    public function updateOrCreate()
    {
        $anotherPost = [
            'title' => 'Заголовок поста UpdateOrCreate',
            'content' => 'Текст поста UpdateOrCreate',
            'image' => 'image4',
            'likes' => 665,
            'is_published' => '0',
        ];

        $myPost = Post::updateOrCreate(
            [
                'title' => 'Заголовок поста New',
            ],
            [
                'title' => 'Заголовок поста New',
                'content' => 'Текст поста UpdateOrCreate',
                'image' => 'image4',
                'likes' => 665,
                'is_published' => '0'
            ]
        );

        dump($myPost->content);
        dd('finish');
    }
}
