document.getElementById("imagenInput").addEventListener("change", function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            // obtener el Base64 completo de la imagen
            const base64Full = e.target.result;
            // quitamos el prefijo data:image/png;base64, para almacenar solo el string
            const base64String = base64Full.split(",")[1];
           
            // mostramos el string Base64 en el div llamado imagenString,que es oculto y comprobamos que funciona
            document.getElementById("imagenString").textContent = base64String;
 
            document.getElementById("foto").value = base64String;
           
        };
        reader.readAsDataURL(file);
    }
});