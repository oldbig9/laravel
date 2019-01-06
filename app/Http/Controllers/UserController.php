<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct(){
        // 用户必须登录才能进行用户的相关操作
        $this->middleware('auth',[
            'except' => ['index','show']
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','desc')->paginate(10);
        // return view('user.index',['users'=>$users]);
        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {   
        $this->authorize('update',$user);
        $data = $this->validate($request,[
            'name' => 'required|min:6',
            'password' => 'nullable|min:6|confirmed'
        ]);
        $user->name = $request->name;
        if($request->password){
            $user->password = bcrypt($request->password);
        }
        // $user->update($data);
        $user->save();
        session()->flash('success','编辑成功');
        return redirect()->route('user.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // dd($user->toArray());
        $this->authorize('delete',$user);
        $user->delete();
        session()->flash('success','删除成功');
        return redirect()->route('user.index');
    }

    /**
     * Undocumented function
     *
     * @param [type] $token
     * @return void
     */
    public function confirmEmail($token)
    {
        // dd($token);
        $user = User::where('name',$token)->first();
        if($user){
            $user->email_verified_at = date('Y-m-d H:i:s',time());
            $user->save();
            session()->flash('success','邮箱验证成功');
            \Auth::login($user);
            return redirect('/');
        }

        session()->flash('danger','邮箱验证失败');
        return redirect('/');
    }
}
