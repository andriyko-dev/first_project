<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::where('is_published', 1)->get();
        foreach ($posts as $post) {
            dump($post->title);
        }
        dd('end');
    }

    public function create() {
        $postsArr = [
            [
                'title' => 'title4',
                'content' => 'content4',
                'image' => 'image4',
                'likes' => 20,
                'is_published' => 1,
            ],
            [
                'title' => 'title5',
                'content' => 'content5',
                'image' => 'image5',
                'likes' => 50,
                'is_published' => 1,
            ],
        ];

        foreach ($postsArr as $item) {
            Post::create($item);
        }
        dd('created');
    }

    public function update() {
        $post = Post::find(6);

        $post->update([
            'title' => 'updated title',
            'content' => 'updated content',
        ]);
        dd($post->title);
    }

    public function delete() {
        /*$post = Post::find(2);
        $post->delete();*/
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd('deleted');
    }

}
