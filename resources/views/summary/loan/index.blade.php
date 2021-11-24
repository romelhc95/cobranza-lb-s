@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Prestado del día <strong>{{ Str::substr($summary[0]->created_at, 6, 2)}}-{{ Str::substr($summary[0]->created_at, 4, 2) }}-{{ Str::substr($summary[0]->created_at, 0, 4) }}</strong>&nbsp;&nbsp;&nbsp;
                    <form action="{{ route('summaryloan') }}" class="float-right" method="GET">
                        <input type="date" name="date" id="date" required>
                        <input type="submit" value="Prestado" class="btn btn-sm btn-warning">
                    </form>
                    <form action="{{ route('summarycollected') }}" class="float-right" method="GET">
                        <input type="date" name="date" id="date" required>
                        <input type="submit" value="Recaudado" class="btn btn-sm btn-success">&nbsp;
                    </form>
                </div>
                <div class="card-body">
                    <div class="container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Monto</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($summary as $s)
                                <tr>
                                    <td>
                                        {{ $s->full_name }}
                                    </td>
                                    <td>
                                        - {{ $s->payment }}
                                    </td>
                                </tr>
                                @endforeach    
                            </tbody>
                            <tfoot>
                                <tr>
                                  <th>Total</th>
                                  <th>{{ $total[0]->SUMA }}</th>
                                </tr>
                              </tfoot>
                        </table>
                    </div>
                    <a href="{{ route('home') }}" class="btn btn-sm btn-danger float-right"><i class="bi bi-backspace-fill"> Regresar</i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
