<?php 

    session_start();

    require_once "conexion.php"; #ARCHIVO DE CONEXION CON LA BASE DE DATOS

    if(!empty($_POST['email']) && !empty($_POST['password'])){
        $records = $conn->prepare('SELECT id, email, password FROM usuarios WHERE email=:email');
        $records->bindParam(':email', $_POST['email']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $message = '';
        if(count($results) > 0 && password_verify($_POST['password'], $results['password'])){
            $_SESSION['user_id'] = $results['id'];
            header('Location: /login');
        }
        else
        {
            $message = "Email o Contraseña incorrectos";
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
                    <form action="login.php" method="post">

                        <h3>Ingreso de Usuarios</h3>

                        <input class="input" type="text" name="email" placeholder="Ingrese su Email">
                        <input class="input" type="password" name="password" placeholder="Ingrese su Contraseña">
                        <input class="boton" type="submit" value="Send">
                        <br>
                        <a href="registrarse.php">Registrarse</a></span>
                    </form>
                </section>    
            </div>
            
</body>
</html>