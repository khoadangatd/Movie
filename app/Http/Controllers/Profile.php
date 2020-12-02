<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Profile extends Controller
{
    //
    public function index($id){
        $user = User::find($id);
        return view('profile.index');
    }
    public function updateuser(Request $request){
        $tenuser=$request->input('nametk');
        $username=$request->input('username');
        $id=session('user')->id;
        User::where('id','=',$id)->update(array('username'=>$username,'tenuser'=>$tenuser));
        $usernew = User::where('id','=',$id)->get();
        session()->put("user",$usernew[0]);
        // session()->put("message",array("Cập nhật thành công","Tên người dùng đã được thay đổi","success"));
        session()->put("title","Cập nhật thành công");
        session()->put("status","Tên người dùng và username đã được thay đổi");
        session()->put("noti","success");
        return redirect()->back();
    }
    public function updatepassword(Request $request){
        $passwordold=$request->input('passwordold');
        $passwordnew=$request->input('passwordnew');
        $id=session('user')->id;
        $count = User::where('id','=',$id,'and')->where('password','=',md5(sha1($passwordold)))->count();
        if($count>0){
            User::where('id','=',$id)->update(array('password'=>md5(sha1($passwordnew))));
            session()->put("title","Cập nhật thành công");
            session()->put("status","Mật khẩu của bạn đã được thay đổi");
            session()->put("noti","success");
            return redirect()->back();
        }
        session()->put("title","Cập nhật thất bại");
        session()->put("status","Mật khẩu cũ của bạn nhập không chính xác");
        session()->put("noti","error");
        return redirect()->back();
    }
}