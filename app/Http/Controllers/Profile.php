<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Profile extends Controller
{
    //
    public function index($id){
        $user = User::find($id);
        return view('profile.index')->with("Nuser",$user);
    }
    public function updateuser(Request $request){
        $tenuser=$request->input('nametk');
        $username=$request->input('username');
        $id=session('user')->id;       
        $count = User::where('id','=',$id)->count();
        if($count==0){
            User::where('id','=',$id)->update(array('username'=>$username,'tenuser'=>$tenuser));
            session()->put("message",["Cập nhật thành công","Tên người dùng và username đã được thay đổi","success"]);
        }
        else{
            User::where('id','=',$id)->update(array('tenuser'=>$tenuser));
            session()->put("message",["Cập nhật thất bại","Tên người dùng thay đổi. Username đã bị trùng","error"]);    
        }
        $put= User::where('id','=',$id)->get();
        session()->put('user',$put[0]);
        return redirect()->back();
    }
    public function updatepassword(Request $request){
        $passwordold=$request->input('passwordold');
        $passwordnew=$request->input('passwordnew');
        $id=session('user')->id;
        $count = User::where('id','=',$id,'and')->where('password','=',md5(sha1($passwordold)))->count();
        if($count>0){
            User::where('id','=',$id)->update(array('password'=>md5(sha1($passwordnew))));
            session()->put("message",["Cập nhật thành công","Mật khẩu của bạn đã được thay đổi","success"]);
        }
        else
            session()->put("message",["Cập nhật thất bại","Mật khẩu cũ của bạn nhập không chính xác","error"]);
        return redirect()->back();
    }
}