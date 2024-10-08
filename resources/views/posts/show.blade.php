@extends('layouts.app')

@section('content')
    
    <div class="card-header">Board</div>
    <div class="card-body">
        @if($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{$message}}
            </div>
        @endif
        
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-title">カテゴリー: {{$post->category->category_name}}</p>
                    <p class="card-title">投稿者: {{$post->user->name}}</p>
                    <p class="card-text">{{$post->content}}</p>
                    <p><img src="{{Storage::url($post->image)}}" class="img-fluid" width="40%" alt=""></p>

                    @if(!isset($search) && !isset($category_id))
                        <a href="{{ url('/')}}?page={{request()->input('page_id')}}"
                        class="btn btn-primary">戻る</a>
                    @endif

                    @if(isset($search))
                        <a href="{{ url('posts/search')}}?search={{request()->input('search')}}&page={{request()->input('page_id')}}"
                        class="btn btn-primary">戻る</a>
                    @endif

                    @if(isset($category_id))
                        <a href="{{ url('/')}}?category_id={{request()->input('category_id')}}&page={{request()->input('page_id')}}"
                        class="btn btn-primary">戻る</a>
                    @endif


                </div>
            </div>

            <div class="p-3">
                <div class="card-title">コメント一覧</div>
                @foreach($comments as $comment)
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">{{$comment->comment}}</p>
                            <p class="card-text">投稿者: 
                            <a href="{{route('users.show', $comment->user->id)}}">{{$comment->user->name}}</a></p>
                        </div>
                    </div>
                @endforeach

                @auth
                <a href="{{ route('comments.create', ['post_id' => $post->id]) }}&page_id={{ request()->input('page_id')}}&page={{ request()->input('page')}}"
                 class="btn btn-primary mt-5">コメントする</a>

                @endauth

                <p style="margin-bottom: 50px;">{!! $comments->links('pagination::bootstrap-5') !!}</p>
            </div>
    </div>
@endsection