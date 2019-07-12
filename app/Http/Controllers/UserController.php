<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('admin');
    }

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => 'required',
            'role_id' => ['required', 'numeric'],
        ], [
            'name.required' => 'Debe ingresar el nombre del usuario',
            'name.string' => 'El nombre del usuario solo puede ser texto',
            'email.required' => 'Debe ingresar el email',
            'email.email' => 'La dirección no es válida',
            'password.requiered' => 'Ingrese el nuevo password',
            'role_id.required' => 'Debe ingresar el rol de usuario',
            'role_id.numeric' => 'El rol debe ser un valor numérico'
        ]);

        $user->update($data);
        return redirect('/users');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/users');
    }

}
