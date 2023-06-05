<!DOCTYPE html>
<html>
<head>
    <title>ブログ一覧</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<head>
<body>
	<x-app-layout>
		<x-slot name="header">
			<h2 class="text-center">ブログ一覧</h2>
		</x-slot>
    <div class="container">
	    <div class="">
    	@foreach ($posts as $post)
	    <div class="card m-5">
	    	<h4 class="text-center card-header">{{$post->title}}</h4>
	    	<div class="card-body">
	            <p class="card-text">{{$post->body}}</p4>
	            <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
	            <div class="row">
	                <div class="col-2">
	                    <a href="{{ route('posts.edit',[$post->id]) }}">
	            	        <button type="button" class="btn btn-secondary-subtle bg-secondary">編集</button>
	            	    </a>
	                </div>
	            	<div class="col-2">
	            		<form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
	            			@csrf
	            		    @method('DELETE')
	            			<button type="button" class="text-dark bg-danger btn btn-danger" onclick="deletePost({{ $post->id }})">削除</button>
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
	    {{ Auth::user()->name }}
	</div>
	<a href=' {{ route('posts.create') }}'>
	    <button type="button" class="btn btn-primary bg-primary">作成</button>
	</a>
	<div class="paginate">
	    {{ $posts->links() }}
	</div>
		<div class="text-white">
			<h3 class="text-dark">↓テストで作成したAPIを使用した記事表示欄↓</h1>
	        @foreach($questions as $question)
	            <a href="https://teratail.com/questions/{{ $question['id'] }}" class="text-dark">
	            <div>{{ $question['title'] }}</div>
	            </a>
	        @endforeach
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
    </x-app-layout>
</body>
</html>
