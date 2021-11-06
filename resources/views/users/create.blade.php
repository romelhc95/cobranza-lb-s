@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Crear Cliente</strong>
                    <a href="{{ route('home') }}" class="btn btn-sm btn-danger float-right">Regresar</a>
                </div>
                <div class="card-body">

                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Documento (*)</label>
                            <select type="text" name="document" class="form-control" required>
                                <option selected>Seleccione documento</option>
                                @foreach($documents as $document)
                                    <option value="{{ $document->document }}">{{ $document->document }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Numero Documento (*)</label>
                            <input type="text" name="document_number" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Primer Nombre (*)</label>
                            <input type="text" name="first_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Segundo Nombre</label>
                            <input type="text" name="second_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Primer Apellido (*)</label>
                            <input type="text" name="last_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Segundo Apellido (*)</label>
                            <input type="text" name="second_last_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Telefono (*)</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Contraseña (*)</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Dirección (*)</label>
                            <input type="text" name="address" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Sector (*)</label>
                            <select type="text" name="sector" class="form-control" required>
                                @foreach($sectors as $sector)
                                    <option value="{{ $sector->id }}">{{$sector->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            @csrf
                            <input type="submit" value="Guardar" class="btn btn-sm btn-primary">
                            {{--<button value="Volver" class="btn btn-sm btn-danger float-sm-right" onclick="return window.history.back();">Regresar</button>--}}
                            <a href="{{ route('home') }}" class="btn btn-sm btn-danger float-right">Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
