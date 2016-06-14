<?php
//   Nombre del fichero: proyecto.php

require ("ORM.php");


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//}   

class proyecto extends ORM {  
    public $id, $nombre, $descripcion, $porcentaje, $estado, $archived, $es_proceso;
    protected static $table = 'proyecto';
    public function __construct($data) {
        parent::__construct();
        if ($data && sizeof($data)) {
            $this->populateFromRow($data);
        }
    }
    public function populateFromRow($data) {
        $this->id = isset($data['id_proyecto']) ? intval($data['id_proyecto']) : null;
        $this->nombre = isset($data['nombre']) ? $data['nombre'] : null;
        $this->descripcion = isset($data['descripcion']) ? $data['descripcion'] : null;
        $this->porcentaje = isset($data['porcentaje']) ? $data['porcentaje'] : null;
        $this->estado = isset($data['estado']) ? $data['estado'] : null;
        $this->archived = isset($data['archived']) ? $data['archived'] : null;
        $this->es_proceso = isset($data['es_proceso']) ? $data['es_proceso'] : null;
    }
}

?>