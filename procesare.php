<!DOCTYPE html>
<html>

<head>
	<title>Procesare formular</title>
</head>

<body>

<?php
include 'include/database.php';

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

        // Adaugam imaginea in baza de date
        $image_data = file_get_contents($image_path);
        $image_data = mysqli_real_escape_string($conn, $image_data);
    }

    $municipii = array(
        "1" => "Agaete",
        "2" => "Agüimes",
        "3" => "Artenara"
        // Adăugați aici toate celelalte municipii și valorile corespunzătoare
    );

    $error = false;

    if ($nombre_lugar == "") {
        echo "<br>ERROR. The name is empty";
        $error = true;
    }

    if ($descripcion_lugar == "") {
        echo "<br>ERROR. The description is empty";
        $error = true;
    }

	// Adaugam imaginea in baza de date
$image_data = file_get_contents($image_path);
$image_data = mysqli_real_escape_string($conn, $image_data);

// Afisam continutul variabilei $image_data
echo "<pre>";
echo htmlspecialchars($image_data);
echo "</pre>";


    if ($municipio == "0") {
        echo "<br>ERROR. Please select a municipality";
        $error = true;
    } else {
        $municipio_name = mysqli_real_escape_string($conn, $_POST['municipio']);
    }

    if ($url_info == "") {
        echo "<br>ERROR. The info URL is empty";
        $error = true;
    } else {
        $url_info = mysqli_real_escape_string($conn, $_POST['url_info']);
    }

    if ($url_maps == "") {
        echo "<br>ERROR. The maps URL is empty";
        $error = true;
    } else {
        $url_maps = mysqli_real_escape_string($conn, $_POST['url_maps']);
    }

    // Verificare erori
    if (!$error) {
        // Salvează datele în baza de date cu numele municipiului corespunzător
        $sql = "INSERT INTO register (Nombre, Description, Municipio, URL, GURL, Image) VALUES ('$nombre_lugar', '$descripcion_lugar', '$municipio_name', '$url_info', '$url_maps', '$image_data')";

        # inserarea înregistrării cu imaginea în baza de date
        if (mysqli_query($conn, $sql)) {
			// Datele au fost salvate cu succes
			echo "Datele au fost înregistrate cu succes în baza de date.";
		} else {
			// A apărut o eroare la salvarea datelor
			echo "Eroare la înregistrarea datelor: " . mysqli_error($conn);
		}
		}

		// Închidere conexiune la baza de date
		mysqli_close($conn);

		// Afisez valorile pe pagina
		echo "<p>Nombre del lugar: $nombre_lugar</p>";
		echo "<p>Descripcion: $descripcion_lugar</p>";
		echo "<p>Municipio: $municipio_name</p>";
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