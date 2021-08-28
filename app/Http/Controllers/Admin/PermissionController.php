<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['permission:manage-permissions']);
        $this->middleware('permission:manage-permissions', ['except' => ['index', 'show']]);
        // dd('construct role control');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('in role controller');
        $permissions = Permission::all()->pluck('name', 'id');

        // dd($permissions);
        return view('admin.permissions.index', ['permissions' => $permissions]);
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
        $this->validate($request, [
            'permission' => 'required',
        ]);
        Permission::create(['name' => $request->permission]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        $allUsers = User::all();
        $roles = Role::all();

        $rolesHas = $roles->filter(function ($value, $key) use ($permission) {
            // var_dump(!$value->hasPermissionTo($permission));
            // echo '<br><br>';
            return   $value->hasPermissionTo($permission);
        });


        $rolesNot = $roles->filter(function ($value, $key) use ($permission) {
            // var_dump(!$value->hasPermissionTo($permission));
            // echo '<br><br>';
            return   !$value->hasPermissionTo($permission);
        });


        $usersHas = $allUsers->filter(function ($value, $key) use ($permission) {
            // var_dump(!$value->hasPermissionTo($permission));
            // echo '<br><br>';
            return   $value->hasPermissionTo($permission);
        });

        $usersDirect = $usersHas->filter(function ($value, $key) use ($permission) {
            // var_dump($value->getPermissionsViaRoles()->pluck('name')->contains($permission->name));
            // echo '<br><br>';
            return   $value->hasDirectPermission($permission);
        });

        $usersRole = $usersHas->filter(function ($value, $key) use ($permission) {
            // var_dump($value->getPermissionsViaRoles()->pluck('name')->contains($permission->name));
            // echo '<br><br>';
            return  !$value->hasDirectPermission($permission);
        });

        $usersNot = $allUsers->filter(function ($value, $key) use ($permission) {
            // var_dump(!$value->hasPermissionTo($permission));
            // echo '<br><br>';
            return   !$value->hasPermissionTo($permission);
        });



        // dd($usersHas, $usersDirect, $usersRole, $usersNot);
        return view('admin.permissions.show', [
            'permission' => $permission,
            'usersHas' => $usersHas,
            'usersDirect' => $usersDirect,
            'usersRole' => $usersRole,
            'usersNot' => $usersNot,
            'rolesHas' => $rolesHas,
            'rolesNot' => $rolesNot,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        // dd($permission);
        $permission->delete();
        return back();
    }
}
