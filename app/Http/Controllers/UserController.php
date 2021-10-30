<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //listar usuarios
    public function list(){
        $users = DB::table('usuarios')

            ->join('rol', 'usuarios.rol_id', '=', 'rol.id_rol')
            ->select('usuarios.*', 'rol.descripcion')
            ->paginate(4);


        return view('usuarios.list', compact('users'));

    }

    // formulario
    public function userform(){
        $rol=Rol::all();

        return view('usuarios.userform', compact('rol'));


    }

    //Guardar Usuarios
    public function save(Request $request){
        $validator = $this->validate($request, [
            'nombre'=> 'required|string|max:100',
            'email'=> 'required|string|max:100|email|unique:usuarios',
            'foto'=> 'required|',
            'rol'=> 'required'
        ]);
        //obtenemos la fotografia
        if($request ->hasfile('foto')){
            $validator ['foto']=$request->file('foto')->store('imagenes', 'public');
        }

        //guardamos en los campos de la base de datos
        Usuario::create([
            'nombre'=>$validator['nombre'],
            'email'=>$validator['email'],
            'foto'=>$validator['foto'],
            'rol_id'=>$validator['rol']
        ]);

        return back()->with('usuarioGuardado','Usuario Guardado');
    }

        //eliminar usuarios
        public
        function delete($id)
        {
            Usuario::destroy($id);
            return back()->with('usuarioEliminado', 'Usuario Eliminado');
        }


    //formulario para editar usuarios
    public function editform($id){
        $rol=Rol::all();
        $usuario = Usuario::findOrfail($id);
        return view ('usuarios.editform', compact('usuario', 'rol'));

    }

    //edicion usuarios
    public function edit(Request $request,$id)
    {

        $dataUsuario = request()->except ((['_token','_method']));
        if($request ->hasfile('foto')){
            $usuario = Usuario::findOrFail($id);
            Storage::delete('public/'.$usuario->foto);
            $dataUsuario['foto']=$request->file('foto')->store('imagenes', 'public');
        }


        Usuario::where('id', '=', $id)->update($dataUsuario);

        return back()->with('usuarioModificado', 'Usuario Modificado');
    }
}
