<!DOCTYPE html>
<html>
    <head>
        <title>ブログの名前</title>
        <link rel="stylesheet" href="/index.css">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <h2 class="text-center">ブログの名前</h2>
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
                            <button type="button" class="btn btn-primary">投稿一覧へ戻る</button>
                        </a>
                    </div>
                    <div class="col text-end">
                        <a>
                            <button type="submit" class="btn btn-success">上書き保存</button>
                        </a>
                    </div>
                </div>
            </fieldset>
        </form>
        </div>
    </body>