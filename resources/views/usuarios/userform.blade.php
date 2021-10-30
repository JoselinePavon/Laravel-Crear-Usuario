@extends('layouts.base')
@section('contenido')

<div class="container mt-5">
    <div class="row justify-content-center">
                <div class="col-md-7 mt-5">
                <!--Mensaje Flash -->
                    @if(session('usuarioGuardado'))
                        <div class="alert alert-success">
                            {{ session('usuarioGuardado') }}
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
                <form action="{{url('/save')}}" method="POST"  enctype="multipart/form-data" style="background-color: azure">
                {{csrf_field()}}

                    <div class="card-header text-center" style="color: lightseagreen">AGREGAR USUARIO</div>

                    <div class="card-body">
                        <div class="row form-group">
                            <label for="" class="col-2">Nombre:</label>
                            <input type="text" name="nombre" class="form-control col-md-9">
                        </div>

                        <div class="row form-group">
                            <label for="" class="col-2">Email:</label>
                            <input type="text" name="email" class="form-control col-md-9">
                        </div>

                        <div class="row form-group">
                            <label for="" class="col-2">Foto:</label>
                            <div class="custom-file col-9">
                                <input type="file" name="foto" class="custom-file-input" id="customFileLang" lang="es">
                                <label class="custom-file-label text-center" style="color: lightgreen" for="customFileLang">Seleccionar Archivo</label>

                            </div>

                        </div>


                        <div class="row form-group">
                            <label for="" class="col-2">Rol:</label>
                            <select name="rol" class="form-control col-md-9 text-center"style="color:lightgreen" >
                                <option value="">--Elegir Rol--</option>
                                @foreach( $rol as $roles)
                                    <option value="{{$roles->id_rol}}"> {{$roles->descripcion}}  </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="row form-group">
                            <button type="submit" class=" col-md-9 offset-2 btn btn-outline-info"  >Guardar Usuario</button>

                        </div>




                    </div>

                </form>
            </div>

        </div>

    </div>



    </div>
@endsection

