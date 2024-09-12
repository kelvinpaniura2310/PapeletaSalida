<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">Crear Nuevo Área</h3>
    </div>
    <div class="card-body">
        <form id="formCrearArea">
            <div class="row">
                <div class="col-1">
                    <input type="text" id="id_area" name="id_area" class="form-control" placeholder="ID" maxlength="3" style="text-transform: uppercase;" required>
                </div>
                <div class="col-4">
                    <input type="text" id="nombre_area" name="nombre_area" class="form-control" placeholder="Nombre del Área" required>
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-info">Crear Área</button>
                </div>
            </div>
        </form>
        <div id="mensaje"></div> <!-- Para mostrar los mensajes de éxito o error -->
    </div>
    <!-- /.card-body -->
</div>

<script>
document.getElementById("formCrearArea").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevenir el envío tradicional del formulario

    // Obtener los valores del formulario
    let idArea = document.getElementById("id_area").value;
    let nombreArea = document.getElementById("nombre_area").value;

    // Validar que ambos campos estén llenos
    if (idArea.trim() === "" || nombreArea.trim() === "") {
        document.getElementById("mensaje").innerHTML = "<div class='alert alert-danger alert-dismissible'>Por favor, complete todos los campos.</div>";
        return;
    }

    // Crear la solicitud AJAX
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "controller/newarea.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Enviar la solicitud con los datos
    xhr.send("id_area=" + encodeURIComponent(idArea) + "&nombre_area=" + encodeURIComponent(nombreArea));

    // Manejar la respuesta
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            // Mostrar el mensaje de éxito o error en la página
            document.getElementById("mensaje").innerHTML = xhr.responseText;

            // Limpiar el formulario
            document.getElementById("formCrearArea").reset();
        }
    };
});
</script>
