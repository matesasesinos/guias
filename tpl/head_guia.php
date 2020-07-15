
<?php session_start();

  if(!isset($_SESSION['user'])) {
    header('Location: login.php?error=1');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <title>Guias</title>
</head>
<body>

<div class="container mb-5">
    <div class="row">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Administración</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a href="guias.php" class="nav-link">Guias</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="agregar_guia.php">Cargar Guia</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="importar.php">Importar Guias</a>
      </li>
    </ul>
  </div>
</nav>
    </div>

</div>