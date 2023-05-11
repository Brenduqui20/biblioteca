
<?php
    if (isset($_POST)) {
        print 'salio';
       

        require("conexion.php");
        $consulta = "SELECT * FROM user";
        $users = mysqli_query($conexion, $consulta);

        while ($user = mysqli_fetch_array($users)) {
            if ($user['usuario'] == $_POST['user'] && $user['contraseña'] ==  $_POST['password']) {
                session_start();

                $_SESSION["user"] = $user['usuario'];

                header('Location: Dashboard.php');
            }else{
                header('Location: index.php'); 
      
            }
            mysqli_close($conexion);
        }
    } else {
        header('Location: index.php'); 
    }
    