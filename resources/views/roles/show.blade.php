@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><strong>Detalle de Usuario</strong></div>

                    <div class="card-body">
                        <form>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"><strong>Documento</strong></label>
                                <div class="col-sm-9">
                                    <input type="text" name="document" class="form-control" value="{{ old('user', $user->document) }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"><strong>Numero Documento</strong></label>
                                <div class="col-sm-9">
                                    <input type="text" name="document_number" class="form-control" value="{{ old('user', $user->document_number) }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"><strong>Nombres</strong></label>
                                <div class="col-sm-9">
                                    <input type="text" name="full_name" class="form-control" value="{{ old('user', $user->full_name) }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"><strong>Telefono</strong></label>
                                <div class="col-sm-9">
                                    <input type="text" name="phone" class="form-control" value="{{ old('user', $user->phone) }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"><strong>Dirección</strong></label>
                                <div class="col-sm-9">
                                    <input type="text" name="address" class="form-control" value="{{ old('user', $user->address) }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"><strong>Tipo</strong></label>
                                <div class="col-sm-9">
                                    <input type="text" name="address" class="form-control" value="@if ($user->is_admin === 1)Administrador @else Ayudante @endif" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"><strong>Creado</strong></label>
                                <div class="col-sm-9">
                                    <input type="text" name="created_at" class="form-control" value="{{ old('user', $user->created_at) }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"><strong>Ultima actualización</strong></label>
                                <div class="col-sm-9">
                                    <input type="text" name="updated_at" class="form-control" value="{{ old('user', $user->updated_at) }}" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <a href="{{ route('roles.edit', $user->id) }}" class="btn btn-sm btn-success">Editar</a>
                                <a href="{{ route('roles.index') }}" class="btn btn-sm btn-danger float-right">Regresar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
