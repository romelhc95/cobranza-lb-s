@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Pagar Credito de <strong>{{ $payments[0]->full_name }}</strong>
                    <a href="{{ route('users.index') }}" class="btn btn-sm btn-danger float-right"><i class="bi bi-backspace-fill"> Regresar</i></a>
                </div>
                @include('layouts.flash-message')
                <div class="modal fade" id="efectuar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Efectuar pago</h5>
                            </div>
                            <form action="{{ route('payments.store') }}" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Monto a pagar (*)</label>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">S/.</span>
                                        </div>
                                        <input type="text" name="payment" class="form-control" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <input type="hidden" name="user_id" id="user_id">
                                    </div>
                                    <div class="form-group">
                                            <input type="hidden" name="loan_id" id="loan_id">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    @csrf
                                    <input type="submit" value="Guardar" class="btn btn-sm btn-primary">
                                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body">
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
                                @foreach($payments as $payment)
                                <tr>
                                    <th class="text-center">
                                        @if ( $payment->status === "Pendiente" )
                                        <span class="badge badge-warning">Pendiente</span>
                                        @elseif ($payment->status === "Pagado")
                                        <span class="badge badge-success">Pagado</span>
                                        @else
                                        <span class="badge badge-danger">Completo</span>
                                        @endif
                                    </th>
                                    <td class="text-center">S/. {{ $payment->amount }}</td>
                                    <td class="text-center">
                                        @if( is_null($payment->payment) )
                                            S/. 0.00
                                        @else
                                            S/. {{ $payment->payment }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if( is_null($payment->new_payment) )
                                            S/. 0.00
                                        @else
                                            S/. {{ $payment->new_payment }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if( is_null($payment->updated_at) )
                                            Sin pagos
                                        @else
                                            {{ $payment->updated_at }}
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-success" id="btn-modal" data-toggle="modal" data-target="#efectuar"
                                                data-item-user-id="{{ $payment->user_id }}" data-item-loan-id="{{ $payment->loan_id }}">
                                            <i class="bi bi-currency-dollar"> Efectuar</i>
                                        </button>
                                        <a href="{{ url('admin/payments/show') }}?id_payment={{$payment->loan_id}}" class="btn btn-sm btn-info">
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
