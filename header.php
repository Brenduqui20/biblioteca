<?php session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    return;
  }
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Alef:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="plantilla/css/styles.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <title>Proyecto Final</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-info py-0 fixed-top">
        <a class="BI">BIBLIOTECA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="side-bar">
                <li class="active">
                    <a href="Dashboard.php">
                        <i class="fas fa-tachometer-alt fa-fw"></i>
                        MENU
                    </a>
                </li>
                <li>
                    <a href="usuarios.php">
                        <i class="fas fa-solid fa-users"></i>
                        Usuarios
                    </a>
                </li>
                <li>
                    <a href="libros.php">
                    <!-- <i class=" fas fa-solid fa-layer-group"></i> -->
                    <i class=" fas fa-solid fa-book"></i>
                    Libros
                    </a>
                </li>
                <li>
                    <a href="autores.php">
                    <i class="fas fa-light fa-user"></i>
                        Autores
                    </a>
                </li>

                <li>
                    <a href="editoriales.php">
                    <i class=" fas fa-solid fa-layer-group"></i>
                        Editoriales
                    </a>
                </li>
                <li>
                    <a href="prestamos.php">
                    <i class='bx bx-book-open'></i>
                     Prestamos
                    </a>
                </li>
                <li>
                    <a href="consulta.php">
                    <i class="fas fa-solid fa-check"></i>
                     Consultas De Prestamos 
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
            </ul>

            <ul class="navbar-nav ml-5">
                <li class="nav-item dropdown">
                <i class="fas fa-solid fa-search"></i>
                <input  type="text"  id="tfBuscar" class="buscar" onkeyup="buscar()" placeholder="BUSCAR" style="margin-bottom: 10px;">

                    <a>
                        <img src="https://i.pinimg.com/736x/84/66/cf/8466cfef67dee68253d73c6f283f8f18.jpg" alt="" width="40"
                            class="border mp-1 rounded-circle">
                      <?php echo $_SESSION['user']; ?> 
                    </a>
                   <a  href="salir.php" class="BOTON">Salir</a> 
                </li>
            </ul>

        </div>

        
    </nav>


    
