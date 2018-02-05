<?php

namespace App\Http\Controllers\User;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Comment;
use App\Company;
use Input, Redirect, Auth;

class BlogPostController extends Controller
{
    function getAllPosts(Request $request){
        $posts = Post::orderBy('created_at','DESC')->paginate(3);
        return view('user.user_blog_post_listings')
            ->with('posts',$posts);
    }

    function showPost(Request $request, $slug){
        $posts = Post::where('slug',$slug)->first();
        $comments = $posts->comments;
        $recentComments = Comment::orderBy('id','Desc')->take(4)->get();

        return view('user.user_blog_post')
            ->with(['posts'=>$posts,'comments'=>$comments,
                'recentComments'=>$recentComments]);

    }

    function postComment(Request $request){
        $comment = new Comment();
        $comment->post_id  = Input::get('on_post');
        $comment->user_id  = Auth::guard('user')->id();
        if(Input::has('body')) $comment->body = Input::get('body');

        $slug = Input::get('slug');
        $posts = Post::where('slug',$slug)->first();
        $comments = $posts->comments;
        $recentComments = Comment::orderBy('id','Desc')->take(4)->get();
        if($comment->save()){
            flash('You\'ve successfully commented on this Blog')->success();
            return redirect(route('user.show.posts',['slug'=>$slug]))
                ->with(['posts'=>$posts,'comments'=>$comments,
                    'recentComments'=>$recentComments]);
        }else
        {
            flash('Failed to add your comment')->success();
            return redirect(route('user.show.posts',['slug'=>$slug]))
                ->with(['posts'=>$posts,'comments'=>$comments,
                    'recentComments'=>$recentComments]);
        }



    }

}
