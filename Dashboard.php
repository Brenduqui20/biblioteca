<?php include_once "header.php"; ?>
<?php include_once "Funciones.php";

?>

<section class="content">
<h1 class="inicio">MENU</h1>
<div class="row mt-4">
            <div class="col-sm-3">
                <div class="row no-gutters shadow shadow">
                    <div class="col-auto bg-primary text-white p-4 d-flex align-items-center">
                        <i class="fas fa-user fa-2x"></i>
                    </div>
                    <div class="col bg-white p-3">
                        <span>USUARIOS</span>
                        <h4><?php print $Canti= CantidadRegistros('usuarios');   ?> </h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="row no-gutters shadow shadow">
                    <div class="col-auto bg-primary text-white p-4 d-flex align-items-center">
                        <!-- <i class="fas fa-user fa-2x"></i> -->
                        <i class="fas fa-solid fa-book fa-2x"></i>
                    </div>
                    <div class="col bg-white p-3">
                        <span>LIBROS</span>
                        <h4><?php print $Canti= CantidadRegistros('libros');  ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="row no-gutters shadow shadow">
                    <div class="col-auto bg-primary text-white p-4 d-flex align-items-center">
                        <!-- <i class="fas fa-user fa-2x"></i> -->
                        <i class="fas fa-regular fa-users fa-2x"></i>
                    </div>
                    <div class="col bg-white p-3">
                        <span>AUTORES</span>
                        <h4><?php print $Canti= CantidadRegistros('autor');  ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="row no-gutters shadow shadow">
                    <div class="col-auto bg-primary text-white p-4 d-flex align-items-center">
                        <i class=" fas fa-solid fa-layer-group fa-2x"></i>
                    </div>
                    <div class="col bg-white p-3">
                        <span>EDITORIALES</span>
                        <h4><?php print $Canti= CantidadRegistros('editorial');  ?></h4>
                    </div>
                </div>
            </div><br><br><br><br><br><br>
            <div class="col-sm-3">
                <div class="row no-gutters shadow">
                    <div class="col-auto bg-primary text-white p-4 d-flex align-items-center">
                    <i class='bx bxs-receipt fa-2x'></i>    
                </div>
                    <div class="col bg-white p-3">
                        <span>PRESTAMOS</span>
                        <h4><?php print $Canti= CantidadRegistros('prestamo');  ?></h4>
                    </div>
                </div>
            </div>
            </div>
    </section> 
    <?php include_once "footer.php"; ?>