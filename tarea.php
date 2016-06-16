<?php
//   Nombre del fichero: tarea.php

require_once ("ORM.php");


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//}   

class tarea extends ORM {  
    public $id, $nombre, $descripcion, $done, $id_act;
    protected static $table = 'tarea';
    public function __construct($data) {
        parent::__construct();
        if ($data && sizeof($data)) {
            $this->populateFromRow($data);
        }
    }
    public function populateFromRow($data) {
        $this->id = isset($data['id_tarea']) ? intval($data['id_tarea']) : null;
        $this->nombre = isset($data['nombre']) ? $data['nombre'] : null;
        $this->descripcion = isset($data['descripcion']) ? $data['descripcion'] : null;
        $this->done = isset($data['done']) ? $data['done'] : null;
        $this->id_act = isset($data['id_act']) ? $data['id_act'] : null;
    }
}

?>