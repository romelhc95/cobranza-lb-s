@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Crear Cliente</strong>
                    <a href="{{ route('home') }}" class="btn btn-sm btn-danger float-right"><i class="bi bi-backspace-fill"> Regresar</i></a>
                </div>
                <div class="card-body">

                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Documento (*)</label>
                            <select type="text" name="document" class="form-control @error('document') is-invalid @enderror" value="{{ old('document') }}" required>
                                @foreach($documents as $document)
                                    @if (old('document') == $document->document)
                                        <option value="{{ $document->document }}" selected>{{ $document->document }}</option>
                                    @else
                                        <option value="{{ $document->document }}">{{ $document->document }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('document')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Numero Documento (*)</label>
                            <input type="text" name="document_number" class="form-control @error('document_number') is-invalid @enderror" value="{{ old('document_number') }}" required>
                            @error('document_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Primer Nombre (*)</label>
                            <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" required>
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Segundo Nombre</label>
                            <input type="text" name="second_name" class="form-control @error('second_name') is-invalid @enderror" value="{{ old('second_name') }}">
                            @error('second_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Primer Apellido (*)</label>
                            <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" required>
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Segundo Apellido (*)</label>
                            <input type="text" name="second_last_name" class="form-control @error('second_last_name') is-invalid @enderror" value="{{ old('second_last_name') }}" required>
                            @error('second_last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Telefono (*)</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Contraseña (*)</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Dirección (*)</label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" required>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Sector (*)</label>
                            <select type="text" name="sector" class="form-control @error('sector') is-invalid @enderror" value="{{ old('sector') }}" required>
                                @foreach($sectors as $sector)                     
                                    @if (old('sector') == $sector->id)
                                        <option value="{{ $sector->id }}" selected>{{ $sector->name }}</option>
                                    @else
                                    <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('sector')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            @csrf
                            <input type="submit" value="Guardar" class="btn btn-sm btn-primary">
                            {{--<button value="Volver" class="btn btn-sm btn-danger float-sm-right" onclick="return window.history.back();">Regresar</button>--}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
