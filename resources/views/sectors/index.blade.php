@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <strong>Sectores</strong>
                    <a href="{{ route('sectors.create') }}" class="btn btn-sm btn-primary float-right"><i class="bi bi-newspaper"> Crear</i></a>
                </div>

                <div class="card-body">

                    @include('layouts.flash-message')

                    <div class="container">
                        <table id="sectors" class="table table-striped table-bordered nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sector</th>
                                    <th>Creado</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sectors as $sector)
                                <tr>
                                    <td>{{ $sector->name }}</td>
                                    <td>{{ $sector->created_at }}</td>
                                    <td>
                                        <a href="{{ route('sectors.edit', $sector) }}" class="btn btn-sm btn-success">
                                            <i class="bi bi-pencil-fill">Editar</i>
                                        </a>
                                        <form action="{{ route('sectors.destroy', $sector) }}" method="POST" class="float-sm-right">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Desea eliminar el registro?')">
                                                <i class="bi bi-trash-fill"> Eliminar</i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
                <a href="{{ route('home') }}" class="btn btn-sm btn-danger float-sm-right"><i class="bi bi-backspace-fill"> Regresar</i></a>
            </div>
        </div>
    </div>
</div>
@endsection
