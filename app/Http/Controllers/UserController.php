<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile($user)
    {
        // 确保当前登录用户修改自己的用户信息
        if ($user == Auth::id()) {
            return view("users.profile");
        }
    }

    public function resetUserName(Request $request)
    {
        // 判断 $request['id'] 是否为空，为空则返回错误

        // 判断 $request['name'] 是否为空，为空则返回错误

        // $request 中需提供待修改人ID，且必须与当前 Auth::id() 相同
        if ($request['id'] == Auth::id()) {
            $user = User::find($request['id']);
            $user->name = $request['name'];
            $user->save();
        }

        return redirect('user/'.Auth::id().'/profile');
    }

    public function resetPassword(Request $request)
    {
        // 判断 $request['id'] 是否为空，为空则返回错误

        // 判断 $request['password'] 是否为空，为空则返回错误

        // 判断 $request['password-confirm'] 是否为空，为空则返回错误

        // 判断 $request['password'] 和 $request['password-confirm'] 是否为空，为空则返回错误

        // $request 中需提供待修改人ID，且必须与当前 Auth::id() 相同
        if ($request['id'] == Auth::id()) {
            $user = User::find($request['id']);
            $user->password = $request['password'];
            $user->save();
        }

        return redirect('user/'.Auth::id().'/profile');
    }
}
