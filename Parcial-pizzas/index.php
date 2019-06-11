

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ApiRest - Mariano Madou</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Programacion III </div>
      <div class="list-group list-group-flush">
        <a href="http://localhost/Parcial-pizzas/index.php" class="list-group-item list-group-item-action bg-light">Consultas por GET</a>
        <a href="http://localhost/Parcial-pizzas/index.php?listadodeimagenes=&mostrar=tabla" class="list-group-item list-group-item-action bg-light">Listado de Pizzas cargadas</a>
        
        <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                ListadoFiltradoPorSabor
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="http://localhost/Parcial-pizzas/index.php?listadofiltradoporsabor&sabor=jamon">Jamón</a>
                <a class="dropdown-item" href="http://localhost/Parcial-pizzas/index.php?listadofiltradoporsabor&sabor=muzza">Muzzarella</a>
                <a class="dropdown-item" href="http://localhost/Parcial-pizzas/index.php?listadofiltradoporsabor&sabor=especial">Especial</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                ListadoFiltradoPorTipo
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="http://localhost/Parcial-pizzas/index.php?listadofiltradoportipo&tipo=piedra">Piedra</a>
                <a class="dropdown-item" href="http://localhost/Parcial-pizzas/index.php?listadofiltradoportipo&tipo=molde">Molde</a>
            </li>   
        </ul>
        <a class="list-group-item list-group-item-action bg-light">Consultas</a>
        <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Consulta Pizza a la piedra
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="http://localhost/Parcial-pizzas/index.php?consultarpizza&sabor=jamon&tipo=piedra">Jamón</a>
                <a class="dropdown-item" href="http://localhost/Parcial-pizzas/index.php?consultarpizza&sabor=muzza&tipo=piedra">Muzzarella</a>
                <a class="dropdown-item" href="http://localhost/Parcial-pizzas/index.php?consultarpizza&sabor=especial&tipo=piedra">Especial</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Consulta Pizza al molde
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="http://localhost/Parcial-pizzas/index.php?consultarpizza&sabor=jamon&tipo=molde">Jamón</a>
                <a class="dropdown-item" href="http://localhost/Parcial-pizzas/index.php?consultarpizza&sabor=muzza&tipo=molde">Muzzarella</a>
                <a class="dropdown-item" href="http://localhost/Parcial-pizzas/index.php?consultarpizza&sabor=especial&tipo=molde">Especial</a>
            </li>   
        </ul>

        <a href="http://localhost/Parcial-pizzas/index.php?top3cantidad&mostrar=tabla" class="list-group-item list-group-item-action bg-light">Top 3 Stock</a>
        <a href="http://localhost/Parcial-pizzas/index.php?listadodeventas=&mostrar=tabla" class="list-group-item list-group-item-action bg-light">Listado de ventas</a>
        <a href="http://localhost/Parcial-pizzas/index.php?listadodeventastop3&mostrar=tabla" class="list-group-item list-group-item-action bg-light">Top 3 clientes / cantidad</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Desplazar menú</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="http://www.marianomadou.com.ar" target="_blank">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Repositorios
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="https://github.com/marianomadou/Programacion_3" target="_blank">Programacion III</a>
                <a class="dropdown-item" href="https://github.com/marianomadou/Laboratorio_3" target="_blank">Laboratorio III</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="https://github.com/marianomadou/" target="_blank">Github marianomadou</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
        <h3 class="mt-4">Pizzeria - ApiRest</h3>
        
        <?php
require_once 'clases/Pizza.php';
require_once 'clases/Venta.php';

$RUTA_PIZZAS = "archivos/Pizza.txt";
$RUTA_VENTAS = "archivos/Venta.txt";
$RUTA_CARPETA_IMAGENES = "imagenes/";
$RUTA_CARPETA_IMAGENES_BACKUP = "backUpFotos/";
$RUTA_CARPETA_IMAGENES_VENTAS = "imagenesDeLaVenta/";
$RUTA_CARPETA_IMAGENES_RECURSOS = "imagenes/recursos-graficos/";

$_PUT=array();
$_DELETE=array();
$content= file_get_contents("php://input");

$caso = $_SERVER['REQUEST_METHOD'];


switch ($caso) 
{
  case "GET":
        switch (key($_GET)) {
          case 'cargarpizzaget'://GET funciona OK--
                include "Funciones/PizzaCargar.php";
                break;
            case 'listadodeimagenes'://GET funciona OK--
                include "Funciones/ListadoDeImagenes.php";
                break;
              case 'listadodeventas'://GET funciona OK--
                include "Funciones/ListadoDeVentas.php";
                break;
            case 'listadodepizza'://GET funciona OK--
                include "Funciones/ListadoDePizza.php";
                break;
            case 'listadofiltradoporsabor'://GET funciona OK--
                include "Funciones/ListadoFiltradoPorSabor.php";
                break;
            case 'listadofiltradoportipo'://GET funciona OK--
                include "Funciones/ListadoFiltradoPorTipo.php";
                break;
            case 'consultarpizza'://GET funciona OK--
                include "Funciones/PizzaConsultar.php";
                break;
            case 'top3cantidad'://GET funciona OK--
                include "Funciones/ListadoDeImagenesTop3Cantidad.php";
                break;
            case 'listadodeventastop3'://GET funciona OK--
                include "Funciones/ListadoDeVentasTop3Cantidad.php";
                break;
        }
        break; 
    case "POST":
        switch (key($_POST)) {
            case 'consultarpizzapost'://POST
                include "Funciones/PizzaConsultar.php";
                break;
            case 'altaventa'://POST funciona OK--
                include "funciones/AltaVenta.php";
                break;
            case 'altaventaconimagen'://POST funciona OK--
                include "funciones/AltaVentaConImagen.php";
                break;
            case 'pizzacargaplus'://POST
                include "funciones/PizzaCargarPlus.php";
                break;
            case 'pizzacarga'://POST funciona OK--
                include "funciones/PizzaCargarPost.php";
                break;
            case 'pizzacargaconfoto'://POST funciona OK--
                include "funciones/PizzaCargarConFoto.php";
                break;    
        }
        break;
    case 'PUT'://PUT funciona OK--
        parse_str($content, $_PUT);
        include "funciones/ModificarPizza.php";
        break;
    case 'DELETE'://DELETE funciona OK--
        parse_str($content, $_DELETE);
        include "funciones/BorrarPizza.php";
        break;
}     

?>


      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>



