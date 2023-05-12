<?php include_once "header.php"; ?>

<?php
$mensaje = "";

$Id = "";
$Nombre = "";
$Paterno = "";
$Materno = "";


if (isset($_POST["btAgregar"])) {
    //$mensaje = "opcion guardar";

    $Id = $_POST['Id'];
    $Nombre = $_POST['Nombre'];
    $Paterno = $_POST['Paterno'];
    $Materno = $_POST['Materno'];


    require("conexion.php");
    $insertar = "INSERT INTO autor VALUES('$Id','$Nombre','$Paterno','$Materno')";
    mysqli_query($conexion, $insertar) or die(mysqli_error($conexion));
    mysqli_close($conexion);

    $_SESSION["flash"] = [
        "tipo" => "success",
        "mensaje" => "Se Agrego el Autor, con Id {$_POST['Id']} ."
    ];

    $Id = "";
    $Nombre = "";
    $Paterno = "";
    $Materno = "";
} elseif (isset($_POST["btModificar"])) {
    //$mensaje="hola";
    $Id = $_POST['Id'];
    $IdOld = $_POST['Id'];
    $Nombre = $_POST['Nombre'];
    $Paterno = $_POST['Paterno'];
    $Materno = $_POST['Materno'];


    require("conexion.php");
    $actualizar = "UPDATE autor SET
        Id='$Id',
        Nombre='$Nombre',
        Paterno='$Paterno',
        Materno='$Materno'
        WHERE Id ='$IdOld';";
    mysqli_query($conexion, $actualizar) or die(mysqli_error($conexion));
    mysqli_close($conexion);
    $_SESSION["flash"] = [
        "tipo" => "warning",
        "mensaje" => "Se Modifico el Autor, con Id  {$_POST['Id']} ."
    ];

    $Id = "";
    $Nombre = "";
    $Paterno = "";
    $Materno = "";
} elseif (isset($_POST["btCancelar"])) {
    // $mensaje = "Opcion Cancelar";
} elseif (isset($_POST["btEliminar"])) {
    //$mensaje = $_POST["btEliminar"];
    require("conexion.php");
    $Id = $_POST['id'];
    $eliminar = "DELETE FROM autor WHERE Id='$Id'";
    mysqli_query($conexion, $eliminar) or die(mysqli_error($conexion));
    mysqli_close($conexion);
    $_SESSION["flash"] = [
        "tipo" => "danger",
        "mensaje" => "Se Elimino el Autor, con Id  {$_POST['Id']} ."
    ];

    $Id = "";
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

    <div id="tablaAu" class="tablaAu">
        <form method="post" action="autores.php" id="formularioAut" style="display:none;">
            <input type="text" name="Id" id="Id" value="<?php echo $Id; ?>" placeholder="Id" required>
            <input type="hidden" name="IdOld" id="IdOld" value="<?php echo $Id; ?>" required>
            <input type="text" name="Nombre" id="Nombre" value="<?php echo $Nombre ?>" placeholder="Nombre" required>
            <input type="text" name="Paterno" id="Paterno" value="<?php echo $Paterno; ?>" placeholder="Paterno" required>
            <input type="text" name="Materno" id="Materno" value="<?php echo $Materno; ?>" placeholder="Materno" required><br><br>
            <button class="BOTON" type="submit" name="btAgregar" id="btAgregar" value="Agregar">Registar Autor</button>
            <button class="BOTON ocultar" name="btModificar" id="btModificar">Modificar</button>
            <button class="BOTON" name="btCancelar" id="btCancelar" onclick="CanFormA()">Cancelar</button>
        </form>
        <a class="BOTON" id="BAN" onclick="MostrarFormA()">Agregar Nuevo Autor</a>

        <?php echo $mensaje; ?>
    </div>
<!-- tablas jaja  -->

    <div id="tablaAu" class="tablaAu">
        <form method="post" action="autores.php">
            <table class="contenidotabla" id="tblDatos">
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>PATERNO</th>
                    <th>MATERNO</th>
                    <th align="center" colspan="2">OPCIONES</th>
                </tr>
                <tbody class="auto">
                    <?php
                    require("conexion.php");
                    $consulta = "SELECT * FROM autor";
                    $resultado = mysqli_query($conexion, $consulta);
                    while ($fila = mysqli_fetch_array($resultado)) {
                    ?>

                        <tr id="<?php echo $fila['Id']; ?>">
                            <td><?php echo $fila['Id']; ?></td>
                            <td><?php echo $fila['Nombre']; ?></td>
                            <td><?php echo $fila['Paterno']; ?></td>
                            <td><?php echo $fila['Materno']; ?></td>
                            <td><a class="editar" href="#" onclick="editarAutores('<?php echo $fila['Id']; ?>')"><i class='bx bxs-edit-alt'></i> Editar</a></td>
                            <td>
                                <a class="eliminar" href="#" name="btEliminar" id="btEliminar" onclick="MModal('<?php echo $fila['Id']; ?>','autores.php')" value="<?php echo $fila['Id']; ?>"><i class="fas fa-solid fa-trash"></i> Eliminar</a>


                            </td>
                        </tr>

                    <?php
                    }
                    mysqli_close($conexion);
                    ?>
            </table>
        </form>
        <div id="pagination-container">
            <ul id="pagination"></ul>
        </div>

    </div>
    </tbody>
</section>

<?php include_once "footer.php"; ?>