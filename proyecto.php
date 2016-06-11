<?php
//   Nombre del fichero: proyecto.php

require ("mproject.php");


//class proyecto extends mproject
//{

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//}   

class Provincia extends ORM {  
    public $id, $nombre;
    protected static $table = 'provincias';
    public function __construct($data) {
        parent::__construct();
        if ($data && sizeof($data)) {
            $this->populateFromRow($data);
        }
    }
    public function populateFromRow($data) {
        $this->id = isset($data['id']) ? intval($data['id']) : null;
        $this->nombre = isset($data['nombre']) ? $data['nombre'] : null;
    }
}