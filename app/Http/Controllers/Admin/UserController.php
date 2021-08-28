<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:manage-users']);
        // dd('construct user control');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('in user controller');
        $users = User::all()->pluck('email', 'id');
        // dd($users);
        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // form actually on index view
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|regex:/[a-zA-Z0-9-_]{3,25}/',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));


        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $permissionsDirect = $user->getDirectPermissions();
        $permissionsRoles = $user->getPermissionsViaRoles();
        $permissionsAll = $user->getAllPermissions();
        $roles = $user->roles;
        // dd($roles);
        return view('admin.users.show', [
            'user' => $user,
            'permDirect' => $permissionsDirect,
            'permRoles' => $permissionsRoles,
            'permAll' => $permissionsAll,
            'roles' => $roles,

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
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'sometimes|nullable|string|regex:/[a-zA-Z0-9-_]{3,25}/',
            'email' => 'sometimes|nullable|email|max:255|unique:users',
            'password' => ['sometimes', 'nullable', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $request->username === null ?: $user->username = $request->username;
        $request->email === null ?: $user->email = $request->email;
        $request->password === null ?: $user->password = Hash::make($request->password);
        $user->save();

        // event(new Registered($user));


        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // dd($user);
        $user->delete();
        return back();
    }
}
