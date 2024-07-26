@extends('layouts.app')

@section('content')
    
    <div class="card-header">Comment</div>
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
                <form action="{{route('comments.store')}}" method="post">
                <input type="hidden" name="post_id" value="{{request()->input('post_id')}}">
                @csrf
                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <textarea name="comment" id="comment" class="form-control" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
            </div>
    </div>
@endsection