@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Crear Usuario</strong>
                    <a href="{{ route('roles.index') }}" class="btn btn-sm btn-danger float-right"><i class="bi bi-backspace-fill"> Regresar</i></a>
                </div>
                <div class="card-body">

                    <form action="{{ route('roles.store') }}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Documento </label><strong>(*)</strong>
                            <select type="text" name="document" class="form-control" required>
                                <option selected>Seleccione documento</option>
                                @foreach($documents as $document)
                                    <option value="{{ $document->document }}">{{ $document->document }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Numero Documento </label><strong>(*)</strong>
                            <input type="text" name="document_number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Primer Nombre </label><strong>(*)</strong>
                            <input type="text" name="first_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Segundo Nombre</label>
                            <input type="text" name="second_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Primer Apellido </label><strong>(*)</strong>
                            <input type="text" name="last_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Segundo Apellido </label><strong>(*)</strong>
                            <input type="text" name="second_last_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Telefono </label><strong>(*)</strong>
                            <input type="text" name="phone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Contraseña </label><strong>(*)</strong>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Dirección </label><strong>(*)</strong>
                            <input type="text" name="address" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Role </label><strong>(*)</strong>
                            <select type="text" name="role" class="form-control" required>
                                <option value="1">Administrador</option>
                                <option value="2">Ayudante</option>
                            </select>
                        </div>
                        <div class="form-group">
                            @csrf
                            <input type="submit" value="Guardar" class="btn btn-sm btn-primary">
                            {{--<button value="Volver" class="btn btn-sm btn-danger float-sm-right" onclick="return window.history.back();">Regresar</button>--}}
                            <a href="{{ route('home') }}" class="btn btn-sm btn-danger float-right"><i class="bi bi-backspace-fill"> Regresar</i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
