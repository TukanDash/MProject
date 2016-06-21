<?php
//   Nombre del fichero: mproject.php


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
require_once "proyecto.php";
require_once "actividad.php";
require_once "tarea.php";

class mproject {

    public static $proyectos;   // Array Objects
    public static $actividades; // Array Objects
    public static $tareas;      // Array Objects
    public static $filtros;     // Array que guarda los filtros segun lo especificado en las preferencias. Lo ideal seria crear el objecto preferencias.

    function __construct() {
        self::getData();
    }

    private static function getData() {
        require "preferences.php";
        if ($archived)  //Esto cambia el listado principal segun las preferencias. Lo mejor seria cambiar la funcion were para que admitiera mas de un filtro.
          self::$proyectos = proyecto::all();
        else
          self::$proyectos = proyecto::where("archived",$archived);

        self::$actividades=actividad::all();
        self::$tareas=tarea::all();
    }
   
    public static function mainList() {
	      // Método que lista los objetos proyecto, actividad y tarea de forma iterativa
        // Llamamos a la funcion inicial para que pinte la vista principal
        self::getData();
        print('
        <div class="panel panel-default" id="panel-proyectos">
          <div class="panel-heading">
            <h3 class=""><strong>Lista de Proyectos</strong>&nbsp;&nbsp;
              <a href="form_pro.php">
                <span class="label label-primary"><span class="glyphicon glyphicon-plus "></span>&nbsp;Nuevo</span>
              </a>
            </h3>
          </div>
          <div class="panel-body">
            <div class="list-group">');

        foreach (self::$proyectos as $proyecto)
        {
          $actividadesPro=actividad::where("id_proyect",$proyecto->id);
          $num_actividades=count($actividadesPro);
          print('
                    <a role="button" href="#collapse'.$proyecto->id.'" aria-expanded="false" id="'.$proyecto->id.'" class="list-group-item" data-toggle="collapse" data-parent="#panel_proyectos" aria-controls="collapse'.$proyecto->id.'" onclick="ocultaWrapper()">

                      
                        <span class="badge">'.$num_actividades.' Act</span>
                        <h4 class="list-group-item-heading">'.$proyecto->nombre.'&nbsp;
                        ');
                          if($proyecto->es_proceso)   
                   print('<span class="glyphicon glyphicon-retweet"></span>&nbsp;');
                          print('
                          <span class="label label-success">'.$proyecto->estado.'</span>
                        </h4>

                        <p class="list-group-item-text">'.$proyecto->descripcion.'</p>
              
                        <div class="progress">
                          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="'.
                          intval($proyecto->porcentaje).'" aria-valuemin="0" aria-valuemax="100" style="width: '.
                          intval($proyecto->porcentaje).'%; min-width: 2em;">'.intval($proyecto->porcentaje).'%
                            <span class="sr-only">'.intval($proyecto->porcentaje).'% Complete</span>
                          </div>
                        </div>
                      
                    </a>
                    
                     <!--    --------------------------------------------------------------------- Grupo de Opcions (PROYECTO) -->    
                        <div class="btn-group btn-group-xs" role="group">
                          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Opciones
                            <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="form_act.php?id_proyect='.$proyecto->id.'">Nueva Actividad</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="form_pro.php?id='.$proyecto->id.'">Editar</a></li>
                            <li><a href="index.php?accion=borra_pro&id='.$proyecto->id.'">Borrar</a></li>
                            <li><a href="index.php?accion=archiva_pro&id='.$proyecto->id.'">Archivar</a></li>
                          </ul>
                        </div>
                    



                    <div id="collapse'.$proyecto->id.'" class="desplegado panel-collapse collapse" role="tabpanel" aria-labelledby="'.$proyecto->id.'">
                      <div class="panel-body">
                          <div class="list-group">'
            );

            //$actividades-where("id_proyect",$proyecto->id);
            if($actividadesPro)
              foreach ($actividadesPro as $actividad)
            {
            //  
                //print_r($actividadesPro);
                $tareasAct=tarea::where("id_act",$actividad->id);
                $num_tareas=count($tareasAct);
                print('
                          <a href="#collapse'.$actividad->id.'" id="'.$actividad->id.'" class="list-group-item" data-toggle="collapse" data-parent="#panel_proyectos" aria-controls="collapse'.$actividad->id.'">
                             <span class="badge">'.$num_tareas.' Tareas</span>
                             <h4 class="list-group-item-heading">'.$actividad->nombre);

                             if($actividad->es_proceso)   
                        print('&nbsp;<span class="glyphicon glyphicon-retweet"></span>');
                          print('

                             </h4>
                             <p class="list-group-item-text">'.$actividad->descripcion.'</p>
                    
                            <div class="progress">
                              <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="'.
                              intval($actividad->porcentaje).'" aria-valuemin="0" aria-valuemax="100" style="width: '.
                              intval($actividad->porcentaje).'%; min-width: 2em;">'.intval($actividad->porcentaje).'%
                                <span class="sr-only">'.intval($actividad->porcentaje).'% Complete</span>
                            </div>
                          </div>
                          </a>

                           <!--    --------------------------------------------------------------------- Grupo de Opcions (ACTIVIDAD) -->    
                        <div class="btn-group btn-group-xs" role="group">
                          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Opciones
                            <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="form_tar.php?id_act='.$actividad->id.'">Nueva Tarea</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="form_act.php?id='.$actividad->id.'">Editar</a></li>
                            <li><a href="index.php?accion=borra_act&id='.$actividad->id.'">Borrar</a></li>
                          </ul>
                        </div>
                
                ');


                      print('
                                 <!-----------------------------------------------------------------------   TAREAS ----------------------------------------
                                  
                                  <!-- Table -->
                                    <div id="collapse'.$actividad->id.'" class="collapse table-responsive">
                            
                                      <table class="table table-striped table-bordered table-hover">
                                        <caption>Lista de tareas de la Actividad: <strong>'.$actividad->nombre.'<strong></caption>
                                        <thead>
                                          <tr>
                                            <td>#</td>
                                            <td>Nombre</td> 
                                            <td>Descripci&oacute;n</td>
                                            <td>Hecho</td>
                                            <td>Opciones</td>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        ');
                            
                    
                                              $num=1;
                                              if(!count($tareasAct)==0)
                                              {
                                                foreach ($tareasAct as $tarea) {
                                                  print('
                                                  <tr>
                                                    <td>'.$num.'</td>
                                                    <td>'.$tarea->nombre.'</td> 
                                                    <td>'.$tarea->descripcion.'</td>');
                                                  if($tarea->done == '1')
                                                    print('
                                                    <td><span class="glyphicon glyphicon-ok-circle"></span></td>');
                                                  else
                                                    print('
                                                    <td>-</td>');
                                                  print('
                                                    <td>
                                                      <a href="form_tar.php?id='.$tarea->id.'"><span class="glyphicon glyphicon-pencil"></span></a>
                                                      <a href="index.php?accion=borra_tar&id='.$tarea->id.'"><span class="glyphicon glyphicon-remove"></span></a>
                                                    </td>
                                                  </tr>');
                                                    $num++;

                                                }
                                              }
                                          print('
                                        </tbody>
                                      </table>
                                    </div>
                                  

                                  ');





                
            }
              
            print('
                          
                       </div>
                      </div>
                    </div>
                       
          '); 

        }
        print('

            </div>
          </div>
        </div>');


    }

    public static function lanzaFormulario($str) {




    }


  private function recalcular() {
    //Para el caso en el que se inserte, actualice o borre un dato.
    // cargar todolos datos
    self::getData();
    // Recalculo de porcentajes
    // 
    foreach (self::$proyectos as $proyecto ) {
      $actividadesPro=actividad::where("id_proyect",$proyecto->id);
      $num_a = count($actividadesPro);
      if($num_a == 0)
        $proyecto->porcentaje = 0.00;
      else{
        $num_T = 0;
        $num_T_done = 0;
        foreach ($actividadesPro as $actividad){
          $tareasAct=tarea::where("id_act",$actividad->id);
          $num_t = count($tareasAct);
          //print($num_t);
          if($num_t==0)
            $actividad->porcentaje = 0.00;
          else {
            $num_T = $num_T + $num_t;
            $num_t_done = 0;
            foreach ($tareasAct as $tarea){
              if($tarea->done==true){
                $num_t_done++;
                $num_T_done++;
              }
               
            }
            if($num_t==0)
              $actividad->porcentaje = 0.00;
            else
              $actividad->porcentaje = ($num_t_done*100)/$num_t;
            $actividad->save();
          
            
          }
        }
        if($num_T==0)
          $proyecto->porcentaje = 0.00;
        else
          $proyecto->porcentaje = ($num_T_done*100)/$num_T;
        $proyecto->save();
      }
    }
    
    
  }

  public static function borra($accion, $id) {
    $cadena=self::checktable($accion);
    $cadena::delete($id);
    self::recalcular();
  }
  
  public static function putData($str,$array) {
    $table=self::checktable($str);
    $accion = self::checkaccion($str);
    // $array = filterData($array)   // Esta funcion puede crearse aqui o dentro de setData, de forma que se realice un filtrado de lo introducido por el usuario antes de enviarlo al ORM para realizar la persistencia de datos.
    $obj=self::setData($table, $accion, $array);
    $obj->save();
    self::recalcular();
  }

  private static function checktable($str) {
    $str=substr($str,-3);
    if($str=="pro")
      $str="proyecto";
    if($str=="act")
      $str="actividad";
    if($str=="tar")
      $str="tarea";

    return $str;
  }

  private static function checkaccion($str) {
    $str=substr($str, 0, 3);
    if($str=="nue")
      $str="nuevo";
    elseif($str=="mod")
      $str="modifica";
	elseif($str=="arc")
	 $str="archiva";

    return $str;
  }

  private static function setData($tabla,$accion,$array) {
    //print("Tabla: ".$tabla." || Accion: ".$accion);
    if($accion == "modifica" || $accion == "archiva")
      $obj = $tabla::find($array["id"]);
    else
      $obj=new $tabla($array);
    //print("Tabla: ".$tabla." || Accion: ".$accion."</br></br>");
    //print_r($array);
    if($tabla=="proyecto" && $accion == "modifica") {
      $obj->nombre=$array["nombre"];
      $obj->descripcion=$array["descripcion"];
      $obj->estado=$array["estado"];
      if(isset($array["proceso"]))
        $obj->es_proceso=true;
    }
	  elseif($tabla=="proyecto" && $accion == "archiva") {
		  $obj->archived=true;
	  }
    elseif ($tabla=="actividad") {
		  if($accion=="nuevo"){
		  	$obj->nombre=$array["nombre"];
		  	$obj->descripcion=$array["descripcion"];
  			$obj->id_proyect=$array["id_proyect"];
		  }
      $obj->nombre=$array["nombre"];
      $obj->descripcion=$array["descripcion"];
      if(isset($array["proceso"]))
        $obj->es_proceso=true;
    }

    elseif ($tabla=="tarea") {
      $obj->nombre=$array["nombre"];
      $obj->descripcion=$array["descripcion"];
      if(isset($array["done"]))
        $obj->done=true;
    }

    return $obj;
  }
 
} // fin de la clase
   
?>