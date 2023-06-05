<!DOCTYPE html>
<html>
    <head>
        <title>ブログの名前</title>
        <link rel="stylesheet" href="/index.css">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <h2 class="title text-center">ブログの名前</h2>
        <div class="container">
        <form method="POST" action="{{ route('posts.store', $post->id)}}">
            @csrf
            <fieldset>
                <label class="">タイトル</label>
                <input type=text class="form-control" name="post[title]" id="title" value="{{old('post.title')}}">
                <p class="text-danger fw-bold">
                    {{ $errors->first('post.title') }}
                </p>
                <label class="">本文</label>
                <textarea class="form-control" name="post[body]" id="body">{{ old('post.body') }}</textarea>
                <p class="text-danger fw-bold">
                    {{ $errors->first('post.body') }}
                </p>
                <div class="category">
                    <h2>Category</h2>
                    <select name="post[category_id]">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="text-start">
                    <a href="{{ route('posts.index') }}">
                        <button type="button" class="btn btn-primary">投稿一覧へ戻る</button>
                    </a>
                </div>
                <div class="text-end">
                    <a>
                        <button type="submit" class="btn btn-success">登録</button>
                    </a>
                </div>
            </fieldset>
        </form>
        </div>
    </body>
</html>