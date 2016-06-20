<?php
//   Nombre del fichero: orm.php

class ORM {  
    private static $database;
    protected static $table;
    function __construct() {
        self::getConnection();
    }
    private static function getConnection() {
        require_once ('Database.php');
        require ('config.php');  // -> Este archivo config es necesario que no dependa de ORM.php, sino de Database.php, de tal forma que
        //todo lo relativo a la conexión forme parte del nivel de abstracción de Database.php (provider, host, user, password, dbname).
        
        //self::$database = Database::getConnection(DB_PROVIDER, DB_HOST, DB_USER, DB_PASSWORD, DB_DB);
        //self::$database = Database::getConnection("MySQL", "localhost", "root", "", "mproject");
        self::$database = Database::getConnection($provider);
    }
    public static function find($id) {   //Los metodos estáticos: no es necesario crear una instancia para poder usarlos.
        $field= 'id_'. static ::$table;
        $results = self::where($field, $id);
        return $results[0];
    }
    public static function where($field, $value, $order = null) {
        $obj = null;
        self::getConnection();
        $query = "SELECT * FROM " . static ::$table . " WHERE " . $field . " = ?";
        $results = self::$database->execute($query, null, array($value));
        if ($results) {
            $class = get_called_class();
            for ($i = 0;$i < sizeof($results);$i++) {
                $obj[] = new $class($results[$i]);
            }
        }
        return $obj;
    }
    public static function all($order = null) {
        $objs = null;
        self::getConnection();
        $query = "SELECT * FROM " . static ::$table;
        if ($order) {
            $query.= $order;
        }
        $results = self::$database->execute($query, null, null);
        if ($results) {
            $class = get_called_class();
            foreach ($results as $index => $obj) {
                $objs[] = new $class($obj);
            }
        }
        return $objs;
    }
    public function save() {   //En el caso de la función save (que no esestática), si es necesario instanciar un objeto para poder usar el método.
        $values = get_object_vars($this);
        $filtered = null;
        foreach ($values as $key => $value) {
            if ($value !== null && $value !== '' && strpos($key, 'obj_') === false && $key !== 'id_'. static ::$table) {
                if ($value === false) {
                    $value = 0;
                }
                if($key == "id")
                    $key = "id_". static ::$table;
                $filtered[$key] = $value;
            }
        } 
        $columns = array_keys($filtered);
        if ($this->id) {
            $columns = join(" = ?, ", $columns);
            $columns.= ' = ?';
            $query = "UPDATE " . static ::$table . " SET $columns WHERE id_". static ::$table ." =" . $this->id;
        } else {
            $params = join(", ", array_fill(0, count($columns), "?"));
            $columns = join(", ", $columns);
            $query = "INSERT INTO " . static ::$table . " ($columns) VALUES ($params)";
        }
        $result = self::$database->execute($query, null, $filtered);
        if ($result) {
            $result = array('error' => false, 'message' => self::$database->getInsertedID());
        } else {
            $result = array('error' => true, 'message' => self::$database->getError());
        }
        return $result;
    }

    public static function delete($id) {  //
        self::getConnection();
        $query = "DELETE FROM " . static ::$table . " WHERE id_". static ::$table ." =" . $id;
        $result = self::$database->execute($query);
        if ($result) {
            $result = array('error' => false, 'message' => self::$database->getInsertedID()); /////Este getInsertedID() deberia de ser modificado por getDeletedID();
        } else {
            $result = array('error' => true, 'message' => self::$database->getError());
        }
        return $result;
    }
}

?>