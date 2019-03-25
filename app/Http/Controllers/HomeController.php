<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;
use App\Mail\RegMail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // dd(User::find(1)->blogs);//集合 collections
        // dd(User::find(1)->blogs()->get()); //加括号后可以进行链式操作

        // 发送邮件给$user的email地址
        // $user = User::find(24);
        // \Mail::to($user)->send(new RegMail);

        $blogs = Blog::orderBy('created_at','desc')->with('user')->paginate(10);
        return view('home.index',compact('blogs'));
    }
}
