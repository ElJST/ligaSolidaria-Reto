<h1>Centros</h1>
 
<form action="{{ route('centros.show') }}" method="GET">
    <select name="centro_id">
        @foreach ($centros as $centro)
            <option value="{{ $centro->id_centro }}">{{ $centro->nombre }} - {{ $centro->direccion }}</option>
        @endforeach
    </select>
    <button type="submit">Ver detalles</button>
</form>