<!DOCTYPE html>
<html>
    <head>
        <title>ブログ投稿サイト</title>
        <link rel="stylesheet" href="/index.css">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <h2 class="text-center">ブログ一覧</h2>
            </x-slot>
            <div class="container">
                <div class="card m-5">
                    <h4 class="card-header text-center">{{$post->title}}</h4>
                    <p class="card-body">{{$post->body}}</p>
                    <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                </div>
                <div class="row">
                    <div class="col text-start">
                        <a href=" {{ url('/posts') }}">
                            <button type="button" class="bg-primary btn btn-primary justify-right" >投稿一覧へ戻る</button>
                        </a>
                    </div>
                    <div class="col text-end">
                        <a href=' {{ route('posts.edit' ,[$post->id]) }} '>
                            <button type="button" class="bg-secondary btn btn-secondary justify-right">編集を行う</button>
                        </a>
                    </div>
                </div>
            </div>
        </x-app-layout>
    </body>