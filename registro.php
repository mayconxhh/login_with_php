<?php

  session_start();

  // Verificación de sesión usuario
  if (isset($_SESSION['usuario'])) {
    header('Location: index.php');
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = filter_var(strtoLower($_POST['usuario']), FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    $errores = '';
    // Comprobacion de datos insertados
    if (empty($usuario) || empty($password) || empty($password2)) {
      // Error si un dato no fue llenado correctamente
      $errores .= '<li>Por favor rellena los campos correctamente</li>';
    } else {
      // Conexion con base de datos
      try {
        $conexion = new PDO('mysql:host=localhost;dbname=session', 'root', '12345678');
      } catch (PDOException $e) {
        echo 'Error: '. $e->getMessage();
      }

      // Comprobacion de existenia de nombre de usuario
      $statement = $conexion -> prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1');
      $statement -> execute(array(':usuario' => $usuario));
      $resultado = $statement->fetch();

      if ($resultado !== false) {
        $errores .= '<li>El nombre de usuario ya existe</li>';
      }

      // Semiencriptado de contraseña
      $password = hash('sha512', $password);
      $password2 = hash('sha512', $password2);

      if ($password !== $password2) {
        $errores .= '<li>Las contraseñas no son iguales</li>';
      }

    }

    // Registro de nuevo usuario si no existen errores
    if ($errores === '') {
      $statement = $conexion->prepare('INSERT INTO usuarios (id, username, password) VALUES (null, :username, :password)');
      $statement -> execute(array(
        ':username' => $usuario,
        ':password' => $password
      ));

      header('Location: login.php');
    }

  }

  require 'views/registro.view.php';

 ?>
