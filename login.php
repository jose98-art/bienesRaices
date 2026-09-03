<?php
    require 'includes/config/database.php';
    $db = concetarDB();
    // Autenticar el usuario

    $errores = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";

        $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
        $password = mysqli_real_escape_string($db,  $_POST['password']);

        if(!$email){
            $errores[] = 'El email es obligatorio o no es valido';
        }

        if(!$password){
            $errores[] = 'El passoword es obligatorio';
        }

        if(empty($errores)){
            // Revisar si el usuario existe
            $query = "SELECT * FROM usuarios WHERE email = '$email' ";
            $resultado = mysqli_query($db, $query);

            if($resultado->num_rows){
                // Revisar si el password es correcto
                $usuario = mysqli_fetch_assoc($resultado);
                // var_dump($usuario[$password]);

                // Verificar si el pasword es correcto o no

                $auth = password_verify($password, $usuario['password']);
                if($auth){
                    // El usuario esta autenticado
                    session_start();
                    // llenar el arreglo de la sesion
                    $_SESSION['usuario']= $usuario['email'];
                    $_SESSION['login']=true;

                    header('Location: /admin');
                  
                }else{
                    $errores[] = "El password es incorrecto";
                }
            }else{
                $errores[] = "El usuario no existe";
            }
        }
    }
    
    // Inlcuye el header
    require 'includes/funciones.php';
    incluirTemplate('header');
 ?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesión</h1>

        <?php foreach($errores as $error):?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>
        <form method="POST" class="formulario">
        <fieldset>
                <legend>Email y Password</legend>
 
                <label for="email">Email</label>
                <input id="email" name="email" type="email" placeholder="Tu Email" >
 
                <label for="password">Password</label>
                <input id="password" name="password" type="password" placeholder="Tu Password" >

            </fieldset>

            <input type="submit" value="INICIAR SESIÓN" class="boton boton-verde">
        </form>


    </main>
    <?php
    incluirTemplate('footer');
    ?>