<?php

namespace App\Http\Controllers;

use App\PkmModel;
use App\userModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use SSO\SSO;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return view('newUser',[]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //TODO get dari SSO
        SSO::authenticate();
        $user = new userModel();
        $userDb = SSO::getUser();
        $validator = Validator::make(Input::all(), [
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/auth/newUser')
                ->withErrors($validator)
                ->withInput();
        }
        $user->username = $userDb->username;
        $user->role = 0;
        $user->phone_num = Input::get('phone');
        $user->npm = $userDb->npm;
        $user->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function login(){
        SSO::authenticate();
        if(SSO::check()) {
            $user = SSO::getUser(); //TODO cek udah ada di database apa belum
            $userDb = userModel::where('username', $user->username)->first();
            if ($userDb) {
                $user->role = $userDb->role;
                Session::put('user', $user);
                return redirect('/');
            }
            else
                Session::put('user', $user);
                return redirect('auth/newUser');
        }
    }

    public function logout(){
        Session::flush();
        SSO::logout();
        return Redirect::action('UserController@login');
    }

}
