<?php
  session_start();

  require('pages/connectDB.php');

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, usuario, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }

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
    <title>Orbita</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Damion&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
  <header class="header" data-animate-header-container id="inicio"> 
    <!--Hemos utilizado la libreria de Jquery para identificar la posicion del document dentro del window para 
        y asi animar el header dentro de las diferentes secciones del proyecto -->
      <menu class="header-bar " data-animate-header>
        <a href="#inicio">
          <figure class="logo">
            <img src="assets/img/orbita.ico" alt="" />
            <h1>ORBITA</h1>
          </figure>
        </a>
       <div class="user-if">   
        <?php if(!empty($user)): ?>
      <h4>
        Bienvenido: <?= $user['usuario']; ?>
      </h4>
        </div>
      <?php endif; ?>
       

        <nav class="header-nav">   

    <?php if(!empty($user)): ?>  
      <a href="assets/php/logout.php">
        <h4>Salir</h4>    
      </a>
      <a href="assets/php/logout.php" class="social-link logout"></a>
      <a
            href="#main" class="social-link category"
          ></a>
          <a
            href="shop.php" class="social-link car"
          ></a>
    
    <?php else: ?>

      <a href="assets/php/signup.php"><h4>Registrarse</h4></a>
      <a href="assets/php/signup.php" class="social-link category"  ></a>
      <a href="assets/php/login.php" class="social-link login"></a>
       

    <?php endif; ?>
      
          
        </nav>
      </menu>
    </header>
    <article class="article">
      <header class="article-header">
      <div class="loginboxin">

<form action="login.php" method="POST">
  <h1>Login</h1>
  <label for="username">Usuario</label>
  <input name="usuario" type="text" placeholder="Usuario" autocomplete="off">
  <label for="username">Contraseña</label>
  <input name="password" type="password" placeholder="Contraseña">
  <input type="submit" value="Iniciar Sesión">
  <br>
  <span><a href="assets/php/signup.php">Registrarse</a></span>
</form>

</div>

        <a href="#main" class="down-arr parpadea"> &#8595; </a>
      </header>
    </article>
    
    <section class="article-section" data-animate-header-target></section>
      <br>
      <br>
      <br>
      <br>

     <section class="about" >
        <div class="about-description">
        <div class="about-description-image">
        <figure>
        <img src="assets/img/dispositivo.png" alt="">
        </figure>
        </div>
        <div class="about-description-data">
         <h3>SOBRE EL PROYECTO</h3>
<br>
        <p> Aqui va la descripción</p>
         <br>
        <p> Cabe destacar que la vision de este sitio hace referencia a la cracion de una pagina orientada al 
        e-commerce, siendo esta una interfaz orientada al usuario y no un punto de venta para el vendedor.
        </p>

        </div >
      
</div>
        
     </section>  
    <br id="main">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>


    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/index.js"></script>
  </body>
</html>
