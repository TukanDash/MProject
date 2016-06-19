<?php
//   Nombre del fichero: mproject.php


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class mproject {

    public static $proyectos;
    public static $actividades;
    public static $tareas;

    //function __construct() {
    //    self::listado_completo();
    //}
   
    public static function listado_completo($archivado=NULL) {
	      // Método que lista los objetos proyecto, actividad y tarea de forma iterativa
        //
        include_once "proyecto.php";
        require_once "actividad.php";
        $proyectos = proyecto::where("archived",$archivado);
        
        foreach ($proyectos as $proyecto)
        {
          $where_proyect=actividad::where("id_proyect",$proyecto->id);
          $num_actividades=count($where_proyect);
          print('
        <a href="#" id="'.$proyecto->id.'" class="list-group-item">
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

            <a href="javascript:showActivities()" class="btn btn-default" role="button">
              <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
            </a>
            <div id="desglose-act"></div>
          </a>

          <div class="btn-group" role="group" aria-label="...">
            <button type="button" class="btn btn-default">Left</button>
            <div class="btn-group" role="group">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Opciones
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="#">Nueva Aplicaci&oacute;n</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="form_pro.php?id='.$proyecto->id.'">Editar</a></li>
                <li><a href="#">Borrar</a></li>
                <li><a href="#">Archivar</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Ver desglose</a></li>
              </ul>
            </div>
          </div>

      ');
        }
      


   }

   private function recalcular() {
     //Para el caso en el que se
     //->save
   }


   function crea($nombre,$desc=null)
   {
	   
   }
   function modifica($arg)
   {
	   
   }
   function borra($arg)
   {
	   
   }
   function crea_proyecto($nombre)
   {
	   
   }
   function crea_actividad($nombre)
   {
	   
   }
   function crea_tarea($nombre)
   {
	   
   }
   function modifica_proyecto($id,$nombre,$descripcion)
   {
	   
   }
   function borra_proyecto($id)
   {
	   
   }
   

   
} // fin de la clase
   
?>