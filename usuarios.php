<?php include_once "header.php"; ?>

<?php
$mensaje = "";
$claveUsu = "";
$nombre = "";
$paterno = "";
$materno = "";
$colonia = "";
$calle = "";
$numero = "";
$telefono = "";


if (isset($_POST["btAgregar"])) {
    //$mensaje = "opcion guardar";

    $claveUsu = $_POST['ClaveUsu'];
    $nombre = $_POST['Nombre'];
    $paterno = $_POST['Paterno'];
    $materno = $_POST['Materno'];
    $colonia = $_POST['Colonia'];
    $calle = $_POST['Calle'];
    $numero = $_POST['Numero'];
    $telefono = $_POST['Telefono'];


    require("conexion.php");
    $insertar = "INSERT INTO usuarios VALUES('$claveUsu','$nombre','$paterno','$materno','$colonia','$calle','$numero','$telefono')";
    mysqli_query($conexion, $insertar) or die(mysqli_error($conexion));
    mysqli_close($conexion);
    $_SESSION["flash"] = [
        "tipo" => "success",
        "mensaje" => "Se Agrego el Usuario, con Clave {$_POST['ClaveUsu']} ."
    ];

    $claveUsu = "";
    $nombre = "";
    $paterno = "";
    $materno = "";
    $colonia = "";
    $calle = "";
    $numero = "";
    $telefono = "";
} elseif (isset($_POST["btModificar"])) {
    //$mensaje="hola";
    $claveUsu = $_POST['ClaveUsu'];
    $claveUsuOld = $_POST['ClaveUsuOld'];
    $nombre = $_POST['Nombre'];
    $paterno = $_POST['Paterno'];
    $materno = $_POST['Materno'];
    $colonia = $_POST['Colonia'];
    $calle = $_POST['Calle'];
    $numero = $_POST['Numero'];
    $telefono = $_POST['Telefono'];

    require("conexion.php");
    $actualizar = "UPDATE usuarios SET
        ClaveUsu='$claveUsu',
        Nombre='$nombre',
        Paterno='$paterno',
        Materno='$materno',
        Colonia='$colonia',
        Calle='$calle',
        Numero='$numero',
        Telefono='$telefono'
      WHERE claveUsu ='$claveUsuOld';";
    mysqli_query($conexion, $actualizar) or die(mysqli_error($conexion));
    mysqli_close($conexion);

    $_SESSION["flash"] = [
        "tipo" => "warning",
        "mensaje" => "Se Modifico el Usuario, con Clave {$_POST['ClaveUsu']} ."
    ];

    $claveUsu = "";
    $nombre = "";
    $paterno = "";
    $materno = "";
    $colonia = "";
    $calle = "";
    $numero = "";
    $telefono = "";
} elseif (isset($_POST["btCancelar"])) {
    // $mensaje = "Opcion Cancelar";
} elseif (isset($_POST["btEliminar"])) {
    //$mensaje = $_POST["btEliminar"];
    require("conexion.php");
    $claveUsu = $_POST['id'];
    $eliminar = "DELETE FROM usuarios WHERE claveUsu='$claveUsu'";
    mysqli_query($conexion, $eliminar) or die(mysqli_error($conexion));
    mysqli_close($conexion);

    $_SESSION["flash"] = [
        "tipo" => "danger",
        "mensaje" => "Se Elimino el Usuario, con Clave {$_POST['ClaveUsu']} ."
    ];

    $claveUsu = "";
}
?>

<section class="content">
    <div>
        <?php if (isset($_SESSION["flash"]) &&  $_SESSION["flash"]["tipo"] == "success") : ?>
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </symbol>
            </svg>
            <div class="container mt-4">
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <div class="ml-2">
                        <?= $_SESSION["flash"]["mensaje"] ?>
                    </div>
                </div>
            </div>
            <?php unset($_SESSION["flash"]) ?>
        <?php endif ?>
        <?php if (isset($_SESSION["flash"]) &&  $_SESSION["flash"]["tipo"] == "warning") : ?>
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </symbol>
            </svg>
            <div class="container mt-4">
                <div class="alert alert-warning d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <div class="ml-2">
                        <?= $_SESSION["flash"]["mensaje"] ?>
                    </div>
                </div>
            </div>
            <?php unset($_SESSION["flash"]) ?>
        <?php endif ?>
        <?php if (isset($_SESSION["flash"]) &&  $_SESSION["flash"]["tipo"] == "danger") : ?>
            <div class="container mt-4">
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: msFilter">
                        <path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path>
                        <path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path>
                    </svg>
                    <div class="ml-2">
                        <?= $_SESSION["flash"]["mensaje"] ?>
                    </div>
                </div>
            </div>
            <?php unset($_SESSION["flash"]) ?>
        <?php endif ?>
    </div>

    <div id="tabla" class="tabla">
        <form method="post" action="usuarios.php" id="formularioUsu" style="display: none;">
            <input type="text" name="ClaveUsu" id="claveUsu" value="<?php echo $claveUsu; ?>" placeholder="ClaveUsu" required>
            <input type="hidden" name="ClaveUsuOld" id="claveUsuOld" value="<?php echo $claveUsu; ?>" required>
            <input type="text" name="Nombre" id="nombre" value="<?php echo $nombre; ?>" placeholder="Nombre" required>
            <input type="text" name="Paterno" id="paterno" value="<?php echo $paterno; ?>" placeholder="Paterno" required>
            <input type="text" name="Materno" id="materno" value="<?php echo $materno; ?>" placeholder="Materno" required><br><br>
            <input type="text" name="Colonia" id="colonia" value="<?php echo $colonia; ?>" placeholder="Colonia" required>
            <input type="text" name="Calle" id="calle" value="<?php echo $calle; ?>" placeholder="Calle" required>
            <input type="text" name="Numero" id="numero" value="<?php echo $numero; ?>" placeholder="Numero" required>
            <input type="text" name="Telefono" id="telefono" value="<?php echo $telefono; ?>" placeholder="Telefono" required><br><br>
            <button class="BOTON" type="submit" name="btAgregar" id="btAgregar" value="Agregar">Registrar Usuario</button>
            <button class="BOTON ocultar" name="btModificar" id="btModificar">Modificar</button>
            <button class="BOTON" name="btCancelar" id="btCancelar" onclick="CanFormUs()">Cancelar</button>
        </form>

        <a class="BOTON" id="BAN" onclick="MostrarFormUs()">Agregar Nuevo Usuario</a>

        <?php echo $mensaje; ?>
    </div>



    <div id="tabla" class="tabla">
        <table class="contenidotabla" id="tblDatos" class="centrar">
            <tr>
                <th>N° DE LISTA</th>
                <th>CLAVE USU</th>
                <th>NOMBRE</th>
                <th>PATERNO</th>
                <th>MATERNO</th>
                <th>COLONIA</th>
                <th>CALLE</th>
                <th>NUMERO</th>
                <th>TELEFONO</th>
                <th align="center" colspan="2">OPCIONES</th>
            </tr>
            <tbody class="usu">
                <?php
                require("conexion.php");
                $CUsu = 0;
                $consulta = "SELECT * FROM usuarios";
                $resultado = mysqli_query($conexion, $consulta);
                while ($fila = mysqli_fetch_array($resultado)) {
                    $CUsu++;

                ?>


                    <tr id="<?php echo $fila['ClaveUsu']; ?>">
                        <td><?php echo $CUsu ?></td>
                        <td><?php echo $fila['ClaveUsu']; ?></td>
                        <td><?php echo $fila['Nombre']; ?></td>
                        <td><?php echo $fila['Paterno']; ?></td>
                        <td><?php echo $fila['Materno']; ?></td>
                        <td><?php echo $fila['Colonia']; ?></td>
                        <td><?php echo $fila['Calle']; ?></td>
                        <td><?php echo $fila['Numero']; ?></td>
                        <td><?php echo $fila['Telefono']; ?></td>
                        <td><a class="editar" href="#" onclick="editarUsuario('<?php echo $fila['ClaveUsu']; ?>')"><i class='bx bxs-edit-alt'></i> Editar</a></td>
                        <td><a class="eliminar" name="btEliminar" href="#" id="btEliminar" onclick="MModal('<?php echo $fila['ClaveUsu']; ?>','usuarios.php')" value="<?php echo $fila['ClaveUsu']; ?>"><i class="fas fa-solid fa-trash"></i> Eliminar</a></td>
                    </tr>

                <?php
                }

                mysqli_close($conexion);
                ?>

        </table>


        <div id="pagination-container">
            <ul id="pagination"></ul>
        </div>
    </div>
    </tbody>
</section>

<?php include_once "footer.php"; ?>