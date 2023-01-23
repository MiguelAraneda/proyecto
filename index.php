<?php 

    session_start();

    require_once "parciales/conexion.php"; #ARCHIVO DE CONEXION CON LA BASE DE DATOS

    if(!empty($_POST['usuario']) && !empty($_POST['password'])){
        $records = $conn->prepare('SELECT id_usuarios, usuario, password FROM usuarios WHERE usuario=:usuario');
        $records->bindParam(':usuario', $_POST['usuario']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $message = '';
        if(count($results) > 0 && password_verify($_POST['password'], $results['password'])){
            $_SESSION['user_id'] = $results['id_usuarios'];
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
    <title>Matriculas</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
        <div class="cabecera" >
            <img src="img/Cabecera pagina liceo.jpg" alt="" width="1160px" height="100px">
        </div>
    </header>
<br><br>
    <main>
    <?php include "parciales/login.php" ?>
    </main>
    
    <br><br>
    <footer>
        <?php include "parciales/footer.php" ?>
    </footer>
</body>
</html>