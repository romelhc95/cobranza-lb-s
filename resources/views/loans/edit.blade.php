@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Actualizar Préstamo</strong></div>

                <div class="card-body">
                    <form action="{{ route('loans.update', $loan) }}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Cliente (*)</label>
                            <input type="text" name="user_id" class="form-control" value="{{ old('loan', $loan->user->fullname) }}" disabled>
                        </div>
                        {{-- <div class="form-group">
                            <label>Prestamo (*)</label>
                            <input type="text" name="loan_number" class="form-control" value="{{ old('loan', $loan->loan_number) }}" disabled>
                        </div> --}}
                        <div class="form-group">
                            <label>Monto (*)</label>
                            <input type="text" name="loan" class="form-control" required value="{{ old('loan', $loan->loan) }}">
                        </div>
                        <div class="form-group">
                            <label>Interés (*)</label>
                            <input type="text" name="monetary_interest" class="form-control" required value="{{ old('loan', $loan->monetary_interest) }}">
                        </div>
                        <div class="form-group">
                            <label>Monto a Pagar (*)</label>
                            <input type="text" name="amount" class="form-control" value="{{ old('loan', $loan->amount) }}" disabled>
                        </div>
                        <div class="form-group">
                            @csrf
                            @method('PUT')
                            <input type="submit" value="Actualizar" class="btn btn-sm btn-success">
                            <a href="{{ route('loans.index') }}" class="btn btn-sm btn-danger float-right">Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
