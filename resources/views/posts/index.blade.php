@extends('layouts.app')

@section('content')

<div class="card-body">

    <div class="container">
        <div class="row">
            <div class="col-md-6" style="padding: 10px;">
                <h5 class="card-title">検索フォーム</h5>
                    <div id="custom-search-input">
                        <div class="input-group col-md-12">
                            <form action="{{route('posts.search')}}"  method="get" style="display: flex;">
                                @csrf
                                <input type="text" name="search" class="form-control input-lg" placeholder="検索">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-info ">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </span>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
    
    <div class="card-header">Board</div>
    @if(isset($search_result))
        <h5 class="card-title" style="padding: 10px;">{{$search_result}}</h5>
    @endif    
    <div class="card-body">
        @if($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{$message}}
            </div>
        @endif
        
        @foreach($posts as $post)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-title">カテゴリー: <a href="{{ route('posts.index', ['category_id' => $post->category->id]) }}">{{ $post->category->category_name }}</a></p>
                    <p class="card-title">Tag:
                    @foreach($post->tags as $tag) 
                        <a href="{{ route('posts.index', ['tag_name' => $tag->tag_name]) }}">{{ $tag->tag_name }}</a></p>
                    @endforeach
                    <p class="card-title">投稿者: <a href="{{ route('users.show', $post->user->id) }}">{{ $post->user->name }}</a></p>
                    <p class="card-text">{{ $post->content }}</p>
                    <a href="{{route('posts.show', ['post' => $post->id, 'search' => request()->input('search')]) }}&page={{ request()->input('page')}}"
                    class="btn btn-primary">詳細</a>
                </div>
            </div>
        @endforeach
            {!! $posts->links('pagination::bootstrap-5') !!}
    </div>
@endsection