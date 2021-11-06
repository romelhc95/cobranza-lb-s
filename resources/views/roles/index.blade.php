@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <strong>Usuarios</strong>
                    <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary float-right">&nbsp;&nbsp;&nbsp;Crear&nbsp;&nbsp;&nbsp;</a>
                </div>

                <div class="card-body">

                    @include('layouts.flash-message')

                    <div class="container">
                        <table id="users" class="table table-striped table-bordered nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Documento</th>
                                    <th>Nombres</th>
                                    <th>Tipo</th>
                                    <th>Creado</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $user)
                                <tr>
                                    <td>{{ $user->document_numberuser }}</td>
                                    <td>{{ $user->full_name }}</td>
                                    <td>@if ( $user->is_admin === 1 )
                                            Administrador
                                        @else
                                            Ayudante
                                        @endif
                                    </td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        <a href="{{ route('roles.show', $user->id ) }}" class="btn btn-sm btn-info">
                                            <i class="bi bi-archive-fill"> Detalle</i></a>&nbsp;
                                        <form action="{{ route('roles.destroy', $user->id ) }}" method="POST" class="float-sm-right">
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
                    <a href="{{ route('home') }}" class="btn btn-sm btn-danger">Regresar</a>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection
