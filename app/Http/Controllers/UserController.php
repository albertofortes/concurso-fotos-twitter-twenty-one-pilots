<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Hash;
use Input;
use Redirect;
use Session;
use Validator;
use View;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get all users
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = DB::table('users')->get();
        $users = User::all();

        return View::make('admin.users.index', array('users' => $users));
    }

    /**
     * Display the specified user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return View::make('admin.users.show', array('user' => $user));
    }

    /**
     * New user
     *
     * @return Response
     */
    public function create()
    {
        $roles = Role::lists('name', 'id');

        return View::make('admin.users.create', array('roles' => $roles));
    }

    /**
     * Store a newly created user.
     *
     * @return Response
     */
    public function store()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $messages = [
            'required'    => 'El :attribute es obligatorio.',
            'email.required' => 'El campo email es obligatorio.',
            'email.valid' => 'El campo email no es correcto.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ];
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            'password' => 'required|min:5|confirmed',
            'password_confirmation' => 'required|min:5'
        );
        $validator = Validator::make(Input::all(), $rules, $messages);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/users/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $user = new User;
            $user->name       = Input::get('name');
            $user->first_name = Input::get('first_name');
            $user->last_name  = Input::get('last_name');
            $user->email      = Input::get('email');
            $user->role_id    = Input::get('role');
            $user->password   = Hash::make( Input::get('password') );
            $user->save();

            // redirect
            Session::flash('message', 'Usuario creado correctamente!');
            return Redirect::to('admin/users');
        }
    }

    /**
     * Editing user
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::lists('name', 'id'); //https://laravel.com/docs/5.1/queries

        return View::make( 'admin.users.edit', array('user' => $user, 'roles' => $roles) );
    }

    /**
     * Update user.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $messages = [
            'required'    => 'El :attribute es obligatorio.',
            'email.required' => 'El campo email es obligatorio.',
            'email.valid' => 'El campo email no es correcto.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            /*'size'    => 'The :attribute must be exactly :size.',
            'between' => 'The :attribute must be between :min - :max.',
            'in'      => 'The :attribute must be one of the following types: :values',*/
        ];
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            'password' => 'min:5|confirmed',
            'password_confirmation' => 'min:5',
        );
        $validator = Validator::make(Input::all(), $rules, $messages);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/users/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $user = User::find($id);
            $user->name       = Input::get('name');
            $user->first_name = Input::get('first_name');
            $user->last_name  = Input::get('last_name');
            $user->role_id    = Input::get('role');
            $user->email      = Input::get('email');
            if (Input::get('password')) $user->password = Hash::make( Input::get('password') );
            $user->save();

            // redirect
            Session::flash( 'message', 'Usuario actualizado.' );
            return Redirect::to('admin/users');
        }
    }

    /**
     * Remove user.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        // redirect
        Session::flash('message', 'Usuario eliminado.');
        return Redirect::to('admin/users');
    }

}
