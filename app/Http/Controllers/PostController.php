<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //  $posts = Post:: all();
    //  $posts = Post:: paginate(5);
     $posts = Post::withTrashed()-> simplePaginate(5);
     return view('posts.index',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

    //Post::create($request->all());
      Post::create([
        'title'=> $request->title,
        'user_id'=> 1 ,
        'description'=>$request->description,
        'is_published'=>$request->is_published,
        'is_active'=> $request->is_active,
      ]);
        $request->session()->flash('alert-success','post saved successfully!');

        //return redirect()->route('posts.create');
        //now different method to redirect
        //return to_route('posts.create');
      return redirect()->route('posts.create');



    dd('values are saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if(! $post){
            abort(404, 'Id not found');
        }
        return view('posts.show', ['post' => $post]);
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
        if(! $post){
            abort(404, 'Id not found');
        }
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {


      $post = Post::find($id);
      if(! $post){
        abort(404);
      }
      $post->update([
        'title' => $request->title,
        'description'=>$request->description,
        'is_published'=>$request->is_published,
        'is_active'=> $request->is_active,
      ]);
      $request->session()->flash('alert-info', 'Post Updated Successfully !');

      return to_route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
          if(! $post){
        abort(404);
      }
       $post->delete();
      request()->session()->flash('alert-success', 'Post Deleted Successfully !');

      //return to_route('posts.index');
      return redirect()->route('posts.index');
    }

    public function SoftDelete(Request $request , $id)
    {
        $post = Post::onlyTrashed()->find($id);
          if(! $post){
        abort(404);
      }
       $post->update([
        'deleted_at'=> null
       ]);

      request()->session()->flash('alert-message', 'Post Recovered Successfully !');

      //return to_route('posts.index');
      return redirect()->route('posts.index');

    }

    public function getPosts()
    {
return DB::select('select * from posts where title = ? ', ['Neque aut laborum of'] );
    }
}
