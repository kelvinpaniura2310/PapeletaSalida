<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Crear Nuevo Rol</h3>
    </div>
    <div class="card-body">
        <form action="">
            <div class="row">
                <div class="col-1">
                    <input type="text" class="form-control" placeholder="ID" maxlength="3" style="text-transform: uppercase;" required>
                </div>
                <div class="col-4">
                    <input type="text" class="form-control" placeholder="Nombre del Rol">
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-info">Crear Rol</button>
                </div>
            </div>
        </form>
        <div id="mensaje"></div> <!-- Para mostrar los mensajes de éxito o error -->
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
<script>
document.getElementById("formCrearRol").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevenir el envío tradicional del formulario

    // Obtener los valores del formulario
    let idRol = document.getElementById("id_rol").value;
    let nombreRol = document.getElementById("nombre_rol").value;

    // Validar que ambos campos estén llenos
    if (idRol.trim() === "" || nombreRol.trim() === "") {
        document.getElementById("mensaje").innerHTML = "<div class='alert alert-danger'>Por favor, complete todos los campos.</div>";
        return;
    }

    // Crear la solicitud AJAX
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "crear_rol.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Enviar la solicitud con los datos
    xhr.send("id_rol=" + encodeURIComponent(idRol) + "&nombre_rol=" + encodeURIComponent(nombreRol));

    // Manejar la respuesta
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            // Mostrar el mensaje de éxito o error en la página
            document.getElementById("mensaje").innerHTML = xhr.responseText;

            // Limpiar el formulario
            document.getElementById("formCrearRol").reset();
        }
    };
});
</script>
