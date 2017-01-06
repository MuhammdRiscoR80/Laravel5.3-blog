<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
use Session;
use Image;
use Storage;
use Purifier;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // creae a variable and store post into db
        $post = Post::orderBy('id', 'asc')->paginate(10);

        // reurn view
        return view('Posts.index')->withPosts($post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('Posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request);
        //validate Data
        $this->validate($request, array(
                'title' => 'required|max:225',
                'slug'  => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'featured_image' => 'image',
                'category_id' => 'required|integer',
                'body'  => 'required'
            ));

        //Store Into Database
        $post = new Post;

        $post->title = $request->title;
        $post->slug  = $request->slug;
        $post->category_id = $request->category_id;
        $post->body  = Purifier::clean($request->body);

        //image file
        if($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);

            Image::make($image)->resize(300,400)->save($location);

            $post->image = $filename;
        }

        //$post->save();
        $post->save();
        
        $post->tags()->sync($request->tags, false);        

        Session::flash('success', 'The Blog post has successfully created');
        //Session::put

        //redirect to another page
        return redirect()->route('posts.show', $post->id);
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
        return view('Posts.show')->withPost($post);                   
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

        $categories = Category::all();
        $cats = array();
        foreach($categories as $category) {
            $cats[$category->id] = $category->name;
        }

        $tags = Tag::all();
        $tag2 = array(); 
        foreach($tags as $tag) {
            $tag2[$tag->id] = $tag->name;
        }
        return view('Posts.edit')->withPost($post)->withCategories($cats)->withTags($tag2);
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
        
        $post = Post::find($id);

        if($request->slug == $post->slug) {
            $this->validate($request, array(
                    'title' => 'required| max:225',
                    'category_id' => 'required|integer',
                    'body'  => 'required'
            ));
        } else {
            $this->validate($request, array(
                    'title' => 'required| max:225',
                    'slug'  => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                    'category_id' => 'required|integer',
                    'body'  => 'required'
            ));
        }


        $post->title = $request->input('title');
        $post->slug  = $request->input('slug');
        $post->category_id  = $request->category_id;
        $post->body  = Purifier::clean($request->body);

        //image
        if($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);

            Image::make($image)->resize(300,400)->save($location);

            //change file
            $oldname = $post->image;
            $post->image = $filename;

            //delete photo
            Storage::delete($oldname);
        }

        $post->save();

        if(isset($request->tags)) {
            $post->tags()->sync($request->tags); 
        } else {
            $post->tags()->sync(array()); 
        }    
        Session::flash('success', 'The Blog post has successfully Updates');

        return redirect()->route('posts.show', $post->id);
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
       Storage::delete($post->image);
       $post->delete();


       Session::flash('succes', 'The Blog post has successfully Deleted');
       return redirect()->route('posts.index');
    }
}
