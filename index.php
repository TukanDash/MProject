<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Gestion de Proyectos - MProject</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="custom/css/styles.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>
    <div class="panel panel-default" id="panel-proyectos">
      <div class="panel-heading"><h2>Panel de navegaci&oacute;n de Proyectos</h2></div>
      <div class="panel-body">
        <div class="list-group">

  <?php

        include_once "proyecto.php";
        require_once "actividad.php";
        $proyectos = proyecto::all();
        
        foreach ($proyectos as $proyecto)
        {
          $where_proyect=actividad::where("id_proyect",$proyecto->id);
          $num_actividades=count($where_proyect);
          print('
        <a href="#" class="list-group-item">
            <span class="badge">'.$num_actividades.' Act</span>
            <h4 class="list-group-item-heading">'.$proyecto->nombre.'</h4>
            <p class="list-group-item-text">'.$proyecto->descripcion.'</p>
            <div class="progress">
              <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="'.
              intval($proyecto->porcentaje).'" aria-valuemin="0" aria-valuemax="100" style="width: '.
              intval($proyecto->porcentaje).'%; min-width: 2em;">'.intval($proyecto->porcentaje).'%
                <span class="sr-only">'.intval($proyecto->porcentaje).'% Complete</span>
              </div>
            </div>
            <a href="#" class="btn btn-default" role="button">
              <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
            </a>
            <div id="desglose-act"></div>
          </a>

      ');
        }
          

  ?>

  <!--
          <a href="#" class="list-group-item active">
            <span class="badge">5</span>
            <h4 class="list-group-item-heading">List group item heading</h4>
            <p class="list-group-item-text">Dapibus ac facilisis in Dapibus ac facilisis in Dapibus ac facilisis in</p>
            <div class="progress">
              <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%; min-width: 2em;">0%
                <span class="sr-only">45% Complete</span>
              </div>
            </div>
            <div id="desglose-act"></div>
          </a>

  -->
        </div>
  </div>
</div>


    





    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="custom/js/custom.js"></script>

  </body>
</html>