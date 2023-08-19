<?php
$api_url = 'https://climatologia.meteochile.gob.cl/application/productos/estacionesRedEma';
$response = file_get_contents($api_url);
$data = json_decode($response, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"></script>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<nav class="navbar bg-primary" data-bs-theme="dark">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">Estaciones Metereológicas</span>
  </div>
</nav>
<br>
<div class="container">
<table id="miTabla" class="display nowrap" style="width:100%">
  <thead>
    <tr>
      <th>Codigo</th>
      <th>Nombre</th>
      <th>Latitud</th>
      <th>Longitud</th>
      <th>Altura</th>
      <th>Nombre Region</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $estaciones = $data['datosEstacion'];
        foreach ($estaciones as $item) {
            echo '<tr>';
            echo '<td>' . $item['codigoNacional'] . '</td>';
            echo '<td>' . $item['nombreEstacion'] . '</td>';
            echo '<td>' . $item['latitud'] . '</td>';
            echo '<td>' . $item['longitud'] . '</td>';
            echo '<td>' . $item['altura'] . '</td>';
            echo '<td>' . $item['NombreRegion'] . '</td>';
            echo '</tr>';
        }
    ?>
  </tbody>
</table>
<script> $(document).ready(function() {
            $('#miTabla').DataTable({
                language: {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                }
            });
        });</script>
</div>
</body>
</html>