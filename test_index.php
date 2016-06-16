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