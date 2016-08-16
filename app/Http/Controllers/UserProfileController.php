<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserProfileController extends Controller
{

    public function __construct(){

        $this->middleware(['auth', 'isValidUser']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();

        return view('Admin.app-pages.user-profile')->with(compact('user'));

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
        //
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

        //dd('in the update method');
        $this->validate($request, ['user_name' => 'required|string|min:5']);

        $user = User::findOrFail($id);

        $user->name = $request->user_name;
        // $user->email = $request->user_email; // we don't want to allow a user to update his email

        if($user->save()){

            \Session::flash('message', 'Congrats ! you have successfully updated your profile info');
            \Session::flash('alert_type', 'success');

            return redirect()->to('/profile');

        }

        \Session::flash('message', 'Sorry ! something went wrong.');
        \Session::flash('alert_type', 'error');

        return redirect()->to('/profile');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
