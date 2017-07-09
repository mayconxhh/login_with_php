<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sesiones en PHP</title>
  </head>
  <body>
    <div>
      <h1>Registrate</h1>
    </div>
    <div>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <h2>Porfavor llena los campos</h2>
        <div>
          <label for="usuario">Usuario: </label>
          <input type="text" name="usuario" required/>
        </div>
        <br>
        <div>
          <label for="password">Contraseña: </label>
          <input type="password" name="password" required/>
        </div>
        <br>
        <div>
          <label for="password2">Repite la contraseña: </label>
          <input type="password" name="password2" required/>
        </div>
        <br>
        <div>
          <input type="submit" value="Registrarse" />
        </div>
        <?php if(!empty($errores)): ?>
          <ul>
            <?php echo $errores; ?>
          </ul>
        <?php endif; ?>
      </form>
      <br>
      <div>
        <a href="index.php">Ya estoy registrado(a)! Iniciar sesión</a>
      </div>
    </div>
  </body>
</html>
