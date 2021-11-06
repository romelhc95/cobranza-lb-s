@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-auto">
            <div class="card">
                <div class="card-header">
                    <strong>Préstamos</strong>
                    {{--<a href="{{ route('loans.create') }}" class="btn btn-sm btn-primary float-right">Crear</a>--}}
                    <a href="{{ route('home') }}" class="btn btn-sm btn-danger float-right">Regresar</a>
                </div>

                <div class="card-body">

                    @include('layouts.flash-message')

                    <div class="container">
                        <table id="loans" class="table table-striped table-bordered nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Documento</th>
                                    <th>Cliente</th>
                                    <th>Capital</th>
                                    <th>Interés</th>
                                    <th>Monto a Pagar</th>
                                    <th>Realizado</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($loans as $loan)
                                <tr>
                                    <td>{{ $loan->document_numberuser }}</td>
                                    <td>{{ $loan->first_name }} {{ $loan->last_name }}</td>
                                    <td>{{ $loan->loan }}</td>
                                    <td>{{ $loan->monetary_interest }}%</td>
                                    <td>{{ $loan->amount }}</td>
                                    <td>{{ $loan->created_at }}</td>
                                    <td>
                                        <a href="{{ route('loans.edit', $loan->id) }}" class="btn btn-sm btn-success">
                                            <i class="bi-pencil-fill"> Editar</i>
                                        </a>
                                        <form action="{{ route('loans.destroy', $loan->id) }}" method="POST" class="float-sm-right">
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
