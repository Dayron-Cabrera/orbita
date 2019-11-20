<?php

  require('../../pages/connectDB.php');

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (usuario, email, password) VALUES (:usuario, :email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':usuario', $_POST['usuario']);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'Usuario Creado';
    } else {
      $message = 'Lo sentimos, no hemos logrado crear tu Usuario';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SignUp</title>
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
    <form action="signup.php" method="POST">
    <h1>Registrarse</h1>
    <label for="username">Usuario</label>
      <input name="usuario" type="text" placeholder="Nombre de Usuario" autocomplete="off">
    <label for="username">Email</label>
      <input name="email" type="text" placeholder="Ingresa un Email">
      <label for="username">Contraseña</label>
      <input name="password" type="password" placeholder="Ingresa una contraseña">
      <label for="username">Confirmar Contraseña</label>
      <input name="confirm_password" type="password" placeholder="Confirma Contraseña">
      <input type="submit" value="Registrar">
<br>
      <span><a href="login.php">Iniciar Sesión</a></span>
    </form>
    </div>

  </body>
</html>
