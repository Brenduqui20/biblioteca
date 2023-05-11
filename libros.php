<?php include_once "header.php"; ?>

<?php
$mensaje = "";

$ISBN = "";
$Titulo = "";
$editorial_Id = "";

if (isset($_POST["btAgregar"])) {
    //$mensaje = "opcion guardar";

    $ISBN = $_POST['ISBN'];
    $Titulo = $_POST['Titulo'];
    $editorial_Id = $_POST['editorial_Id'];
    $autores = $_POST['autores'];

    print_r($_POST);

    require("conexion.php");
    $insertar = "INSERT INTO libros VALUES('$ISBN','$Titulo','$editorial_Id')";
    mysqli_query($conexion, $insertar) or die(mysqli_error($conexion));

    foreach ($autores as $autor) {
        $insertarautores = "INSERT INTO libros_autores (ISBN, autor_Id) VALUES ('$ISBN', '$autor')";
        mysqli_query($conexion, $insertarautores) or die(mysqli_error($conexion));
    }
    mysqli_close($conexion);

    $_SESSION["flash"] = [
        "tipo" => "success",
        "mensaje" => "Se Agrego el Libro, con ISBN {$_POST['ISBN']} ."
    ];

    $ISBN = "";
    $Titulo = "";
    $editorial_Id = "";
} elseif (isset($_POST["btModificar"])) {
    //$mensaje="hola";
    $ISBN = $_POST['ISBN'];
    $ISBNOld = $_POST['ISBNOld'];
    $Titulo = $_POST['Titulo'];
    $editorial_Id = $_POST['editorial_Id'];
    $autores = $_POST['autores'];


    require("conexion.php");
    $actualizar = "UPDATE libros SET
        ISBN='$ISBN',
        Titulo='$Titulo',
        editorial_Id='$editorial_Id'
        WHERE ISBN ='$ISBNOld';";
    mysqli_query($conexion, $actualizar) or die(mysqli_error($conexion));

    $eliminarvalores = "DELETE FROM libros_autores WHERE ISBN='$ISBNOld'";
    mysqli_query($conexion, $eliminarvalores) or die(mysqli_error($conexion));
    foreach ($autores as $autor) {
        $insertarautores = "INSERT INTO libros_autores (ISBN, autor_Id) VALUES ('$ISBN', '$autor')";
        mysqli_query($conexion, $insertarautores) or die(mysqli_error($conexion));
    }
    mysqli_close($conexion);

    $_SESSION["flash"] = [
        "tipo" => "warning",
        "mensaje" => "Se Modifico el Libro, con ISBN {$_POST['ISBN']} ."
    ];

    $ISBN = "";
    $Titulo = "";
    $editorial_Id = "";
} elseif (isset($_POST["btCancelar"])) {
    // $mensaje = "Opcion Cancelar";
} elseif (isset($_POST["btEliminar"])) {
    //$mensaje = $_POST["btEliminar"];
    require("conexion.php");
    $ISBN = $_POST['id'];
    $eliminar = "DELETE FROM libros WHERE ISBN='$ISBN'";
    mysqli_query($conexion, $eliminar) or die(mysqli_error($conexion));
    mysqli_close($conexion);

    $_SESSION["flash"] = [
        "tipo" => "danger",
        "mensaje" => "Se Elimino el Libro, con ISBN {$_POST['ISBN']} ."
    ];

    $ISBN = "";
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
        <form method="post" action="libros.php" id="formularioLi" style="display:none;">
            <input type="text" name="ISBN" id="ISBN" value="<?php echo $ISBN; ?>" placeholder="ISBN" required>
            <input type="hidden" name="ISBNOld" id="ISBNOld" value="<?php echo $ISBN; ?>" required>
            <input type="text" name="Titulo" id="Titulo" value="<?php echo $Titulo ?>" placeholder="Titulo" required>
            <select id="editorial_Id" name="editorial_Id" >
                <option value="" disabled>EDITORIALES</option>
                <?php
                require("conexion.php");
                $consulta = "SELECT * FROM editorial";
                $editoriales = mysqli_query($conexion, $consulta);
                while ($editorial = mysqli_fetch_array($editoriales)) {
                ?>

                    <option value="<?php echo $editorial['Id']; ?>"><?php echo $editorial['Nombre']; ?></option>

                <?php
                }
                mysqli_close($conexion);
                ?>
            </select><br><br>
            <label for="autor">
                Autores Selecionados
            </label><br>
            <div id="autoresagregados"></div>
            <select id="autor" required>
                <?php
                require("conexion.php");
                $consulta = "SELECT * FROM autor";
                $autores = mysqli_query($conexion, $consulta);
                while ($autor = mysqli_fetch_array($autores)) {
                ?>

                    <option value="<?php echo $autor['Id']; ?>"><?php echo $autor['Nombre'] . ' ' . $autor['Paterno'] . ' ' . $autor['Materno']; ?></option>

                <?php
                }
                mysqli_close($conexion);
                ?>
            </select><br><br>
            <button class="BOTON" type="submit" name="btAgregar" id="btAgregar" value="Agregar">Registar Libro</button>
            <button class="BOTON ocultar" name="btModificar" id="btModificar">Modificar</button>
            <button class="BOTON" name="btCancelar" id="btCancelar" onclick="CanFormLB()">Cancelar</button>
        </form>
        <a class="BOTON" id="BAN" onclick="MostrarFormLB()">Agregar Nuevo Libro</a>

        <?php echo $mensaje; ?>
    </div>


    <div id="tabla">
        <form method="post" action="libros.php">
            <table class="contenidotabla" id="tblDatos">
                <tr>
                    <th>N° DE LISTA</th>
                    <th>ISBN</th>
                    <th>TITULO</th>
                    <th class="ocultar">EDITORIAL_ID</th>
                    <th>NOMBRE EDITORIAL</th>
                    <th class="ocultar">ID AUTORES</th>
                    <th>AUTORES</th>
                    <th align="center" colspan="2">OPCIONES</th>
                </tr>
                <tbody>
                    <?php
                    require("conexion.php");
                    $ContLi = 0;
                    $consulta = "SELECT libros.ISBN, libros.Titulo, editorial.Id AS Id_editorial, editorial.Nombre AS EdNombre
                                 FROM libros, editorial
                                 WHERE libros.editorial_Id= editorial.Id;";
                    $resultado = mysqli_query($conexion, $consulta);
                    while ($fila = mysqli_fetch_array($resultado)) {
                        $ContLi++;
                    ?>

                        <tr id="<?php echo $fila['ISBN']; ?>">
                            <td><?php echo $ContLi ?></td>
                            <td><?php echo $fila['ISBN']; ?></td>
                            <td><?php echo $fila['Titulo']; ?></td>
                            <td class="ocultar"><?php echo $fila['Id_editorial']; ?></td>
                            <td><?php echo $fila['EdNombre']; ?></td>



                            <?php
                            $consultaAutores = "SELECT libros_autores.ISBN, autor.Id AS autor_id,
                                CONCAT(autor.Nombre,' ',autor.Paterno,' ',autor.Materno) AS NOMBREAUTOR
                                FROM autor, libros_autores
                                WHERE libros_autores.ISBN = '{$fila['ISBN']}' AND libros_autores.autor_Id = autor.Id;";


                            ?>

                            <td class="ocultar"> <?php
                                                    $autoresresultado = mysqli_query($conexion, $consultaAutores);
                                                    while ($autor = mysqli_fetch_array($autoresresultado)) {
                                                        echo $autor['autor_id'] . '-';
                                                    }
                                                    ?>
                            </td>

                            <td> <?php
                                    $autoresresultado = mysqli_query($conexion, $consultaAutores);
                                    while ($autor = mysqli_fetch_array($autoresresultado)) {
                                        echo $autor['NOMBREAUTOR'] . ',';
                                    }
                                    ?>
                            </td>



                            <td><a class="editar" href="#" onclick="editarLibros('<?php echo $fila['ISBN']; ?>')"><i class='bx bxs-edit-alt'></i> Editar</a></td>
                            <td>
                                <a class="eliminar" href="#" name="btEliminar" id="btEliminar" onclick="MModal('<?php echo $fila['ISBN']; ?>','libros.php')" value="<?php echo $fila['ISBN']; ?>"><i class="fas fa-solid fa-trash"></i> Eliminar</a>
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