@extends('layouts/admin-layout')
 
@section('title', 'Subir Multimedia')
 
@section('content')
 
    <h1>Subir Multimedia</h1>
    @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
 
        @if(session('error'))
            <div class="alert alert-danger mt-3">
                {{ session('error') }}
            </div>
        @endif
    <!-- Formulario para subir multimedia -->
    <form method="POST" action="{{ route('relaciones.guardarMultimedia') }}" id="form-subir-imagen">
        @csrf  <!-- Protección CSRF -->
 
        <input type="hidden" name="tipo" value="{{ $tipo }}">
        <input type="hidden" name="fk" value="{{ $foreignkey }}">
        <div class="mb-3">
        <label for="imagenInput" class="form-label">Subir Imagen:</label>
        <input type="file" id="imagenInput" name="image" accept="image/png, image/jpeg" class="form-control">
    </div>
 
    <div id="imageContainer" style="margin-top: 20px;"></div>
    <div id="imagenString" style="display: none;"></div>
 
        <div class="mb-3">
 
            <input type="text" id="foto" name="foto" class="form-control" style="display: none;">
        </div>
       
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" id="descripcion" name="descripcion" class="form-control">
        </div>
 
   
 
        <div class="mb-3">
            <label for="fk" class="form-label">ID de Relación (Foreign Key)</label>
            <input type="number" id="fk" name="fk" class="form-control" value="{{ $foreignkey }}" required readonly>
 
        </div>
 
        <button type="submit" class="btn btn-primary">Subir Multimedia</button>
        <div class="form-group my-3">
            <a href="{{ route('retos.index')}}" class="btn btn-secondary">Volver</a>
       </div>
    </form>
@endsection
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/stringficar.js') }}"></script>
@endpush