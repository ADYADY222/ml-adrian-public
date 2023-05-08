<!DOCTYPE html>
<html>
<head>
	<title>Procesare formular</title>
</head>
<body>

<?php

// Verificăm dacă s-au trimis date prin metoda POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	// Preiau valorile trimise prin formular
	$nombre_lugar = $_POST["nombre_lugar"];
	$descripcion_lugar = $_POST["descripcion_lugar"];
	$municipio = $_POST["municipio"];
    $url_info = $_POST["url_info"];
    $url_maps = $_POST["url_maps"];

	// Afisez valorile pe pagina
	echo "<p>Nombre del lugar: $nombre_lugar</p>";
	echo "<p>Descripcion: $descripcion_lugar</p>";
	echo "<p>Municipio: $municipio</p>";
    echo "<p>URL con Mas Informacion: $url_info</p>";
    echo "<p>URL con enlace a Google Maps: $url_maps</p>";
}

?>

</body>
</html>