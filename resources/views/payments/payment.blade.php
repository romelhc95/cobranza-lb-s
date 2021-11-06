@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Nuevo Préstamo</strong></div>

                <div class="card-body">

                    <form action="{{ route('loans.store') }}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Cliente  (*)</label>
                            <select type="text" name="user_id" class="form-control" required>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ old('loan', $user->first_name.' '.$user->second_name.' '.$user->last_name.' '.$user->second_last_name) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label># Préstamo (*)</label>
                            <input type="number" name="loan_number" class="form-control" placeholder="Ingrese numero de préstamo" required>
                        </div>
                        <div class="form-group">
                            <label>Monto (*)</label>
                            <input type="text" name="loan" class="form-control amount-input" id="amount" placeholder="Ingrese monto de préstamo" required>
                        </div>
                        <div class="form-group">
                            <label>Interés %(*)</label>
                            <input type="text" name="monetary_interest" class="form-control" id="utility" placeholder="Ingrese interés en N%" required>
                        </div>
                        <div class="form-group">
                            <label for="payment_number">Cuotas:</label>
                            <select name="payment_number" class="form-control" id="payment_number">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5" selected>5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                            </select>
                        </div>
                        <div class="form-group text-center total-box hidden">
                            <h4>Total + Interes</h4>
                            <h2 id="total_show"></h2>
                            <h4>En cuotas de:</h4>
                            <h2 id="quote"></h2>
                        </div>
                        <div class="form-group">
                            @csrf
                            <input type="submit" value="Guardar" class="btn btn-sm btn-primary">
                            &nbsp;
                            <button value="Volver" class="btn btn-sm btn-danger" onclick="return window.history.back();">Regresar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
