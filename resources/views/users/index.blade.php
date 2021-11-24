@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>Clientes</strong>
                    {{--<a href="{{ route('users.create') }}" class="btn btn-sm btn-primary float-right">Crear</a>--}}
                    <a href="{{ route('home') }}" class="btn btn-sm btn-danger float-right"><i class="bi bi-backspace-fill"> Regresar</i></a>
                </div>

                <div class="card-body">

                    @include('layouts.flash-message')

                    <div class="container">
                        <table id="users" class="table table-striped table-bordered nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Documento</th>
                                    <th>Nombres</th>
                                    <th>Sector</th>
                                    <th>Creado</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->document_numberuser }}</td>
                                    <td>{{ $user->full_name }}</td>
                                    <td>{{ $user->sector }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        <a href="{{ url('admin/payments/create') }}?id_payment={{$user->id}}" class="btn btn-sm btn-success">
                                            <i class="bi bi-currency-dollar"> Pagar</i>
                                        </a>
                                        <a href="{{ route('users.show', $user->id ) }}" class="btn btn-sm btn-info">
                                            <i class="bi bi-archive-fill"> Detalle</i></a>&nbsp;
                                        <form action="{{ route('users.destroy', $user->id ) }}" method="POST" class="float-sm-right">
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
            </div>
        </div>
    </div>
</div>
@endsection
