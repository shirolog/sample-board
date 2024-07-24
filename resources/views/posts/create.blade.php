@extends('layouts.app')

@section('content')
    
    <div class="card-header">Board</div>
    <div class="card-body">
        @if($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{$message}}
            </div>
        @endif
        
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                <form action="{{route('posts.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="title">
                    </div>
                    
                    <div class="form-group">
                        <label for="category">category</label>
                        <select name="category_id" id="category" class="form-control">
                            <option selected>選択する</option>
                            <option value="1">book</option>
                            <option value="2">cafe</option>
                            <option value="3">travel</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="content">Comment</label>
                        <textarea name="content" id="content" class="form-control" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
            </div>
    </div>
@endsection