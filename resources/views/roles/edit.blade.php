@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><strong>Actualizar Cliente</strong></div>
                    <div class="card-body">
                        <form action="{{ route('roles.update', $user) }}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="edit_boolean" value="1">
                            <div class="form-group">
                                <label>Documento </label><strong>(*)</strong>
                                <select type="text" name="document" class="form-control @error('document') is-invalid @enderror" required>
                                    <option value="{{ old('user', $user->document) }}">{{ old('user', $user->document) }}</option>
                                    @foreach($documents as $document)
                                        <option value="{{ $document->document }}">{{ $document->document }}</option>
                                    @endforeach
                                </select>
                                @error('document')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Numero Documento </label><strong>(*)</strong>
                                <input type="text" name="document_number" class="form-control  @error('document_number') is-invalid @enderror" required value="{{ old('user', $user->document_number) }}">
                                @error('document_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Primer Nombre </label><strong>(*)</strong>
                                <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" required value="{{ old('user', $user->first_name) }}">
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Segundo Nombre</label>
                                <input type="text" name="second_name" class="form-control @error('second_name') is-invalid @enderror" value="{{ old('user', $user->second_name) }}">
                                @error('second_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Primer Apellido </label><strong>(*)</strong>
                                <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" required value="{{ old('user', $user->last_name) }}">
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Segundo Apellido </label><strong>(*)</strong>
                                <input type="text" name="second_last_name" class="form-control @error('second_last_name') is-invalid @enderror" required value="{{ old('user', $user->second_last_name) }}">
                                @error('second_last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Telefono </label><strong>(*)</strong>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" required value="{{ old('user', $user->phone) }}">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Contraseña </label><strong>(*)</strong>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Dirección </label><strong>(*)</strong>
                                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" required value="{{ old('user', $user->address) }}">
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Rol </label><strong>(*)</strong>
                                <select type="text" name="role" class="form-control @error('role') is-invalid @enderror" required>
                                    @if ( $user->is_admin === 1 )
                                    <option value="1">Administrador</option>
                                    @else
                                    <option value="2">Ayudante</option>
                                    @endif
                                    @if ( $user->is_admin !== 1 )
                                    <option value="1">Administrador</option>
                                    @else
                                    <option value="2">Ayudante</option>
                                    @endif
                                </select>
                                @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="form-group">
                                @csrf
                                @method('PUT')
                                <input type="submit" value="Actualizar" class="btn btn-sm btn-success">
                                <a href="{{ route('roles.index') }}" class="btn btn-sm btn-danger float-right"><i class="bi bi-backspace-fill"> Regresar</i></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
