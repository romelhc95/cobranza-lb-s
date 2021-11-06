@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><strong>{{ $query[0]->full_name }}</strong>
                    <button value="Volver" class="btn btn-sm btn-danger float-sm-right" onclick="return window.history.back();">Regresar</button>
                </div>
                <div class="card-body">
                    @include('layouts.flash-message')
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="panel">
                                <ul class="list-group">
                                    <li class="list-group-item"><strong>Capital:</strong> {{ $query[0]->loan }}</li>
                                    <li class="list-group-item"><strong>Fecha de prestamo:</strong> {{ $query[0]->loan_created_at }}</li>
                                    <li class="list-group-item"><strong>Tasa de interés:</strong> {{ $query[0]->monetary_interest }}%</li>
                                    <li class="list-group-item"><strong>Intereses:</strong> {{ $query[0]->amount - $query[0]->loan }}</li>
                                    <li class="list-group-item"><strong>Total:</strong> {{ $query[0]->amount }}</li>
                                    <li class="list-group-item"><strong>Estado:</strong> 
                                        @if ( $query[0]->status === "Pendiente" )
                                            <span class="badge badge-warning">Pendiente</span>
                                        @elseif ($query[0]->status === "Pagado")
                                            <span class="badge badge-success">Pagado</span>
                                        @else
                                            <span class="badge badge-danger">Completo</span>
                                        @endif    
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        &nbsp;
                    </div>
                    <div class="container">
                        <h4>Historial</h4>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Valor</th>
                                    <th>Saldo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($query as $payment)
                                <tr>
                                    <td>
                                        @if ( is_null($payment->payment_created_at) )
                                            Sin Pago
                                        @else
                                            {{ $payment->payment_created_at }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ( is_null($payment->payment))
                                            Sin Pago
                                        @else
                                            {{ $payment->payment }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ( is_null($payment->new_payment) )
                                            Sin Pagos
                                        @else
                                            {{ $payment->new_payment }}
                                        @endif
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
