<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUsuarioRequest;
use App\User;
use \Response;

class UserController extends Controller
{
    const APAGINATE = '1|2|5|10|20|50|100|200|500';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->paginate = $request->paginate ?? 10;
        $aPaginate = explode('|', $this::APAGINATE);

        $usuario = $this->user
            ->fullSearch($request->search)
            ->paginate($request->paginate)
        ;
        return view('users.index', compact('usuario', 'request', 'aPaginate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsuarioRequest $request)
    {
        $oStore = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => ''
        ]);
        $oStore->save();

        return redirect(route('users.index'))->with(
            'success',
            'El usuario se agregó con éxito'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = $this->user
            ->find($id)
        ;
        if ($usuario) {
            return view('users.show', compact('usuario'));
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = $this->user
            ->find($id)
        ;
        if ($usuario) {
            return view('users.edit', compact('usuario'));
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUsuarioRequest $request, $id)
    {
        $usuario = $this->user
            ->find($id)
        ;
        if ($usuario) {
            $usuario->name = $request->get('name');
            $usuario->email = $request->get('email');
            $usuario->save();

            return redirect(route('users.index'))->with(
                'success',
                'El usuario se modificó con éxito'
            );
        } else {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyform($id)
    {
        $usuario = $this->user
            ->find($id)
        ;
        if ($usuario) {
            return view('users.destroyform', compact('usuario'));
        } else {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = $this->user
            ->find($id)
        ;
        if ($usuario) {
            $usuario->delete();

            return redirect(route('users.index'))->with(
                'success',
                'El usuario se borró con éxito'
            );
        } else {
            abort(404);
        }
    }

    /**
     * Display a listing of the resource in json format.
     *
     * @return \Illuminate\Http\Response
     */
    public function json_users()
    {
        return Response::json($this->user->with('roles')->get());
    }
}
