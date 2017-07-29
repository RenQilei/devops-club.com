<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
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

    public function addOriginalRolePermissions()
    {
        // 角色 -- 作者（默认），分类管理员，系统管理员

        if (!Role::where('name', 'writer')->first()) {
            $writer = [
                'name'          => 'writer',
                'display_name'  => '作者',
                'description'   => 'DevOpsClub作者，可以发布原创、转载、翻译文章。'
            ];
            $writer = Role::create($writer);

            // 创建完成后，将现有用户都默认改为作者
            $users = User::all();
            foreach($users as $user) {
                $user->roles()->attach($writer->id);
            }
        }

        if (!Role::where('name', 'category_manager')->first()) {
            $categoryManager = [
                'name'          => 'category_manager',
                'display_name'  => '分类管理员',
                'description'   => 'DevOpsClub分类管理员，可以对管辖分类下的文章进行管理。'
            ];
            $categoryManager = Role::create($categoryManager);
        }

        if (!Role::where('name', 'admin')->first()) {
            $admin = [
                'name'          => 'admin',
                'display_name'  => '系统管理员',
                'description'   => 'DevOpsClub系统管理员，可以进行站点管理。'
            ];
            $admin = Role::create($admin);

            // email='renqilei@gmail.com' 赋值为系统管理员
            $user = User::where('email', 'renqilei@gmail.com')->first();
            $user->roles()->attach($admin->id);
        }

        return "角色创建和初始分配成功！";
    }
}
