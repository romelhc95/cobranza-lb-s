@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Bienvenido <strong>{{ $queries2[0]->full_name }}</strong>
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
                                <tr>
                                    <th>Sin registros</th>
                                    <th>Sin registros</th>
                                    <th>Sin registros</th>
                                    <th>Sin registros</th>
                                    <th>Sin registros</th>
                                    <th>Sin registros</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
