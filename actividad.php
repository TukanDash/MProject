<?php
//   Nombre del fichero: actividad.php

require_once ("ORM.php");


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//}   

class actividad extends ORM {  
    public $id, $nombre, $descripcion, $porcentaje, $es_proceso, $id_proyect;
    protected static $table = 'actividad';
    public function __construct($data) {
        parent::__construct();
        if ($data && sizeof($data)) {
            $this->populateFromRow($data);
        }
    }
    public function populateFromRow($data) {
        $this->id = isset($data['id_actividad']) ? intval($data['id_actividad']) : null;
        $this->nombre = isset($data['nombre']) ? $data['nombre'] : null;
        $this->descripcion = isset($data['descripcion']) ? $data['descripcion'] : null;
        $this->porcentaje = isset($data['porcentaje']) ? $data['porcentaje'] : null;
        $this->es_proceso = isset($data['es_proceso']) ? $data['es_proceso'] : null;
        $this->id_proyect = isset($data['id_proyect']) ? $data['id_proyect'] : null;
    }
}

?>