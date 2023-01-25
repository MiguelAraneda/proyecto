<?php 
    require_once "parciales/conexion.php"; #ARCHIVO DE CONEXION CON LA BASE DE DATOS

    #INGRESO DE DATOS

    $message = '';

    if(!empty($_POST['usuario']) && !empty($_POST['pass'])){
        $sql = "INSERT INTO usuarios(usuario, pass) VALUES(:usuario, :pass)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':usuario', $_POST['usuario']);
        $password = password_hash($_POST['pass'], PASSWORD_BCRYPT);
        $stmt->bindParam(':pass', $password);

        if($stmt->execute()){
            $message = "Usuario creado correctamente";
        }
        else
        {
            $message = "Error al crear nuevo usuario";
        }
    
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700;900&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <?php 
    require "parciales/menu.php";   
    ?>
    <!-- MENSAJE DE USUARIO CREADO O DE ERROR -->
    <?php if(!empty($message)): ?>
        <p><?= $message ?></p>
        <?php endif; ?>
        <div class="contenedor colegio  sombra">
            <section>
                <img src="img/portada grande.jpg" alt="" width="690rem" height="450rem">
            </section> 

            <section class="contenedor-login">
                <form action="registro.php" method="post">

                <h1>Registro de Usuarios</h1> 

                    <input class="input" type="text" name="usuario" placeholder="Ingrese su Usuario">
                    <input class="input" type="password" name="pass" placeholder="Ingrese su Contraseña">
                        <input class="boton" type="submit" value="Send">

                    <br><br>
                    <a href="index.php">Ingresar Usuario</a></span>
                </form>
            </section>
        </div>
        

        
    <!-- <h1>Registro de Usuarios</h1>
           
        <input class="input" type="password" name="confirm_password" placeholder="Reingresa tú Contraseña"> -->
   
</body>
</html>