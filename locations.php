<?php
// Funcție pentru a verifica dacă o variabilă are informații
function validateRequired($value) {
    return !empty($value);
}

// Funcție pentru a verifica dacă conținutul unei variabile nu depășește o anumită dimensiune
function validateSize($value, $size) {
    return strlen($value) <= $size;
}

// Funcție pentru a verifica dacă o variabilă conține o URL validă
function validateURL($value) {
    return preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=_|!:,.;]*[-a-z0-9+&@#\/%=_|]/i", $value);
}

$file = fopen("date.csv", "r");
$data = array();

while (!feof($file)) {
    $data[] = explode(";", fgets($file));
}

fclose($file);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <a href="index.html" style="text-decoration: none;">
    <h1>Descubriendo Gran Canaria</h1>
  </a>
  <div style="display: flex; justify-content: center;">
    <a href="register.html"><button>Nuevo Lugar que visitar</button></a>
    <a href="locations.html"><button>Lugares que no me puedo perder</button></a>
  </div>
  <div class="container2">
    <h1 class="text3">Lugares que no me puedo perder</h1>
    <table>
      <thead>
        <tr>
          <th>Nombre del lugar</th>
          <th>Description</th>
          <th>Municipio</th>
          <th>Url con mas informacion</th>
          <th>URL de Google Maps</th>
          <th>Imagen</th>
        </tr>
      </thead>
      
      <tbody>
      <?php
        foreach ($data as $place) {
          
          echo "<tr>";
          echo "<td>$place[0]</td>";
          echo "<td>$place[1]</td>";
          echo "<td>$place[2]</td>";
          echo "<td><a href='" . $place[3] . "'>Página Oficial de</a></td>";
          echo "<td><a href='" . $place[3] . "'><i class='fa-solid fa-location-dot' style=' --fa-bounce-start-scale-x: 1; --fa-bounce-start-scale-y: 1; --fa-bounce-jump-scale-x: 1; --fa-bounce-jump-scale-y: 1; --fa-bounce-land-scale-x: 1; --fa-bounce-land-scale-y: 1; ' ></i></a></td>";
          echo "<td><a href='imagini/".$place[5]."'target='_blank'><img src='imagini/".$place[5]."'width='200px'></a></td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

</body>

</html>
