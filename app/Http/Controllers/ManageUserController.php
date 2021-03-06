<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use App\Role;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class ManageUserController extends Controller
{

    public function __construct(){

        $this->middleware(['auth','isAdmin']);

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();

        return view('Admin.app-pages.user-management')->with(compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $roles = Role::all();

        return view('Admin.app-pages.create-user')->with(compact('roles'));

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

                                    'name' => 'required|string|min:6',
                                    'email' => 'required|email',
                                    'password' => 'required|string|min:6|confirmed'

                        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        if($user){

            $msg = "Congrats ! You have successfully created  a new user named ". $request->name . "!";

            Session::flash('message', $msg);

            return redirect()->to('/manage-user');
        }

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

        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('Admin.app-pages.edit-user')->with(compact('user', 'roles'));

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
        $user = User::findOrFail($id);

        $role =  Role::findOrFail($request->user_role);

        $user->roles()->sync([$request->user_role]);

        $user->update(['name' => $request->user_name, 'email' => $request->user_email ]);

        return redirect('/manage-user');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // we will just revoke the role, so it will be inactive

        $user = User::findOrFail($id);

        $user->roles()->detach();

        return redirect()->back();


    }
}
