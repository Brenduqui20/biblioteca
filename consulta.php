<?php include_once "header.php"; ?>
<section class="content">
    <div id="tabla" class="tabla">
    <form action="consulta.php" method="post" style="margin: 60px auto;">
<label class="CP">CONSULTA DE PRESTAMO POR FECHA DE SALIDA</label>
<input name="dia" type="date">
<button class="BMP" type="submit">MOSTRAR</button>
</form>
<?php 
if (isset($_POST['dia'])) {
    $prestamoDa =$_POST['dia'];
    ?>
    <h2 class="TP">TABLA DE PRESTAMOS CON FECHA DE SALIDA <?php echo $prestamoDa?></h2>
    <table class="contenidotabla" id="tblDatos">
                <tr>
                    <th>ISBN</th>
                    <th>TITULO LIBRO</th>
                    <th>CLAVE DE USUARIO</th>
                    <th>NOMBRE</th>
                    <th style="background-color:#CD5C5C;">SALIDA</th>
                    <th>DEVOLUCION</th>
                </tr>
                <tbody>
                    <?php

                    require("conexion.php");
                    $consulta = "SELECT libros.ISBN AS ISBN, libros.Titulo AS TITULO, usuarios.ClaveUsu AS CLAVEUSU,
                    CONCAT(usuarios.Nombre,' ',usuarios.Paterno,' ', usuarios.Materno) AS NOMBRE, prestamo.Salida AS SALIDA, prestamo.Devolucion AS DEVOLUCION
                    FROM prestamo, libros, usuarios
                    WHERE prestamo.ISBN= libros.ISBN AND prestamo.ClaveUsu= usuarios.ClaveUsu AND Salida = '$prestamoDa';";
                    $resultado = mysqli_query($conexion, $consulta);
                    $contador = 0;
                    while ($fila = mysqli_fetch_array($resultado)) {
                        $contador++;
                        $idp = $fila['ISBN'] . $fila['CLAVEUSU'] . $fila['SALIDA'];
                    ?>


                        <tr id="<?php echo $idp ?>">
                            <td><?php echo $fila['ISBN']; ?></td>
                            <td><?php echo $fila['TITULO']; ?></td>
                            <td><?php echo $fila['CLAVEUSU']; ?></td>
                            <td><?php echo $fila['NOMBRE']; ?></td>
                            <td><?php echo $fila['SALIDA']; ?></td>
                            <td><?php echo $fila['DEVOLUCION']; ?></td>
                        </tr>

                    <?php
                    }
                   print '<h2 class="CR">TOTAL DE RESULTADOS: ' .$contador.'</h2>';
                    mysqli_close($conexion);
                    ?>
            </table>
    <?php
}
 ?>
    </div>
    <!-- </section> -->

        
<!-- CONSULTA DE PRESTAMO POR FECHA DE DEVOLUCION  -->
<!-- <section class="content"> -->
    <div id="tabla" class="tabla">
    <form action="consulta.php" method="post" style="margin: 60px auto;">
<label class="CP">CONSULTA DE PRESTAMO POR FECHA DE DEVOLUCION</label>
<input name="dia" type="date">
<button class="BMP" type="submit">MOSTRAR</button>
    </form>
<?php 
if (isset($_POST['dia'])) {
    $prestamoDa =$_POST['dia'];
    ?>
    <h2 class="TP">TABLA DE PRESTAMOS CON FECHA DE DEVOLUCION <?php echo $prestamoDa?></h2>
    <table class="contenidotabla" id="tblDatos">
                <tr>
                    <th>ISBN</th>
                    <th>TITULO LIBRO</th>
                    <th>CLAVE DE USUARIO</th>
                    <th>NOMBRE</th>
                    <th>SALIDA</th>
                    <th style="background-color:#CD5C5C;">DEVOLUCION</th>
                </tr>
                <tbody>
                    <?php

                    require("conexion.php");
                    $consulta = "SELECT libros.ISBN AS ISBN, libros.Titulo AS TITULO, usuarios.ClaveUsu AS CLAVEUSU,
                    CONCAT(usuarios.Nombre,' ',usuarios.Paterno,' ', usuarios.Materno) AS NOMBRE, prestamo.Salida AS SALIDA, prestamo.Devolucion AS DEVOLUCION
                    FROM prestamo, libros, usuarios
                    WHERE prestamo.ISBN= libros.ISBN AND prestamo.ClaveUsu= usuarios.ClaveUsu AND Devolucion = '$prestamoDa';";
                    $resultado = mysqli_query($conexion, $consulta);
                    $contadorD = 0;
                    while ($fila = mysqli_fetch_array($resultado)) {
                        $contadorD++;
                        $idp = $fila['ISBN'] . $fila['CLAVEUSU'] . $fila['SALIDA'];
                    ?>


                        <tr id="<?php echo $idp ?>">
                            <td><?php echo $fila['ISBN']; ?></td>
                            <td><?php echo $fila['TITULO']; ?></td>
                            <td><?php echo $fila['CLAVEUSU']; ?></td>
                            <td><?php echo $fila['NOMBRE']; ?></td>
                            <td><?php echo $fila['SALIDA']; ?></td>
                            <td><?php echo $fila['DEVOLUCION']; ?></td>
                        </tr>

                    <?php
                    }
                    print '<h2 class="CR">TOTAL DE RESULTADOS: ' .$contadorD.'</h2>';
                    mysqli_close($conexion);
                    ?>
            </table>
    <?php
}
 ?>

       
<!-- CONSULTA MES SALIDA -->
    <div id="tabla" class="tabla">
    <form action="consulta.php" method="post" style="margin: 60px auto;">
<label class="CP">CONSULTA DE PRESTAMO POR MES DE SALIDA</label>
<select name="CM">
    <option value="1">ENERO</option>
    <option value="2">FEBRERO</option>
    <option value="3">MARZO</option>
    <option value="4">ABRIL</option>
    <option value="5">MAYO</option>
    <option value="6">JUNIO</option>
    <option value="7">JULIO</option>
    <option value="8">AGOSTO</option>
    <option value="9">SEPTIEMBRE</option>
    <option value="10">OCTUBRE</option>
    <option value="11">NOVIEMBRE</option>
    <option value="12">DICIEMBRE</option>
</select>
<button class="BMP" type="submit">MOSTRAR</button>
    </form>
<?php 
if (isset($_POST['CM'])) {
    $MES =$_POST['CM'];
    ?>
    <h2 class="TP">TABLA DE PRESTAMOS CON MES DE SALIDA <?php echo $MES?></h2>
    <table class="contenidotabla" id="tblDatos">
                <tr>
                    <th>ISBN</th>
                    <th>TITULO LIBRO</th>
                    <th>CLAVE DE USUARIO</th>
                    <th>NOMBRE</th>
                    <th style="background-color:#CD5C5C;">SALIDA</th>
                    <th>DEVOLUCION</th>
                </tr>
                <tbody>
                    <?php

                    require("conexion.php");
                    $consulta = "SELECT libros.ISBN AS ISBN, libros.Titulo AS TITULO, usuarios.ClaveUsu AS CLAVEUSU,
                    CONCAT(usuarios.Nombre,' ',usuarios.Paterno,' ', usuarios.Materno) AS NOMBRE, prestamo.Salida AS SALIDA, prestamo.Devolucion AS DEVOLUCION
                    FROM prestamo, libros, usuarios
                    WHERE prestamo.ISBN= libros.ISBN AND prestamo.ClaveUsu= usuarios.ClaveUsu AND MONTH(prestamo.Salida)= '$MES';";
                    $resultado = mysqli_query($conexion, $consulta);
                    $contadorMS = 0;
                    while ($fila = mysqli_fetch_array($resultado)) {
                        $contadorMS++;
                        $idp = $fila['ISBN'] . $fila['CLAVEUSU'] . $fila['SALIDA'];
                    ?>


                        <tr id="<?php echo $idp ?>">
                            <td><?php echo $fila['ISBN']; ?></td>
                            <td><?php echo $fila['TITULO']; ?></td>
                            <td><?php echo $fila['CLAVEUSU']; ?></td>
                            <td><?php echo $fila['NOMBRE']; ?></td>
                            <td><?php echo $fila['SALIDA']; ?></td>
                            <td><?php echo $fila['DEVOLUCION']; ?></td>
                        </tr>

                    <?php
                    }
                    print '<h2 class="CR">TOTAL DE RESULTADOS: ' .$contadorMS.'</h2>';
                    mysqli_close($conexion);
                    ?>
            </table>
    <?php
}
 ?>

       
<!-- CONSULTA MES DEVOLUCION -->
<div id="tabla" class="tabla">
    <form action="consulta.php" method="post" style="margin: 60px auto;">
<label class="CP">CONSULTA DE PRESTAMO POR MES DE DEVOLUCION</label>
<select name="CMD">
    <option value="1">ENERO</option>
    <option value="2">FEBRERO</option>
    <option value="3">MARZO</option>
    <option value="4">ABRIL</option>
    <option value="5">MAYO</option>
    <option value="6">JUNIO</option>
    <option value="7">JULIO</option>
    <option value="8">AGOSTO</option>
    <option value="9">SEPTIEMBRE</option>
    <option value="10">OCTUBRE</option>
    <option value="11">NOVIEMBRE</option>
    <option value="12">DICIEMBRE</option>
</select>
<button class="BMP" type="submit">MOSTRAR</button>
    </form>
<?php 
if (isset($_POST['CMD'])) {
    $MES =$_POST['CMD'];
    ?>
    <h2 class="TP">TABLA DE PRESTAMOS CON MES DE DEVOLUCION <?php echo $MES?></h2>
    <table class="contenidotabla" id="tblDatos">
                <tr>
                    <th>ISBN</th>
                    <th>TITULO LIBRO</th>
                    <th>CLAVE DE USUARIO</th>
                    <th>NOMBRE</th>
                    <th>SALIDA</th>
                    <th style="background-color:#CD5C5C;">DEVOLUCION</th>
                </tr>
                <tbody>
                    <?php

                    require("conexion.php");
                    $consulta = "SELECT libros.ISBN AS ISBN, libros.Titulo AS TITULO, usuarios.ClaveUsu AS CLAVEUSU,
                    CONCAT(usuarios.Nombre,' ',usuarios.Paterno,' ', usuarios.Materno) AS NOMBRE, prestamo.Salida AS SALIDA, prestamo.Devolucion AS DEVOLUCION
                    FROM prestamo, libros, usuarios
                    WHERE prestamo.ISBN= libros.ISBN AND prestamo.ClaveUsu= usuarios.ClaveUsu AND MONTH(prestamo.Devolucion)= '$MES';";
                    $resultado = mysqli_query($conexion, $consulta);
                    $contadorMD = 0;
                    while ($fila = mysqli_fetch_array($resultado)) {
                        $contadorMD++;
                        $idp = $fila['ISBN'] . $fila['CLAVEUSU'] . $fila['SALIDA'];
                    ?>


                        <tr id="<?php echo $idp ?>">
                            <td><?php echo $fila['ISBN']; ?></td>
                            <td><?php echo $fila['TITULO']; ?></td>
                            <td><?php echo $fila['CLAVEUSU']; ?></td>
                            <td><?php echo $fila['NOMBRE']; ?></td>
                            <td><?php echo $fila['SALIDA']; ?></td>
                            <td><?php echo $fila['DEVOLUCION']; ?></td>
                        </tr>

                    <?php
                    }
                    print '<h2 class="CR">TOTAL DE RESULTADOS: ' .$contadorMD.'</h2>';
                    mysqli_close($conexion);
                    ?>
            </table>
    <?php
}
 ?>
  <div id="pagination-container">
            <ul id="pagination"></ul>
        </div>

</div>
    </section>
<?php include_once "footer.php"; ?>
                  