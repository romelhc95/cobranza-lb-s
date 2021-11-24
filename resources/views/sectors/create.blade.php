@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Crear Sector</strong></div>

                <div class="card-body">

                    <form action="{{ route('sectors.store') }}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Sector (*)</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            @csrf
                            <input type="submit" value="Guardar" class="btn btn-sm btn-primary">
                            &nbsp;
                            <button value="Volver" class="btn btn-sm btn-danger" onclick="return window.history.back();"><i class="bi bi-backspace-fill"> Regresar</i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
