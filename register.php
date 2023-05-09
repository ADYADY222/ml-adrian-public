<?php

if(isset($_POST['submit'])) {
  
  // Colectam datele din formular
  $nume_lugar = $_POST['nombre_lugar'];
  $descriere_lugar = $_POST['descripcion_lugar'];
  $municipio = $_POST['municipio'];
  $url_info = $_POST['url_info'];
  $url_maps = $_POST['url_maps'];
  $imagine = $_FILES['imagine']['name'];
  $destinatie_imagine = "imagini/" . rand(1000,9000) . "-" . $imagine; // Generam un nume unic pentru imagine
  
  // Mutam imaginea in folderul corespunzator
  if(move_uploaded_file($_FILES['imagine']['tmp_name'], $destinatie_imagine)) {
    echo "<script>alert('Imaginea a fost incarcata cu succes!')</script>";
  } else {
    echo "<script>alert('Incarcarea imaginii a esuat!')</script>";
  }
  
}

?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Nuevo lugar que visitar | Descubriendo Gran Canaria</title>
    <link rel="stylesheet" href="style/style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
    <a href="index.html"><h1>Descubriendo Gran Canaria</h1></a>
	<div style="display: flex; justify-content: center;">
		<a href="register.php"><button>Nuevo Lugar que visitar</button></a>
		<a href="locations.html"><button>Lugares que no me puedo perder</button></a>
	</div>
  <div class="container">
    <div class="title">Nuevo lugar que visitar</div>
    <div class="content">
      <form method="post" action="procesare.php" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nombre del lugar:</span>
            <input type="text" id="error-message" name="nombre_lugar" maxlength="20" required>
          </div>
          <div class="input-box">
            <span class="details">Descripcion:</span> 
            <textarea class="test2 textarea" id="text2" name="descripcion_lugar" rows="5" cols="120" required maxlength="100"></textarea>
          </div>
          <div class="input-box">
            <span class="details">Municipio donde se encuentra: </span> 
            <select class="test4" name="municipio" id="municipio" required>
              <option value="Agaete">Agaete</option>
              <option value="Agüimes">Agüimes</option>
              <option value="Artenara">Artenara</option>
              <option value="Arucas">Arucas</option>
              <option value="Firgus">Firgus</option>
              <option value="Gáldar">Gáldar</option>
              <option value="Ingenio">Ingenio</option>
              <option value="La Aldea de San Nicolás">La Aldea de San Nicolás</option>
              <option value="Las Palmas de Gran Canaria">Las Palmas de Gran Canaria</option>
              <option value="Mogán">Mogán</option>
              <option value="Moya">Moya</option>
              <option value="San Bartolomé de Tirajana">San Bartolomé de Tirajana</option>
              <option value="Santa Brígida">Santa Brígida</option>
              <option value="Santa Lucía de Tirajana">Santa Lucía de Tirajana</option>
              <option value="Santa María de Guía de Gran Canaria">Santa María de Guía de Gran Canaria</option>
              <option value="Tejeda">Tejeda</option>
              <option value="Telde">Telde</option>
              <option value="Teror">Teror</option>
              <option value="Valleseco">Valleseco</option>
              <option value="Valsequillo de Gran Canaria">Valsequillo de Gran Canaria</option>
              <option value="Vega de San Mateo">Vega de San Mateo</option>
              </select>
              
                    </div>
                    <div class="input-box">
                      <span class="details">URL con Mas Informacion:</span>
                      <input type="text" name="url_info" required maxlength="100">
                    </div>
                    <div class="input-box">
                      <span class="details">URL con enlace a Google Maps:</span>
                      <input type="text" name="url_maps" required maxlength="100">
                    </div>
                    <div class="input-box">
                      <span class="details">Imagne:</span>
                      <input class="test22" type="file" id="imagine" name="imagine"><br><br>
                    </div>
                    <div class="button2">
                      <input type="submit" value="Enviar" name="submit">
                    </div>
                    
                </form>
              </div>
              </div>
              <script src="script.js"></script>
              </body>
              </html>