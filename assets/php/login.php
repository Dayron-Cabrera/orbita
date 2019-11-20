<?php

  session_start();

  require('../../pages/connectDB.php');

  if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, usuario, password FROM users WHERE usuario = :usuario');
    $records->bindParam(':usuario', $_POST['usuario']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: ../../index.php");
    } else {
      $message = 'Los datos ingresados no Coinciden';
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="../images/letra-r.ico" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body class="user-log">

  <div class="regresar-row">
      <a href="../../index.php">&#10140;</a>
    </div>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    
   
<div class="loginbox">

    <form action="login.php" method="POST">
      <h1>Login</h1>
      <label for="username">Usuario</label>
      <input name="usuario" type="text" placeholder="Usuario" autocomplete="off">
      <label for="username">Contraseña</label>
      <input name="password" type="password" placeholder="Contraseña">
      <input type="submit" value="Iniciar Sesión">
      <br>
      <span><a href="signup.php">Registrarse</a></span>
    </form>

    </div>

  </body>
</html>
