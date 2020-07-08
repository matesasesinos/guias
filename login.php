<?php ob_start();
   session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/floating-labels.css">
    <title>Guias</title>
    

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
</head>
<body>
<?php
  if(isset($_POST['ingresar'])){
    if(!empty($_POST['email']) && !empty($_POST['password'])) {
        if($_POST['email'] === 'guias@guias.net' && $_POST['password'] === 'Gu4#254pÑ') {
          $_SESSION['valid'] = true;
          $_SESSION['timeout'] = time();
          $_SESSION['user'] = 'lucas';
          header('Location: guias.php');
        }
    }
  }
?>
<form class="form-signin" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
  <div class="text-center mb-4">

    <h1 class="h3 mb-3 font-weight-normal">Ingresar</h1>

  </div>

  <div class="form-label-group">
    <input type="email" name="email" id="input" class="form-control" placeholder="Email" required autofocus>
    <label for="input">Email</label>
  </div>

  <div class="form-label-group">
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Contraseña" required>
    <label for="inputPassword">Contraseña</label>
  </div>


  <button class="btn btn-lg btn-primary btn-block" type="submit" name="ingresar">Ingresar</button>
</form>


</body>
</html>

