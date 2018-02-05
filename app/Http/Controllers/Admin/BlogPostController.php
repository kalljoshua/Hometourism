<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Admin;

class BlogPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    function getAllPosts(Request $request){
        $posts = Post::orderBy('created_at','DESC')->get();

        return view('admin.admin_blog_listing')->with('posts',$posts);
    }

    function createPost(Request $request){
        return view('admin.admin_new_blog');
    }

    function savePost(Request $request){

        $admin = Admin::find(Auth::guard('admin')->id());
        $post = new Post();

        //Clean slug
        $slug_clean = str_replace(' ', '_', $request->input('slug'));

        $post->title = $request->input('title');
        $post->slug = $slug_clean;
        $post->body = $request->input('blog-editor');
        $post->active = $request->input('active');
        $post->admin_id = Auth::guard('admin')->id();


        if($request->hasFile('photo')){
            $photoName = $request->input('title').'.'.$request->photo->extension();

            $photoName = str_replace(' ', '_', $photoName);

            if($path = $request->photo->move(public_path().'/cache_uploads/', $photoName)){

                $post->image = $photoName;

                $post->save();

                $path = public_path().'/cache_uploads/'.$photoName;

                $this->resizePostImage($path,$photoName);

                flash('Post added successfully')->success();

                return redirect(route('admin.create.post.form'));

            }else{
                return "file error";
            }
        }else{
            return "No image picked";
        }



    }

    function resizePostImage($path,$image_name)
    {

        ini_set('memory_limit','256M');
        ini_set('max_execution_time', 600);

        $image_path = $path;

        Image::make($image_path)
            ->resize(810, 400)
            ->save(public_path().'/images/blog/user_810x400/'.$image_name);

        Image::make($image_path)
            ->resize(99, 99)
            ->save(public_path().'/images/blog/admin_listing_99x99/'.$image_name);

        Image::make($image_path)
            ->resize(950, 750)
            ->save(public_path().'/images/blog/listing_950x750/'.$image_name);

    }

    function edit($id){

        $post = Post::find($id);

        return view('admin.admin_edit_blog_post_form')
            ->with('post',$post);
    }

    function save(Request $request){

        $post = Post::find($request->input('id'));

        //Clean slug
        $slug_clean = str_replace(' ', '_', $request->input('slug'));

        $title = $request->input('title');
        $slug = $slug_clean;

        $body = $request->input('blog-editor');

        if($title != "")
            $post->title = $title;

        if($slug != "")
            $post->slug = $slug;

        if($body != "")
            $post->body = $body;



        if($request->hasFile('photo')){
            $photoName = $request->input('title').'.'.$request->photo->extension();

            $photoName = str_replace(' ', '_', $photoName);

            if($path = $request->photo->move(public_path().'/cache_uploads/', $photoName)){

                $post->image = $photoName;

                $path = public_path().'/cache_uploads/'.$photoName;

                $this->resizePostImage($path,$photoName);

            }
        }

        if($post->save()){
            flash('Changes saved successfully')->success();
            return redirect(route('admin.blog.list'));
        }else{
            flash('Failed to save changes')->success();
            return redirect(route('admin.create.post.form'));
        }

    }

    function delete(Request $request, $id){
        $post = Post::find($id);
        return view('admin.admin_delete_blog_post')
            ->with('post',$post);
    }

    function destroy(Request $request){

        $id = $request->input('id');

        if(Post::destroy($id)){
            flash('Post deleted successfully')->success();
            return redirect()->route('admin.blog.list');
        }else{
            flash('Failed to delete post')->error();
            return redirect()->route('admin.blog.list');
        }
    }


}