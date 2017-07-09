<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sesiones en PHP</title>
  </head>
  <body>
    <div>
      <h1>Inicia sesión</h1>
    </div>
    <div>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <h2>Porfavor inicie sesión</h2>
        <div>
          <label for="usuario">Usuario: </label>
          <input type="text" name="usuario">
        </div>
        <br>
        <div>
          <label for="password">Contraseña: </label>
          <input type="password" name="password">
        </div>
        <br>
        <div>
          <input type="submit" value="Iniciar sesión">
        </div>
        <?php if(!empty($errores)): ?>
          <ul>
            <?php echo $errores; ?>
          </ul>
        <?php endif; ?>
      </form>
      <br>
      <div>
        <a href="registro.php">No tienes una cuenta aún! Registrate</a>
        <br>
        <a href="#">Olvidé mi contraseña</a>
      </div>
    </div>
  </body>
</html>
