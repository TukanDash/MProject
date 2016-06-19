<?php
//   Nombre del fichero: mproject.php


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

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
        require_once "proyecto.php";
        require_once "actividad.php";

        if ($archived)  //Esto cambia el listado principal segun las preferencias. Lo mejor seria cambiar la funcion were para que admitiera mas de un filtro.
          self::$proyectos = proyecto::all();
        else
          self::$proyectos = proyecto::where("archived",$archived);

        //$where_proyect=actividad::where("id_proyect",$proyecto->id);
        self::$actividades=actividad::all();
        //print_r(self::$actividades);

    }
   
    public static function mainList() {
	      // Método que lista los objetos proyecto, actividad y tarea de forma iterativa
        // Llamamos a la funcion inicial para que pinte la vista principal
    
        self::getData();
        

        print('
        <div class="panel panel-default" id="panel-proyectos">
          <div class="panel-heading"><h2>Panel de navegaci&oacute;n de Proyectos</h2></div>
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
                      <h4 class="list-group-item-heading">'.$proyecto->nombre.'</h4>
                      <p class="list-group-item-text">'.$proyecto->descripcion.'</p>
            
                    <div class="progress">
                      <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="'.
                      intval($proyecto->porcentaje).'" aria-valuemin="0" aria-valuemax="100" style="width: '.
                      intval($proyecto->porcentaje).'%; min-width: 2em;">'.intval($proyecto->porcentaje).'%
                        <span class="sr-only">'.intval($proyecto->porcentaje).'% Complete</span>
                      </div>
                    </div>

                    </a>

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
        print('

        </div>
      </div>
    </div>');


    }

    
   //private function 

    private function recalcular() {
      //Para el caso en el que se inserte, actualice o borre un dato.
      //
     
      //->save
    }



   public static function borra($id)
   {
	    
   }
  
   

   
} // fin de la clase
   
?>