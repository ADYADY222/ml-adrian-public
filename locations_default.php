<?php
$file = fopen("date.csv", "r"); // deschidem fisierul data.csv in modul de citire

// initializam array-ul de date
$data = array();

while(!feof($file)) {
  $data[] = explode(";",fgets($file));
}

/*
// citim fiecare linie din fisier pana ajungem la sfarsitul lui
while (($row = fgetcsv($file)) !== FALSE) {
    $data[] = $row; // adaugam linia curenta (sub forma unui array) la array-ul de date
}
*/

print_r($data);

fclose($file); // inchidem fisierul

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro-v6@44659d9/css/all.min.css" rel="stylesheet" type="text/css" />
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
          <th>Visitado</th>
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
        foreach ($data as $row) {
          
            //echo "<td><input type='checkbox' id='" . $row[1] . "' name='" . $row[1] . "' value='" . $row[1] . "'></td>";
            echo "<td><input type='checkbox' id='visitado' name='visitado' value='1'></td>";
            echo "<td>" . $row[0] . "</td>";
            echo "<td>" . $row[1] . "</td>";
            echo "<td>" . $row[2] . "</td>";
            echo "<td><a href='" . $row[3] . "'>Página Oficial de " . $row[3] . "</a></td>";
            
            if(isset($row[5])) {
              echo "<td><a href='" . $row[4] . "'><i class='fa-duotone fa-map-location-dot fa-bounce' style=' --fa-bounce-start-scale-x: 1; --fa-bounce-start-scale-y: 1; --fa-bounce-jump-scale-x: 1; --fa-bounce-jump-scale-y: 1; --fa-bounce-land-scale-x: 1; --fa-bounce-land-scale-y: 1; ' ></i></a></td>";
            } else {
              echo "<td></td>";
            }
            
            if(isset($row[6])) {
              echo "<td><img class='pozica' src='" . $row[5] . "' alt='" . $row[5] . "'></td>";
            } else {
              echo "<td></td>";
            }

          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

</body>

</html>
