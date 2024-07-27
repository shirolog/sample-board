<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $category_id = request()->input('category_id');

        if($category_id){
            
            $posts= Post::where('category_id', $category_id)
            ->with('category', 'user')
            ->latest()
            ->paginate(3)
            ->withQueryString();// クエリパラメータを引き継ぐ

            return view('posts.index', compact('posts', 'category_id'));
        }else{
            $posts = Post::with('category', 'user')->paginate(3);
            return view('posts.index', compact('posts'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
 
        $post = new Post;

        $post-> user_id = Auth::user()->id;
        $post-> category_id = $request-> input('category_id');
        $post-> title = $request->input('title');
        $post-> content = $request->input('content');
        $post->save();

        return redirect()->route('posts.index')
        ->with('success', 'メッセージを投稿しました');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {   
        $post->load('category', 'user', 'comments');
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }

    public function search(Request $request)
    {
        $request->validate([

            'search' => 'required',
        ]);

        
        $posts = Post::Where('title', 'like' ,"%{$request->search}%")
        ->orWhere('content', 'like' ,"%{$request->search}%")
        ->paginate(3)
        ->withQueryString();
        $search_result = $request->search. 'の検索結果'. $posts->total(). '件';

        return view('posts.index', compact('posts', 'search_result'))
        ->with('search', $request->search);
    }
}
