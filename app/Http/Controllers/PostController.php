<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(){
//        $this->middleware('authCheck2')->only(['create', 'show']);
//        $this->middleware('authCheck2')->except(['index']);
    }

    public function index()
    {
        $posts = Cache::remember('posts-page-'.\request('page', 1), 60*3, function (){
            return Post::with('category')->paginate(5);
        });

//        $posts = Cache::rememberForever('posts', function (){
//            return Post::with('category')->paginate(5);
//        });

        return view('index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
//        $this->authorize('create_post');
        $this->authorize('create', Post::class);
        $categories = Category::all();

        return view('create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        $this->authorize('create_post');
        $this->authorize('create', Post::class);
        $request->validate([
           'image' => ['image', 'required', 'max:2028'],
           'title' => ['required', 'max:255'],
           'category_id' => ['required', 'integer'],
           'description' => ['required'],
        ]);
        $fileName = time().'_'.$request->image->getClientOriginalName();
        $filePath = $request->image->storeAs('uploads', $fileName);

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category_id;
        $post->image = 'storage/'.$filePath;
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);

        return view('show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
//        $this->authorize('edit_post');
        $post = Post::findOrFail($id);
        $this->authorize('create', $post);
        $categories = Category::all();

        return view('edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
//        $this->authorize('edit_post');
        $post = Post::findOrFail($id);
        $this->authorize('create', $post);

        $request->validate([
            'title' => ['required', 'max:255'],
            'category_id' => ['required', 'integer'],
            'description' => ['required'],
        ]);

        if($request->hasFile('image')){
            $request->validate([
                'image' => ['image', 'required', 'max:2028'],
            ]);

            $fileName = time().'_'.$request->image->getClientOriginalName();
            $filePath = $request->image->storeAs('uploads', $fileName);
            File::delete(public_path($post->image));
            $post->image = 'storage/'.$filePath;
        }

        $post->title = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category_id;
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
//        $this->authorize('delete_post');
        $post = Post::findOrFail($id);
        $this->authorize('delete', $post);
        $post->delete();

        return redirect()->route('posts.index');
    }

    public function trashed(){
        $this->authorize('delete_post');
        $posts = Post::onlyTrashed()->paginate(5);

        return view('trashed', compact('posts'));
    }

    public function restore($id){
        $this->authorize('delete_post');
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->restore();

        return redirect()->back();
    }

    public function forceDelete($id){
        $this->authorize('delete_post');
        $post = Post::onlyTrashed()->findOrFail($id);
        File::delete(public_path($post->image));
        $post->forceDelete();

        return redirect()->back();
    }
}
