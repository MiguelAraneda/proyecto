<?php 

    session_start();

    require_once "parciales/conexion.php"; #ARCHIVO DE CONEXION CON LA BASE DE DATOS

    if(!empty($_POST['usuario']) && !empty($_POST['pass'])){
        $records = $conn->prepare('SELECT id, usuario, pass FROM usuarios WHERE usuario=:usuario');
        $records->bindParam(':usuario', $_POST['usuario']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $message = '';
        #VERIFICA SI ESTA CORRECTO EL USUARIO, LO ALMACENA EN EL ID_USUARIOS Y REDIRIGE AL INICIO
        if(count($results) > 0 && password_verify($_POST['pass'], $results['pass'])){
            $_SESSION['user_id'] = $results['id'];
            header('Location: /proyecto/index.php');
        }
        else
        {
            $message = "Usuario o Contraseña incorrectos";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700;900&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    
    
        <?php if(!empty($message)): ?>
        <p><?= $message ?></p>
        <?php endif; ?>
            <div class="contenedor colegio  sombra">
                <section>
                    <img src="img/portada grande.jpg" alt="" width="690rem" height="450rem">
                </section> 

                <section class="contenedor-login">
                    <form action="index.php" method="post">

                        <h3>Ingreso de Usuarios</h3>

                        <input class="input" type="text" name="usuario" placeholder="Ingrese su Usuario">
                        <input class="input" type="password" name="pass" placeholder="Ingrese su Contraseña">
                        <input class="boton" type="submit" value="Ingresar">
                        <br>
                        <a href="registro.php">Registrarse</a></span>
                    </form>
                </section>    
            </div>
            
</body>
</html>