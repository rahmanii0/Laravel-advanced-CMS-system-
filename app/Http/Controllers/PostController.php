<?php

namespace App\Http\Controllers;
use App\Category;
use App\Post;
use App\Tag;
use Session;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\This;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin.posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        if(!$this->isThereCategory($categories)){
            return redirect()->back();

            Session::flash('info','you must choose category to create a post');
        }
        return view('admin.posts.create')->with('categories',$categories)->with('tags',Tag::all()); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);
        $featured_new_name = $this->uploadFile($request);
        $post = $this->createPost($request, $featured_new_name);
        $post->tags()->attach($request->tags);
        return view('admin.posts.index')->with('posts',Post::all());
    }
    /**
     * @param Request $request
     * @return array|void
     * @throws \Illuminate\Validation\ValidationException
     */
    public function validateRequest(Request $request): void
    {
        $this->validate($request, [
            'title' => 'required',
            'featured' => 'required|image',
            'content' => 'required',
            'category_id' => 'required'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.posts.edit')->with('post',$post)->with('categories' , Category::all())->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
             'content'=>'required',
             'category_id'=>'required'
         ]);
         $post = Post::find($id);

         if($request->hasFile('featured')){
             $featured_new_name = $this->uploadFile($request);
           $post->featured = 'uploads/posts/'.$featured_new_name;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        $post->tags()->sync($request->tags);

        return view('admin.posts.index')->with('posts', Post::all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        return redirect()->back();
    }
    public function trashed(){
        $posts = Post::onlyTrashed()->get();
        return view('admin.posts.trash')->with('posts',$posts);
    }
    public function kill($id){
        $post = Post::withTrashed()->where('id' ,$id)->first();
        $post->forceDelete();
        return redirect()->back();

    }
    public function restore($id){
      $post = Post::withTrashed()->where('id', $id)->first();
      $post->restore();
      return view('admin.posts.index')->with('posts', Post::all());

    }

    /**
     * @param $categories
     * @return bool
     */
    public function isThereCategory($categories): bool
    {
        return $categories->count() !== 0;
    }



    /**
     * @param Request $request
     * @return string
     */
    public function uploadFile(Request $request): string
    {
        $featured = $request->featured;
        $featured_new_name = $this->renameFile($featured);
        $featured->move('uploads/posts', $featured_new_name);
        return $featured_new_name;
    }

    /**
     * @param Request $request
     * @param string $featured_new_name
     * @return mixed
     */
    public function createPost(Request $request, string $featured_new_name)
    {
        $post = Post::create([

            'title' => $request->title,
            'content' => $request->content,
            'featured' => 'uploads/posts/' . $featured_new_name,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title)

        ]);
        return $post;
    }

    /**
     * @param $featured
     * @return string
     */
    public function renameFile($featured): string
    {
        return time() . $featured->getClientOriginalName();
    }
}
