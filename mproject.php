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
        require_once "preferences.php";
        

        if ($archived)  //Esto cambia el listado principal segun las preferencias. Lo mejor seria cambiar la funcion were para que admitiera mas de un filtro.
          self::$proyectos = proyecto::all();
        else
          self::$proyectos = proyecto::where("archived",$archived);

        //$where_proyect=actividad::where("id_proyect",$proyecto->id);
        self::$actividades=actividad::all();
        self::$tareas=tarea::all();
        //print_r(self::$actividades);

    }
   
    public static function mainList() {
	      // Método que lista los objetos proyecto, actividad y tarea de forma iterativa
        // Llamamos a la funcion inicial para que pinte la vista principal
    
        self::getData();
        

        print('
        <div class="panel panel-default" id="panel-proyectos">
          <div class="panel-heading"><h2>Navegaci&oacute;n de Proyectos&nbsp;&nbsp;<a href="form_pro.php"><span class="label label-success">New</span></a></h2></div>
          <div class="panel-body">
            <div class="list-group">');

        foreach (self::$proyectos as $proyecto)
        {
           //print_r($proyecto);
           //print("Hola");

          
          $actividadesPro=actividad::where("id_proyect",$proyecto->id);
          $num_actividades=count($actividadesPro);
          print('
                    <a role="button" href="#collapse'.$proyecto->id.'" aria-expanded="false" id="'.$proyecto->id.'" class="list-group-item" data-toggle="collapse" data-parent="#panel_proyectos" aria-controls="collapse'.$proyecto->id.'">

                      <span class="badge">'.$num_actividades.' Act</span>
                      <h4 class="list-group-item-heading">'.$proyecto->nombre.'&nbsp;<span class="label label-success">'.$proyecto->estado.'</span></h4>

                      <p class="list-group-item-text">'.$proyecto->descripcion.'</p>
            
                    <div class="progress">
                      <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="'.
                      intval($proyecto->porcentaje).'" aria-valuemin="0" aria-valuemax="100" style="width: '.
                      intval($proyecto->porcentaje).'%; min-width: 2em;">'.intval($proyecto->porcentaje).'%
                        <span class="sr-only">'.intval($proyecto->porcentaje).'% Complete</span>
                      </div>
                    </div>
                    
                    </a>


                     <!--    --------------------------------------------------------------------- -->    
                        <div class="btn-group btn-group-xs" role="group">
                          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Opciones
                            <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="#">Nueva Aplicaci&oacute;n</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="form_pro.php?id='.$proyecto->id.'">Editar</a></li>
                            <li><a href="index.php?accion=borra_pro&id='.$proyecto->id.'">Borrar</a></li>
                            <li><a href="#">Archivar</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Ver desglose</a></li>
                          </ul>
                        </div>



                    <div id="collapse'.$proyecto->id.'" class="desplegado panel-collapse collapse in" role="tabpanel" aria-labelledby="'.$proyecto->id.'">
                      <div class="panel-body">
                          <div class="list-group">'
            );

            //$actividades-where("id_proyect",$proyecto->id);
            if($actividadesPro)
              foreach ($actividadesPro as $actividad)
            {
            //  
                //print_r($actividadesPro);
                
                print('
                          <a href="#collapse'.$actividad->id.'" id="'.$actividad->id.'" class="list-group-item" data-toggle="collapse" data-parent="#panel_proyectos" aria-controls="collapse'.$actividad->id.'">
                             <span class="badge">'.' Tareas</span>
                             <h4 class="list-group-item-heading">'.$actividad->nombre.'</h4>
                             <p class="list-group-item-text">'.$actividad->descripcion.'</p>
                    
                            <div class="progress">
                              <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="'.
                              intval($actividad->porcentaje).'" aria-valuemin="0" aria-valuemax="100" style="width: '.
                              intval($actividad->porcentaje).'%; min-width: 2em;">'.intval($actividad->porcentaje).'%
                                <span class="sr-only">'.intval($actividad->porcentaje).'% Complete</span>
                            </div>
                          </div>
                          </a>
                
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


  private function recalcular() {
    //Para el caso en el que se inserte, actualice o borre un dato.
    // 

    // Recalculo de estados
    //
    // Recalculo de contadores
    //
    // Recalculo de porcentajes
    // 
    // 
    // //->save
  }

  public static function borra($accion, $id) {
    $cadena=self::checktable($accion);
    $cadena::delete($id);
  }
  
  public static function putData($str,$array) {
    $table=self::checktable($str);
    $accion = self::checkaccion($str);
    // $array = filterData($array)   // Esta funcion puede crearse aqui o dentro de setData, de forma que se realice un filtrado de lo introducido por el usuario antes de enviarlo al ORM para realizar la persistencia de datos.
    $obj=self::setData($table, $accion, $array);
    $obj->save();
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

    return $str;
  }

  private static function setData($tabla,$accion,$array) {
    //print("Tabla: ".$tabla." || Accion: ".$accion);
    if($accion == "modifica")
      $obj = $tabla::find($array["id"]);
    else
      $obj=new $tabla($array);

    if($tabla="proyecto") {
      $obj->nombre=$array["nombre"];
      $obj->descripcion=$array["descripcion"];
      $obj->estado=$array["estado"];
      if(isset($array["proceso"]))
        $obj->es_proceso=true;
    }
    elseif ($tabla="actividad") {
      $obj->nombre=$array["nombre"];
      $obj->descripcion=$array["descripcion"];
      $obj->estado=$array["estado"];
      if(isset($array["proceso"]))
        $obj->es_proceso=true;
    }

    elseif ($tabla=="tarea") {
      $obj->nombre=$array["nombre"];
      $obj->descripcion=$array["descripcion"];
      $obj->estado=$array["estado"];
      if(isset($array["proceso"]))
        $obj->es_proceso=true;
    }

    return $obj;
  }
 
} // fin de la clase
   
?>