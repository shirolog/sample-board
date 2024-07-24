@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
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
                                <p class="card-title">カテゴリー: {{$post->category->category_name}}</p>
                                <p class="card-title">投稿者: {{$post->user->name}}</p>
                                <p class="card-text">{{$post->content}}</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection