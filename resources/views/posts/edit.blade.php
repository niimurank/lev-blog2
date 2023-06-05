<!DOCTYPE html>
<html>
    <head>
        <title>ブログ再編集</title>
        <link rel="stylesheet" href="/index.css">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <h2 class="text-center">ブログ再編集</h2>
            </x-slot>
            <div class="container">
            <form method="POST" action="/posts/{{ $post->id }}">
                @csrf
                @method('PUT')
                <fieldset>
                    <label class="">タイトル</label>
                    <input type=text class="form-control" name="post[title]" id="title" value="{{ $post->title }}">
                    <p class="text-danger fw-bold">
                        {{ $errors->first('post.title') }}
                    </p>
                    <label class="">本文</label>
                    <textarea class="form-control" name="post[body]" id="body">{{ $post->body }}</textarea>
                    <p class="text-danger fw-bold">
                        {{ $errors->first('post.body') }}
                    </p>
                    <div class="row">
                        <div class="col text-start">
                            <a href="{{ route('posts.index') }}">
                                <button type="button" class="bg-primary btn btn-primary">投稿一覧へ戻る</button>
                            </a>
                        </div>
                        <div class="col text-end">
                            <a>
                                <button type="submit" class="bg-success btn btn-success">上書き保存</button>
                            </a>
                        </div>
                    </div>
                </fieldset>
            </form>
            </div>
        </x-app-layout>
    </body>