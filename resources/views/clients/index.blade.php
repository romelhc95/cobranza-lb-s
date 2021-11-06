@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Bienvenido <strong>{{ $queries[0]->full_name }}</strong>
                </div>
                <div class="card-body">
                    <h4>Historial de Creditos</h4>
                    <div>
                        &nbsp;
                    </div>
                    <div class="container">
                        <table id="payment_create" class="table table-striped table-bordered nowrap" style="width:100%">
                            <thead>
                            <tr>
                                <th>Estado</th>
                                <th>Total</th>
                                <th>Pagado</th>
                                <th>Quedán</th>
                                <th>Pagó Realizado</th>
                                <th>Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($queries as $query)
                                <tr>
                                    <th class="text-center">
                                        @if ( $query->status === "Pendiente" )
                                        <span class="badge badge-warning">Pendiente</span>
                                        @elseif ($query->status === "Pagado")
                                        <span class="badge badge-success">Pagado</span>
                                        @else
                                        <span class="badge badge-danger">Completo</span>
                                        @endif
                                    </th>
                                    <td class="text-center">S/. {{ $query->amount }}</td>
                                    <td class="text-center">
                                        @if( is_null($query->payment) )
                                            S/. 0.00
                                        @else
                                            S/. {{ $query->payment }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if( is_null($query->new_payment) )
                                            S/. 0.00
                                        @else
                                            S/. {{ $query->new_payment }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if( is_null($query->updated_at) )
                                            Sin pagos
                                        @else
                                            {{ $query->updated_at }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('client/client/show') }}?id_payment={{$query->loan_id}}" class="btn btn-sm btn-info">
                                            <i class="bi bi-archive-fill"> Detalle</i></a>&nbsp;
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
