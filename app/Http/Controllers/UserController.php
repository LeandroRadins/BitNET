<?php

namespace App\Http\Controllers;

use App\User;
use App\Materia;
use App\Reputacion;
use App\Respuesta;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:users.index')->only('index');
        $this->middleware('can:users.create')->only(['store', 'create']);
        $this->middleware('can:users.show')->only('show');
        $this->middleware('can:users.edit')->only(['update', 'edit']);
        $this->middleware('can:users.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colores = collect(['primary', 'danger', 'warning', 'info', 'dark']);
        $users = User::all();
        return view('user.index', compact('users', 'colores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all()->pluck('name', 'id');
        $materias = Materia::all()->pluck('nombre', 'id');
        return view('user.create', compact('roles', 'materias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\UserStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $users = User::withTrashed()->get();
        $existe = false;
        foreach ($users as $user) {
            if ($request->email != $user->email) {
                $existe = false;
            } else {
                $existe = true;
                $restore = User::withTrashed()->find($user->id);
                $restore->restore();
                break;  
            }
        }
        if ($existe == false) {
            $validated = $request->validated();
            $user = User::create($validated);
            $user->fechaNac = Carbon::parse($request->fechaNac);
            $user->password = Hash::make($request->password);
            $user->save();
            $user->roles()->sync($request->input('roles', []));
            $user->materias()->sync($request->input('materias', []));
            return redirect()->route('users.index');
        }
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $respuestas = $user->respuestas;
        $positivos = 0;
        $negativos = 0;

        foreach ($respuestas as $respuesta) {
            foreach ($respuesta->reputaciones as $reputacion) {
                if ($reputacion->valor == true) {
                    $positivos ++;
                }else {
                    $negativos ++;
                }
            }
        }

        if ($user->id == Auth::user()->id){
            return redirect()->route('user.profile');
        }else{
            return view('user.show', compact('user', 'positivos', 'negativos'));
        }
    }

    public function profile()
    {
        $user = Auth::user();
        $respuestas = $user->respuestas;
        $positivos = 0;
        $negativos = 0;

        foreach ($respuestas as $respuesta) {
            foreach ($respuesta->reputaciones as $reputacion) {
                if ($reputacion->valor == true) {
                    $positivos ++;
                }else {
                    $negativos ++;
                }
            }
        }
        return view('perfil.mi_perfil', compact('user', 'positivos', 'negativos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all()->pluck('name', 'id');
        $materias = Materia::all()->pluck('nombre', 'id');
        // $fechaNaciemiento = Carbon::formatFrom('d/m/y', $user->fechaNac);
        // return $fechaNaciemiento;
        return view('user.edit', compact('user','roles', 'materias'));
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
        $validated = $request->validated();
        $user = User::create($validated);
        $user->fechaNac = Carbon::parse($request->fechaNac);
        $user->password = Hash::make($request->password);
        $user->save();
        $user->roles()->sync($request->input('roles', []));
        $user->materias()->sync($request->input('materias', []));
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (auth()->user()->id != $user->id) {
            $user->delete();
        } else {
            return redirect()->back();
        }
        return redirect()->route('users.index');
    }


}
