<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Middleware\Authorize;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{

    public function __construct()
    {

        $this->middleware('permission:manage-roles', ['except' => ['index', 'show']]);
        // $this->middleware('auth', ['except' => ['index', 'show']]);
        // dd('construct role control');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // if ($request->user()->cannot('viewAny')) {
        //     abort(403);
        // }
        // dd('in role controller');
        $roles = Role::all()->pluck('name', 'id');
        // dd($roles);
        return view('admin.roles.index', ['roles' => $roles]);
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
            'role' => 'required',
        ]);
        Role::create(['name' => $request->role]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        // $this->authorize('viewAny');


        $users = User::role($role->name)->get(); // Returns only users with the role
        // $users =  User::with('roles')->get();; // Returns only users with the role
        $usersNot = User::with('roles')->get()->filter(function ($value, $key) use ($role) {

            return   !$value->roles->contains($role);
        });

        // dd($usersNot);
        // dd($users->get(0)->getPermissionsViaRoles()->pluck('name'));
        return view('admin.roles.show', [
            'role' => $role,
            'users' => $users,
            'usersNot' => $usersNot,
        ]);
    }

    /**6
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        // dd($role);
        $role->delete();
        return back();
    }
}
