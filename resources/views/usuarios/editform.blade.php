@extends('layouts.base')
@section('contenido')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7 mt-5">
            <!--Mensaje Flash        -->
            @if(session('usuarioModificado'))
                <div class="alert alert-success">
                    {{ session('usuarioModificado') }}
                </div>
            @endif

        <!--validacion errores -->
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>@foreach($errors->all() as $errors)
                            <li>{{$errors}}</li>
                        @endforeach
                    </ul>
                </div>
        @endif



        <!-- Formulario de registro de usuario -->
            <div class="card">
                <form action="{{route('edit',$usuario->id)}}" method="POST"  enctype="multipart/form-data" style="background-color: azure">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}

                    <div class="card-header text-center"style="color: lightseagreen">MODIFICAR USUARIO</div>

                    <div class="card-body">
                        <div class="row form-group">
                            <label for="" class="col-2">Nombre:</label>
                            <input type="text" name="nombre"class="form-control col-md-9" value="{{$usuario->nombre}}">
                        </div>

                        <div class="row form-group">
                            <label for="" class="col-2">Email:</label>
                            <input type="text" name="email" class="form-control col-md-9" value="{{$usuario->email}}">
                        </div>

                        <div class="row form-group">
                            <label for="" class="col-2">Foto:</label>
                            <img src="{{ asset('storage').'/'.$usuario->foto}}" alt="" height="100" width="auto">

                            <div class="custom-file col-7">

                                <input type="file" name="foto" class="custom-file-input" id="customFileLang" lang="es">
                                <label class="custom-file-label" style="color:lightgreen" for="customFileLang">Seleccionar Archivo</label>

                            </div>

                        </div>


                        <div class="row form-group">
                            <label for="" class="col-2">Rol:</label>
                            <select name="rol_id" class="form-control col-md-9 text-center"style="color:lightgreen" >
                                <option value="">--Cambiar Rol--</option>
                                @foreach( $rol as $roles)
                                    <option value="{{$roles->id_rol}}"> {{$roles->descripcion}}  </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row form-group">
                            <button type="submit" class=" col-md-9 offset-2  btn btn-outline-info">Modificar Usuario</button>

                        </div>

                    </div>

                </form>
            </div>

        </div>

    </div>

    <a class="btn btn-light btn-xs mt-5" href="{{ url('/') }}">&laquo Página Anterior</a>

</div>

@endsection

