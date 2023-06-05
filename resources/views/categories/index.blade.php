<!DOCTYPE html>
<html>
<head>
    <title>ブログの名前</title>
    <link rel="stylesheet" href="/index.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<head>
<body>
    <h2 class="text-center">ブログの名前</h2>
    <div class="container">
    	@foreach ($posts as $post)
	    <div class="card m-5">
	    	<h4 class="text-center card-header">{{$post->title}}</h4>
	    	<div class="card-body">
	            <p class="card-text">{{$post->body}}</p4>
	            <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
	            <div class="row">
	                <div class="col-2">
	                    <a href="{{ route('posts.edit',[$post->id]) }}">
	            	        <button type="button" class="btn btn-secondary">編集</button>
	            	    </a>
	                </div>
	            	<div class="col-2">
	            		<form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
	            			@csrf
	            		    @method('DELETE')
	            			<button class="btn btn-danger" type="button" onclick="deletePost({{ $post->id }})">削除</button>
	            		</form>
	            	</div>
	                <div class="col text-end">
	                    <a href="/posts/{{ $post->id}}" class="btn btn-primary">
	                    <button type="button" class="btn btn-primary">詳細</button>
	                    </a>
	                </div>
	            </div>
	        </div>
	    </div>
	    @endforeach
	</div>
	<a href=' {{ route('posts.create') }}'>
	    <button type="button" class="btn btn-primary">作成</button>
	</a>
	<div class="paginate">
	    {{ $posts->links() }}
	</div>
    <script>
    function deletePost(id) {
    	'use strict'
    	console.log(id);
    	if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
    		document.getElementById(`form_${id}`).submit();
    	}
    }
    </script>
</body>
</html>