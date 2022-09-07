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
        $listRoleOfUser = User::find(auth()->id())->roles()->select('roles.id')->pluck('id')->toArray();

        $listRoleOfUser = DB::table('roles')
            ->join('role_permissions', 'roles.id', '=', 'role_permissions.role_id')
            ->join('permissions', 'role_permissions.permission_id', '=', 'permissions.id')
            ->whereIn('roles.id',$listRoleOfUser)
            ->select('permissions.*')
            ->get()->pluck('id')->unique();

        $checkPermission = Permission::where('name',$permission)->value('id');
        if ($listRoleOfUser->contains($checkPermission)){
            return $next($request);
        }
        return abort(401, 'Unauthorized action.');

    }
}
