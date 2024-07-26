@extends('layouts.app')

@section('content')
    
    <div class="card-header">Board</div>
    <div class="card-body">
        @if($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{$message}}
            </div>
        @endif
        
        @foreach($posts as $post)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-title">カテゴリー: <a href="{{route('posts.index', ['category_id' => $post->category->id])}}">
                     {{$post->category->category_name}}</a></p>
                     <p class="card-title">投稿者: <a href="{{route('users.show',  $post->user->id)}}">
                    {{$post->user->name}}</a></p>
                    <p class="card-text">{{$post->content}}</p>
                    <a href="{{route('posts.show', $post->id)}}" class="btn btn-primary">詳細</a>
                </div>
            </div>
        @endforeach
        {!!$posts->links('pagination::bootstrap-5')!!}
    </div>
@endsection