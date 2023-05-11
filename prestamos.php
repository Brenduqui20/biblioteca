<?php include_once "header.php"; ?>

<?php
$mensaje = "";

$Salida = "";
$Devolucion = "";
$ISBN = "";
$ClaveUsu = "";


if (isset($_POST["btAgregar"])) {
    print_r($_POST);
    //$mensaje = "opcion guardar";

    $Salida = $_POST['Salida'];
    $Devolucion = $_POST['Devolucion'];
    $ISBN = $_POST['ISBN'];
    $ClaveUsu = $_POST['ClaveUsu'];



    require("conexion.php");
    $insertar = "INSERT INTO prestamo (Salida, Devolucion, ISBN, ClaveUsu) VALUES('$Salida','$Devolucion','$ISBN','$ClaveUsu')";
    mysqli_query($conexion, $insertar) or die(mysqli_error($conexion));
    mysqli_close($conexion);

    $_SESSION["flash"] = [
        "tipo" => "success",
        "mensaje" => "Se Agrego el Prestamo, con fecha de salida  {$_POST['Salida']} ."
    ];

    $Salida = "";
    $Devolucion = "";
    $ISBN = "";
    $ClaveUsu = "";
} elseif (isset($_POST["btModificar"])) {

    $Salida = $_POST['Salida'];
    $SalidaOld = $_POST['SalidaOld'];
    $Devolucion = $_POST['Devolucion'];
    $ISBN = $_POST['ISBN'];
    $ClaveUsu = $_POST['ClaveUsu'];

    require("conexion.php");
    $actualizar = "UPDATE prestamo SET
        Salida='$Salida',
        Devolucion='$Devolucion',
        ISBN='$ISBN',
        ClaveUsu='$ClaveUsu'
      WHERE Salida ='$SalidaOld';";
    mysqli_query($conexion, $actualizar) or die(mysqli_error($conexion));
     $_SESSION["flash"] = [
        "tipo" => "warning",
        "mensaje" => "Se Modifico el Prestamo, con fecha de salida  {$_POST['Salida']} ."
    ];
    mysqli_close($conexion);

   

    $Salida = "";
    $Devolucion = "";
    $ISBN = "";
    $ClaveUsu = "";
} elseif (isset($_POST["btCancelar"])) {
    // $mensaje = "Opcion Cancelar";
} elseif (isset($_POST["btEliminar"])) {
    $mensaje = $_POST["btEliminar"];

    require("conexion.php");
    $SALIDA = $_POST['SALIDA'];
    $DEVOLUCION = $_POST['DEVOLUCION'];
    $CLAVEUSU = $_POST['CLAVEUSU'];
    $ISBN = $_POST['ISBN'];
    $eliminar = "DELETE FROM prestamo WHERE Salida='$SALIDA' AND Devolucion= '$DEVOLUCION' AND ISBN='$ISBN'AND ClaveUsu='$CLAVEUSU';";
    mysqli_query($conexion, $eliminar) or die(mysqli_error($conexion));
    mysqli_close($conexion);

    $_SESSION["flash"] = [
        "tipo" => "danger",
        "mensaje" => "Se Elimino el Prestamo, con fecha de salida  {$_POST['Salida']} ."
    ];

    $Salida = "";
}
?>
<section class="content">
            <div>
            <?php if (isset($_SESSION["flash"]) &&  $_SESSION["flash"]["tipo"] == "success" ) : ?>
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
            <?php if (isset($_SESSION["flash"]) &&  $_SESSION["flash"]["tipo"] == "warning" ) : ?>
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
            <?php if (isset($_SESSION["flash"]) &&  $_SESSION["flash"]["tipo"] == "danger" ) : ?> 
                <div class="container mt-4">
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: msFilter"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>
                        <div class="ml-2">
                            <?= $_SESSION["flash"]["mensaje"] ?>
                        </div>
                    </div>
                </div>
                <?php unset($_SESSION["flash"]) ?>
            <?php endif ?>
        </div>


    <div id="tabla" class="tabla">
        <form method="post" action="prestamos.php" id="formularioPrestamos" style="display:none;">
            <input type="date" name="Salida" id="Salida" value="<?php echo $Salida; ?>" placeholder="Salida" required>
            <input type="hidden" name="SalidaOld" id="SalidaOld" value="<?php echo $Salida; ?>" required>
            <input type="date" name="Devolucion" id="Devolucion" value="<?php echo $Devolucion; ?>" placeholder="Devolucion" required>
            <select name="ISBN" id="ISBN">
                <option value="">TITULO LIBRO</option>
                <?php
                require("conexion.php");
                $consulta = "SELECT * FROM libros";
                $libros = mysqli_query($conexion, $consulta);
                while ($libro = mysqli_fetch_array($libros)) {
                ?>

                    <option value="<?php echo $libro['ISBN']; ?>"><?php echo $libro['Titulo']; ?></option>

                <?php
                }
                mysqli_close($conexion);
                ?>
            </select><br><br>
            <select name="ClaveUsu" id="ClaveUsu">
                <option value="">USUARIOS</option>
                <?php
                require("conexion.php");
                $consulta = "SELECT * FROM usuarios";
                $usuarios = mysqli_query($conexion, $consulta);
                while ($usuario = mysqli_fetch_array($usuarios)) {
                ?>

                    <option value="<?php echo $usuario['ClaveUsu']; ?>"><?php echo $usuario['Nombre'] . ' ' . $usuario['Paterno'] . ' ' . $usuario['Materno']; ?></option>

                <?php
                }
                mysqli_close($conexion);
                ?>
            </select><br><br>
            <button class="BOTON" type="submit" name="btAgregar" id="btAgregarP" value="Agregar">Registar Prestamo</button>
            <button class="BOTON" name="btModificar" id="btModificarP" style="display: none;">Modificar</button>
            <button class="BOTON" name="btCancelar" id="btCancelar" onclick="CanFormPM()">Cancelar</button>
        </form>
        <a class="BOTON" id="BAN" onclick="MostrarFormPM()">Agregar Nuevo Prestamo</a>

        <?php echo $mensaje; ?>
    </div>


    <div id="tabla" class="tabla">
        <form method="post" action="prestamo.php">
            <table class="contenidotabla" id="tblDatos">
                <tr>
                    <th>ISBN</th>
                    <th>TITULO LIBRO</th>
                    <th>CLAVE DE USUARIO</th>
                    <th>NOMBRE</th>
                    <th>SALIDA</th>
                    <th>DEVOLUCION</th>
                    <th align="center" colspan="2">OPCIONES</th>
                </tr>
                <tbody>
                    <?php


                    require("conexion.php");
                    $consulta = "SELECT libros.ISBN AS ISBN, libros.Titulo AS TITULO, usuarios.ClaveUsu AS CLAVEUSU,
                    CONCAT(usuarios.Nombre,' ',usuarios.Paterno,' ', usuarios.Materno) AS NOMBRE, prestamo.Salida AS SALIDA, prestamo.Devolucion AS DEVOLUCION
                    FROM prestamo, libros, usuarios
                    WHERE prestamo.ISBN= libros.ISBN AND prestamo.ClaveUsu= usuarios.ClaveUsu;";
                    $resultado = mysqli_query($conexion, $consulta);
                    while ($fila = mysqli_fetch_array($resultado)) {
                        $idp = $fila['ISBN'] . $fila['CLAVEUSU'] . $fila['SALIDA'];
                    ?>


                        <tr id="<?php echo $idp ?>">
                            <td><?php echo $fila['ISBN']; ?></td>
                            <td><?php echo $fila['TITULO']; ?></td>
                            <td><?php echo $fila['CLAVEUSU']; ?></td>
                            <td><?php echo $fila['NOMBRE']; ?></td>
                            <td><?php echo $fila['SALIDA']; ?></td>
                            <td><?php echo $fila['DEVOLUCION']; ?></td>
                            <td><a class="editar" href="#" onclick="editarPrestamos('<?php echo $idp; ?>')"><i class='bx bxs-edit-alt'></i> Editar</a></td>
                            <td>
                                <a class="eliminar" href="#" id="btEliminar" onclick="MPrestamo('<?php echo $fila['ISBN']; ?>','<?php echo $fila['CLAVEUSU']; ?>','<?php echo $fila['SALIDA']; ?>','<?php echo $fila['DEVOLUCION']; ?>','prestamos.php')"><i class="fas fa-solid fa-trash"></i> Eliminar</a>
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

        <script>

        </script>

    </div>
    </tbody>
</section>

<?php include_once "footer.php"; ?>