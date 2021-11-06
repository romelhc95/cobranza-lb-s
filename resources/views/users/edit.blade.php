@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><strong>Actualizar Cliente</strong></div>

                    <div class="card-body">

                        <form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Documento (*)</label>
                                <select type="text" name="document" class="form-control" required>
                                    <option value="{{ old('user', $user->document) }}">{{ old('user', $user->document) }}</option>
                                    @foreach($documents as $document)
                                        <option value="{{ $document->document }}">{{ $document->document }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Numero Documento (*)</label>
                                <input type="text" name="document_number" class="form-control" required value="{{ old('user', $user->document_number) }}">
                            </div>
                            <div class="form-group">
                                <label>Primer Nombre (*)</label>
                                <input type="text" name="first_name" class="form-control" required value="{{ old('user', $user->first_name) }}">
                            </div>
                            <div class="form-group">
                                <label>Segundo Nombre</label>
                                <input type="text" name="second_name" class="form-control" value="{{ old('user', $user->second_name) }}">
                            </div>
                            <div class="form-group">
                                <label>Primer Apellido (*)</label>
                                <input type="text" name="last_name" class="form-control" required value="{{ old('user', $user->last_name) }}">
                            </div>
                            <div class="form-group">
                                <label>Segundo Apellido (*)</label>
                                <input type="text" name="second_last_name" class="form-control" required value="{{ old('user', $user->second_last_name) }}">
                            </div>
                            <div class="form-group">
                                <label>Telefono (*)</label>
                                <input type="text" name="text" class="form-control" required value="{{ old('user', $user->phone) }}">
                            </div>
                            <div class="form-group">
                                <label>Contraseña (*)</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Dirección (*)</label>
                                <input type="text" name="address" class="form-control" required value="{{ old('user', $user->address) }}">
                            </div>
                            <div class="form-group">
                                <label>Sector (*)</label>
                                <select type="text" name="sector" class="form-control" required>
                                    <option value="{{ old('user', $user->sector->name) }}">{{ old('user', $user->sector->name) }}</option>
                                    @foreach($sectors as $sector)
                                        <option value="{{ $sector->id }}">{{$sector->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                @csrf
                                @method('PUT')
                                <input type="submit" value="Actualizar" class="btn btn-sm btn-success">
                                <a href="{{ route('users.index') }}" class="btn btn-sm btn-danger float-right">Regresar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
