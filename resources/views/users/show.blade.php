@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><strong>Detalle de Cliente</strong></div>

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
                                <label class="col-sm-3 col-form-label"><strong>Sector</strong></label>
                                <div class="col-sm-9">
                                    <input type="text" name="sector" class="form-control" value="{{ old('user', $user->sector->name) }}" disabled>
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
                                <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-success"><i class="bi-pencil-fill"> Editar</i></a>
                                {{--<a href="{{ route('loans.create', $user) }}" class="btn btn-sm btn-dark">Nuevo Prestamo</a>--}}
                                <a href="{{ url('admin/loans/create') }}?id_loan={{$user->id}}" class="btn btn-sm btn-dark">Nuevo Prestamo</a>
                                <a href="{{ route('users.index') }}" class="btn btn-sm btn-danger float-right"><i class="bi bi-backspace-fill"> Regresar</i></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
