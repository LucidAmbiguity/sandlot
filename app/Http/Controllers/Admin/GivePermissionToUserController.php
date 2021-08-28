<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class GivePermissionToUserController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['permission:manage-permissions']);
        $this->middleware('permission:manage-permissions', ['except' => ['index', 'show']]);
        $this->middleware('permission:manage-users', ['except' => ['index', 'show']]);
        $this->middleware('permission:manage-roles', ['except' => ['index', 'show']]);
        // dd('construct role control');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $user = User::find($request->user)->givePermissionTo($request->permissionId);
        // dd($request->permissionId, $request->assignee, $role);
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
        //
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
    public function destroy(Request $request, $id)
    {
        // dd($request);
        $user = User::find($request->userId)->revokePermissionTo($id);
        // dd($user);
        // dd($request->roleId, $id);
        return back();
    }
}
