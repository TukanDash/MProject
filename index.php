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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>

    <?php
    //include 'mproject.php';
    ?>
<!--
    <div class="panel panel-default" style="margin: auto auto; width:500px">
      <!-- Default panel contents -->
      <!--<div class="panel-heading">Panel heading</div>
      <div class="panel-body">
        <p>Some default panel content here. Nulla vitae elit libero, a pharetra augue. Aenean lacinia bibendum nulla sed consectetur. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
      </div>

      <!-- List group -->
      <!--<ul class="list-group">
        <li class="list-group-item">Cras justo odio</li>
        <li class="list-group-item">Dapibus ac facilisis in</li>
        <li class="list-group-item">Morbi leo risus</li>
        <li class="list-group-item">Porta ac consectetur ac</li>
        <li class="list-group-item">Vestibulum at eros</li>
      </ul>
    </div>



-->

<?php

//// TEST DATABASE.PHP
/// ==============================
/*
include "Database.php";

$db = Database::getConnection("MySqlProvider");
//$resultados = $db->execute('SELECT * FROM proyecto WHERE nombre="Proyecto01"');
$resultados = $db->execute('SELECT * FROM proyecto');
print_r($resultados);

*/

//// TEST ORM.PHP
/// ==============================

include "proyecto.php";

$resultados = proyecto::all();
print_r($resultados);

print("</br></br>");
//$resultados = proyecto::find('1005');
$resultados[4]->nombre = "PROYECTO05";
/*
if($resultados)
  print_r($resultados);
else
  print("NO NOOOOO")
*/
$resultados[4]->save();
$resultado2 = proyecto::find('1005');
print_r($resultado2);
?>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>