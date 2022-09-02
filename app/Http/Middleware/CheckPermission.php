<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $permission = null)
    {
        //lay tat ca cac queyn khi dang nhap he thong
        // 1 . lay tat ca cac role cua user login he thong
        $listRoleOfUser = User::find(auth()->id())->roles()->select('roles.id')->pluck('id')->toArray();
//        $listRoleOfUser = DB::table('users')
//            ->join('roles_user', 'users.id', '=', 'roles_user.user_id')
//            ->join('roles', 'roles_user.role_id', '=', 'roles.id')
//            ->where('users.id',auth()->id())
//            ->select('roles.*')
//            ->get()->pluck('id')->toArray();
        // 2. lay tat ca cac quyen khi user login vao he thong
        $listRoleOfUser = DB::table('roles')
            ->join('role_permissions', 'roles.id', '=', 'role_permissions.role_id')
            ->join('permissions', 'role_permissions.permission_id', '=', 'permissions.id')
            ->whereIn('roles.id',$listRoleOfUser)
            ->select('permissions.*')
            ->get()->pluck('id')->unique();

        // lay ra ma man hinh tuong ung de check phan quen
        $checkPermission = Permission::where('name',$permission)->value('id');
        //kiem tra user dc phep vao man hinh hay khong
        if ($listRoleOfUser->contains($checkPermission)){
            return $next($request);

        }
        return abort(401, 'Unauthorized action.');

    }
}
