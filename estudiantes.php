<?php 
    require_once "parciales/conexion.php"; #ARCHIVO DE CONEXION CON LA BASE DE DATOS

    #INGRESO DE DATOS

    $message = '';

    if(!empty($_POST['fechaMatricula']) && !empty($_POST['curso'])){
        $sql = "INSERT INTO matriculas(fechaMatricula) VALUES(:numMatricula)";
        $sql = "INSERT INTO cursos(nombreCurso) VALUES(:curso)";
        $sql = "INSERT INTO estudiantes(primerApellidoEst, segundoApellidoEst, nombresEst, nombreSocialEst, fecNacEst, rutEst, edad, telefonoEst, emailEst, nacionalidadEst, hermanosEst, direccionEst, villaEst, emergenciaAvisarEst, avisarEst1, avisarEst2, avisarEst3, direccionAvisarEst, villaAvisarEst, viveConEst) VALUES(:apellido1, :apellido2, :nombres, :nomSocial, :rut, :fecNacimiento, :edad, :nacionalidad, :telefono, :email, :hermanos, :direccion, :poblacion, :emergenciAvisar, :telefonoCasa, :telefonoTrabajo, :celular, :direccionAvisar, :poblacionAvisar, :viveCon)";
        $sql = "INSERT INTO comuna(nombreComuna) VALUES(:comuna)";
        $sql = "INSERT INTO comuna(nombreComuna) VALUES(:comunAvisar)";
        $sql = "INSERT INTO region(nombreRegion) VALUES(:region)";
        $sql = "INSERT INTO region(nombreRegion) VALUES(:regionAvisar)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':fechaMatricula', $_POST['fechaMatricula']);
        $stmt->bindParam(':curso', $_POST['curso']);

        if($stmt->execute()){
            $message = "Datos Ingresados correctamente";
        }
        else
        {
            $message = "Error al Ingresar los Datos";
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
        <?php include "parciales/menu.php" ?>
    </header>

<main>
    <!-- MENSAJE DE USUARIO CREADO O DE ERROR -->
    <?php if(!empty($message)): ?>
        <p><?= $message ?></p>
        <?php endif; ?>
    <div class="contenedor sombra formulario">
        <div class="formulario">
            <form action="registro.php" method="post">
                <fieldset>
                    <div>
                        <legend>Ficha de Matrícula 2023</legend>
                    </div>
                        <label for="">Número de Matrícula</label>
                        <input type="int" name="numMatricula">

                        <label for="">Fecha de Matrícula</label>
                        <input type="date" name="fechaMatricula">

                        <label for="">Fecha de Retiro</label>
                        <input type="date" name="fechaRetiro">

                        <label for="">Curso</label>
                        <input type="text" name="curso"> 
                            
                    <br><br>
                </fieldset>
            </form>
        </div>
        <div class="formulario-estudiante">
            <form action="registro.php" method="post">
                <fieldset>
                    <div>
                        <legend>DATOS DEL ESTUDIANTE</legend>
                    </div>
                        
                        <label for="">Primer Apellido</label>
                        <input type="text" name="apellido1">
                        
                        
                        <label for="">Segundo Apellido</label>
                        <input type="text" name="apellido2">
                        
                        
                        <label for="">Nombres</label>
                        <input type="text" name="nombres">
                        
                        
                        <label for="">Nombre Social</label>
                        <input type="text" name="nomSocial">        
                    <br><br>
                        <label for="">Rut</label>
                        <input type="text" name="rut">
                        <label for="">Fecha de Nacimiento</label>
                        <input type="date" name="fecNacimiento">
                        <label for="">Edad</label>
                        <input type="int" name="edad">
                        <label for="">Nacionalidad</label>
                        <input type="text" name="nacionalidad">
                    <br><br>
                        <label for="">Teléfono</label>
                        <input type="text" name="telefono">
                        <label for="">Correo Electrónico</label>
                        <input type="email" name="email">
                        <label for="">Número de Hermanos</label>
                        <input type="int" name="hermanos">
                    <br><br>
                        <label for="">Dirección - Calle - Número</label>
                        <input type="text" name="direccion">
                        <label for="">Villa o Población</label>
                        <input type="text" name="poblacion">
                        <label for="">Comuna</label>
                        <input type="text" name="comuna">
                        <label for="">Región</label>
                        <input type="text" name="region">
                    <br><br>
                        <label for="">En caso de emergencia avisar a: </label>
                        <input type="text" name="emergenciAvisar">
                    <br><br>
                        <label for="">Teléfono Casa</label>
                        <input type="text" name="telefonoCasa">
                        <label for="">Teléfono Trabajo</label>
                        <input type="text" name="telefonoTrabajo">
                        <label for="">Celular</label>
                        <input type="text" name="celular">
                    <br><br>
                        <label for="">Dirección - Calle - Número</label>
                        <input type="text" name="direccionAvisar">
                        <label for="">Villa o Población</label>
                        <input type="text" name="poblacionAvisar">
                        <label for="">Comuna</label>
                        <input type="text" name="comunAvisar">
                        <label for="">Región</label>
                        <input type="text" name="regionAvisar">
                    <br><br>
                        <label for="">El Estudiante vive con:</label>
                            <select name="" id="viveCon">
                                <option value="">Seleccione Opción</option>
                                <option value="">Ambos Padres</option>
                                <option value="">Solo Padre</option>
                                <option value="">Solo Madre</option>
                                <option value="">Abuelos</option>
                                <option value="">Otros</option>
                            </select>
                    <br>
                </fieldset>
                </form>
        </div>
            
        <div class="avanzar">
            <p>1 de 4</p>
            <input class="boton" type="submit" value="Guardar">
        </div>
        <br><br>
        </div>
    </main>
    <br><br>
    <footer>
        <?php include "parciales/footer.php" ?>
    </footer>
</body>
</html>