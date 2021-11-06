@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Bienvenido al sistema de Control de Cobranza del día de hoy <strong>{{ $index[0]->FECHA }}</strong></div>

                <div class="card-body">
                    <a href="{{ Route('summary') }}" style="text-decoration:none">
                        <div class="alert alert-heading bg-primary text-white">
                            <h4>Monto Recaudado</h4>
                            <h5>@if( is_null($index[0]->SUMA) )
                                    S/. 0
                                @else
                                    S/. {{ $index[0]->SUMA }}
                                @endif
                                <div class="float-sm-right">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-up-square-fill" viewBox="0 0 16 16">
                                        <path d="M2 16a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2zm6.5-4.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 1 0z"/>
                                    </svg>
                                </div>
                            </h5>
                        </div>
                    </a>
                    <div class="spa"></div>
                    <div class="card-deck">
                        <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                            <div class="card-header text-center">Cliente Nuevo</div>
                            <div class="card-body">
                                <a href="{{ Route('users.create') }}" class="text-white">
                                    <h5 class="card-title text-center">
                                        <i class="bi bi-person-plus-fill" style="font-size: 100px"></i>
                                    </h5>
                                </a>
                            </div>
                        </div>
                        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                            <div class="card-header text-center">Mostar Clientes</div>
                            <div class="card-body">
                                <a href="{{ Route('users.index') }}" class="text-white">
                                    <h5 class="card-title text-center">
                                        <i class="bi bi-person-lines-fill" style="font-size: 100px"></i>
                                    </h5>
                                </a>
                            </div>
                        </div>
                        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                            <div class="card-header text-center">Mostrar Prestamos</div>
                            <div class="card-body">
                                <a href="{{ Route('loans.index') }}" class="text-white">
                                    <h5 class="card-title text-center">
                                        <i class="bi bi bi-cash-stack" style="font-size: 100px"></i>
                                    </h5>
                                </a>
                            </div>
                        </div>
                        <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                            <div class="card-header text-center">Iniciar Ruta</div>
                            <div class="card-body">
                                <a href="{{ Route('payments.index') }}" class="text-white">
                                    <h5 class="card-title text-center">
                                        <i class="bi bi-speedometer2" style="font-size: 100px"></i>
                                    </h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
