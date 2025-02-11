<h1>Agregar Nueva Sede y Centro</h1>
 
<form action="{{ route('centros.store') }}" method="POST">
    @csrf {{-- Protección contra ataques CSRF --}}
 
    <h2>Sede</h2>
    <label>Nombre de la sede:</label>
    <input type="text" name="sede_nombre" required>
 
    <label>Dirección de la sede:</label>
    <input type="text" name="sede_direccion" required>
 
    <label>Anotaciones de la sede:</label>
    <textarea name="sede_anotaciones"></textarea>
 
    <h2>Centro</h2>
    <label>Nombre del centro:</label>
    <input type="text" name="centro_nombre" required>
 
    <label>Dirección del centro:</label>
    <input type="text" name="centro_direccion" required>
 
    <label>Anotaciones del centro:</label>
    <textarea name="centro_anotaciones"></textarea>
 
    <button type="submit">Guardar</button>
</form>
 
<hr>