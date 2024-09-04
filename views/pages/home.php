<script>
    function cargarContenido(archivoPHP) {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", archivoPHP, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById("contenido").innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    }
</script>
<div id="contenido">
    <!-- Aquí se cargará el contenido según el archivo seleccionado -->
    <div class="cont">
        <div class="guide">
            <img src="views\resources\img\1.jpg" alt="Guía 1" class="active">
            <img src="views\resources\img\2.jpg" alt="Guía 2">
            <img src="views\resources\img\3.jpg" alt="Guía 3">
            <img src="views\resources\img\4.jpg" alt="Guía 4">
            <img src="views\resources\img\5.jpg" alt="Guía 4">
        </div>

        <script>
            const guideImages = document.querySelectorAll('.guide img');
            let guideImageIndex = 0;

            function changeGuideImage() {
                guideImages[guideImageIndex].classList.remove('active');
                guideImageIndex = (guideImageIndex + 1) % guideImages.length;
                guideImages[guideImageIndex].classList.add('active');
            }

            setInterval(changeGuideImage, 5000);
        </script>
    </div>
</div>