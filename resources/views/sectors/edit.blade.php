@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Actualizar Sector</strong></div>

                <div class="card-body">
                    <form action="{{ route('sectors.update', $sector) }}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Sector (*)</label>
                            <input type="text" name="name" class="form-control" required value="{{ old('name', $sector->name) }}">
                        </div>
                        <div class="form-group">
                            @csrf
                            @method('PUT')
                            <input type="submit" value="Actualizar" class="btn btn-sm btn-success">
                            <a href="{{ route('sectors.index') }}" class="btn btn-sm btn-danger float-right"><i class="bi bi-backspace-fill"> Regresar</i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
