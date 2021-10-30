@extends('layouts.base')
@section('contenido')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h2 class="text-center mb-5" style="color: lightgreen"> Usuarios Registrados</h2>



            <!---Mensaje flash -->
                @if(session("usuarioEliminado"))
                    <div class="alert alert-success">
                        {{ session("usuarioEliminado")}}
                    </div>
                @endif

                <table class="table table-bordered table-striped text-center" >
                    <thead style="background-color:lightgreen">
                    <tr style="color: white">
                        <th>Nombre:</th>
                        <th>Email:</th>
                        <th>Fotografía:</th>
                        <th>Rol:</th>
                        <th>Acciones</th>
                    </tr>

                    </thead>

                    <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->nombre}}</td>
                        <td>{{$user->email}}</td>
                        <td> <img src="{{ asset('storage').'/'.$user->foto}}" alt="" height="100"></td>
                        <td>{{$user->descripcion}}</td>

                        <td>
                            <!--BOTON DE EDITAR-->
                            <a href="{{route('editform', $user->id)}}" class="btn btn-primary mb-1">
                                <i class=" fas fa-pencil-alt"></i>

                            </a>

                            <!--BOTON ELIMINAR-->
                            <form action="{{route('delete',$user-> id)}}" method="POST">
                                    @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Seguro que desea eliminar');" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>

                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$users->links() }}
            </div>

        </div>

    </div>
@endsection









