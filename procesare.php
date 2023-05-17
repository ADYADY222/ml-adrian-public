<!DOCTYPE html>
<html>

<head>
	<title>Procesare formular</title>
</head>

<body>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Preiau valorile trimise prin formular
    $nombre_lugar = $_POST["nombre_lugar"];
    $descripcion_lugar = $_POST["descripcion_lugar"];
    $municipio = $_POST["municipio"];
    $url_info = $_POST["url_info"];
    $url_maps = $_POST["url_maps"];

    // Verificam si incarcam imaginea
    if (isset($_FILES['imagine'])) {
        $nume_imagine = $_FILES['imagine']['name'];
        $tmp_imagine = $_FILES['imagine']['tmp_name'];

        // Transforma imaginea in PNG
        $image_path = 'imagini/'.$nume_imagine;
        $img = imagecreatefromstring(file_get_contents($tmp_imagine));
        imagepng($img, $image_path);
        imagedestroy($img);
    }
    // construirea unei linii de date pentru fisierul CSV
    $linie = "\n" . $nombre_lugar . ';' . $descripcion_lugar . ';' . $municipio . ';' . $url_info . ';' . $url_maps . ';' . $nume_imagine;

    // deschidere fisier si scriere linie de date
    $fisier_csv = 'date.csv';
    $handle = fopen($fisier_csv, 'a');
    fwrite($handle, $linie);
    fclose($handle);
    $error = false;

    if ($nombre_lugar == "") {
        echo "<br>ERROR. The name is empty";
        $error = true;
    }

    if ($descripcion_lugar == "") {
        echo "<br>ERROR. The description is empty";
        $error = true;
    }

		// Afisez valorile pe pagina
		echo "<p>Nombre del lugar: $nombre_lugar</p>";
		echo "<p>Descripcion: $descripcion_lugar</p>";
		echo "<p>Municipio: $municipio</p>";
		echo "<p>URL con Mas Informacion: $url_info</p>";
		echo "<p>URL con enlace a Google Maps: $url_maps</p>";
		if (isset($nume_imagine)) {
			echo "<p><img src='imagini/$nume_imagine'></p>";
		}
		}
		?>
		<div class="button2">
		<a href="http://localhost/ml-adrian-public/register.html"><button>Volver a registrarse</button></a>
		</div>
    
</body>

</html>