<?php
//Autenticar el usuario
require 'includes/config/database.php';
$conexion = conectarDB();
$errores = [];
if ($_SERVER['REQUEST_METHOD'] === "POST") {


    $email = mysqli_real_escape_string($conexion, filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $password = mysqli_real_escape_string($conexion, filter_var($_POST['password']));

    if (!$email) {
        $errores[] = "El email es obligatorio o no es valido";
    }
    if (!$password) {
        $errores[] = "El password es obligatorio";
    }

    if(empty($errores)){
        $query="SELECT * FROM usuarios WHERE email='$email'";
        $respuesta=mysqli_query($conexion, $query);

        if($respuesta->num_rows){
            //var_dump($respuesta);
            //Revisar si el password es correcto
            $usuario=mysqli_fetch_assoc($respuesta);

            //verificar si el password es correcto
            $auth = password_verify($password,$usuario['password']);

            if($auth){
                //El usuario a sido autenticado
                session_start();
                //llenar el arreglo de la sesión
                $_SESSION['usuario']=$usuario['email'];
                $_SESSION['login']=true;

                header("location: /admin");

            }else{
                $errores[]="EL password es incorecto";
            }
            var_dump($auth);
            
        }else{
            $errores[]="El usuario no existe";
        }
    }
    //var_dump($errores);
}

//incluye el header
require './includes/funciones.php';
incluirTemplete('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>

    <?php foreach ($errores as $error) : ?>
        <p class="alerta error"><?php echo $error; ?></p>
    <?php endforeach; ?>

    <form  method="POST" class="formulario">
        <fieldset>
            <legend>Email y Password</legend>

            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" placeholder="TU email" >

            <label for="password">Nombre</label>
            <input type="password" name="password" id="password" placeholder="Tu Password" >

            <input class="boton-verde" type="submit" value="enviar">

        </fieldset>

    </form>

</main>

<?php
incluirTemplete('footer');
?>