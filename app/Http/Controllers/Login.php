<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;

class Login extends Controller
{
    //
    public function index(){
        return view('login.index');
    }
    public function login(Request $request){
        $username = $request->input("user");
        $password = $request->input("password");
        $user = User::where('username','=',$username,'and')->where('password','=',md5(sha1($password)))->get();
        $count = User::where('username','=',$username,'and')->where('password','=',md5(sha1($password)))->count();
        if($count>0){
            session()->put("user",$user[0]);
            return redirect('');
        }
        session()->put("title","Đăng nhập thất bại");
        session()->put("status","Mật khẩu hoặc tài khoản của bạn không đúng");
        session()->put("noti","error");
        return redirect('/form');
    }
    public function register(Request $request){
        $username = $request->input("user");
        $password = $request->input("password");
        $count = User::where('username','=',$username,'and')->count();
        if($count<0){
            $user= new User;
            $user->username=$username;
            $user->password=md5(sha1($password));
            $user->tenuser=$username;
            $user->save();
            return redirect("/form");
            session()->put("title","Đăng kí thành công");
            session()->put("status","Hãy tận hưởng những thước phim của mình");
            session()->put("noti","success");
        }
        session()->put("title","Đăng kí thất bại");
        session()->put("status","Username của bạn đã có người sử dụng");
        session()->put("noti","error");
        return redirect("/form");
    }
    public function logout(Request $request){
        session()->forget('user');
        return redirect("/");
    }
}
