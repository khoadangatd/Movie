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
            session()->put("message",["Đăng nhập thành công","Cùng tận hưởng nào","success"]);
            return redirect('');
        }
        session()->put("message",["Đăng nhập thất bại","Mật khẩu hoặc tài khoản của bạn không đúng","error"]);
        return redirect('/form');
    }
    public function register(Request $request){
        $username = $request->input("user");
        $password = $request->input("password");
        $count = User::where('username','=',$username)->count();
        if($count==0){
            $user= new User;
            $user->username=$username;
            $user->password=md5(sha1($password));
            $user->tenuser=$username;
            $user->save();
            session()->put("message",["Đăng kí thành công","Hãy đăng nhập và tận hưởng những thước phim của mình","success"]);
            return redirect("/form");
        }
        session()->put("message",["Đăng kí thất bại","Username của bạn đã có người sử dụng","error"]);
        return redirect("/form");
    }
    public function logout(Request $request){
        session()->forget('user');
        return redirect("/");
    }
}
