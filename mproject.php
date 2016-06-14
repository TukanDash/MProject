<?php
//   Nombre del fichero: mproject.php

//require ("funciones.php");
require ("config.php");


class mproject 
{
   protected $id_conexion;

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

   function __construct()
   {
      $dbhost = $DBHost;
      $dbuser = $DBUser;
      $dbpass = $DBPass;


      $this->id_conexion=mysql_connect($dbhost, $dbuser, $dbpass);

      $db_selected = "USE ".$DB;
      mysql_query($db_selected,$this->id_conexion);
   }
   
   function __destruct() 
   {
      if (isset($this->id_conexion)) 
         mysql_close($this->id_conexion);
   }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
   function listado_completo()
   {
	    // Método que lista los objetos proyecto, actividad y tarea de forma iterativa
      //
      //for
      var_dump() 
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
   function modifica_proyecto($id,$nombre,$descripcion,$)
   {
	   
   }
   function borra_proyecto($id)
   {
	   
   }
   
/*
   function dameResultado($consulta) 
   {
      $dato=mysql_query($consulta,$this->id_conexion);
      return $dato;
   }

   function borra_registro($consulta)
   {
      mysql_query($consulta,$this->id_conexion);
   }

   function pon_datos_iniciales()
   {
      $fichero_sql = explode(";",file_get_contents('monedero.sql'));
      foreach($fichero_sql as $linea)
         mysql_query($linea,$this->id_conexion);
   }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

   function lista_cod_asiento($cod,$num) 
   {
     if ($cod=="") 
        $cod=1;

     $consulta="select * from asiento";
     $datos=mysql_query($consulta,$this->id_conexion);
     $lista="
                  <SELECT name=\"cod_asiento$num\">";
     $i=1;
     while($fila = mysql_fetch_array($datos))
     {
        $descripcion=$fila["descripcion"];
        if ($cod==$i) 
           $lista.="
                     <OPTION value=\"$i\" selected>".$descripcion."</OPTION>";
        else 
           $lista.="
                     <OPTION value=\"$i\">".$descripcion."</OPTION> ";
        $i+=1;
     }
     $lista.="
                  </SELECT>";
     return $lista;
   }
   function inserta_asiento ($orden, $descripcion,$fecha, $importe, 
                            $tipo_asiento, $cod_asiento) 
   {
      $consulta="insert into monedero 
                 values($orden,'$descripcion','$fecha','$importe', 
                        '$tipo_asiento','$cod_asiento')";
       mysql_query($consulta,$this->id_conexion);
   }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

   function lista_tipo_asiento($cadena) 
  {
     if ($cadena=="") 
        $cadena="Ingreso";
    
     $lista="
                  <SELECT name=tipo_asiento> ";

     $tipo="Ingreso"; 
     if ($cadena==$tipo) 
        $lista.="
                     <OPTION value=".$tipo." selected>".$tipo."</OPTION> ";
     else 
        $lista.="
                     <OPTION value=".$tipo.">".$tipo."</OPTION> ";

     $tipo="Gasto";
     if ($cadena==$tipo) 
        $lista.="
                     <OPTION value=".$tipo." selected>".$tipo."</OPTION> ";
     else 
        $lista.="
                     <OPTION value=".$tipo.">".$tipo."</OPTION> ";

     $lista.="
                  </SELECT>";
     return $lista;
  }


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

   function modifica_asiento ($orden, $fecha, $importe, $tipo_asiento, $cod_asiento, $descripcion) 
   {
      $consulta="UPDATE monedero
                SET fecha='$fecha', importe='$importe', tipo_asiento='$tipo_asiento',
                    cod_asiento='$cod_asiento', descripcion='$descripcion'
                WHERE orden=$orden";
      mysql_query($consulta,$this->id_conexion);
   }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

   function listado_registros($id) 
   {
    
      $consulta="SELECT m.fecha as fecha, m.importe as importe,
                        m.tipo_asiento as tipo, a.descripcion as codigo_asiento,
                        m.descripcion as descripcion, m.orden as orden
                 FROM monedero m, asiento a
                 WHERE m.cod_asiento=a.orden ";
      $datos=$this->dameResultado($consulta);          
      while($fila = mysql_fetch_array($datos))
      {
         $fecha=$fila["fecha"];
         $fechaParaMostrar=dameFechaParaMostrar($fecha);
         $importe=$fila["importe"];
         $cantidadParaMostrar=dameCantidadParaMostrar($importe);
         $tipo=$fila["tipo"];
         $codigo_asiento=$fila["codigo_asiento"];
         $descripcion=$fila["descripcion"];
         $orden=$fila["orden"];
         if ($id!=$orden)
            echo "
            <TR>".
                    "
               <TD align=middle>".$fechaParaMostrar."</TD>". 
                    "
               <TD align=right>".$cantidadParaMostrar."</TD>".
                    "
               <TD align=middle>".$tipo."</TD>".
                    "
               <TD>".$codigo_asiento."</TD>".
                    "
               <TD>".$descripcion."</TD>".
               "<TD>".
                boton_ficticio("Editar",
                              "index.php?operacion=editar&nume=".$orden).
            "
               </TD>".
               "<TD>".
               boton_ficticio("Borrar",
                              "index.php?operacion=borrar&numero=".$orden).
            "
               </TD>".
                 "
            </TR>";   
     
         else // estamos editando
           echo "  
            <TR>
            <FORM name=form3 action=index.php?operacion=modificar 
               method=post>
              <TD align=middle>
              <INPUT maxLength=10 size=8 value=".$fechaParaMostrar." 
                   name=fecha>  </TD>
              <TD>
              <INPUT maxLength=11 size=11 value=".$cantidadParaMostrar." 
                   name=importe></TD>
              <TD align=middle>".$this->lista_tipo_asiento($tipo)."</TD>
              <TD>".$this->lista_cod_asiento($codigo_asiento,1)."</TD>
              <TD>
              <INPUT maxLength=75 size=30 value=\"$descripcion\" 
                       name=descripcion></TD>
               <TD colSpan=2>
              <INPUT type=hidden value=\"$orden\" name=nume> 
              <INPUT type=submit value=\"Modificar asiento\" name=pulsa></TD>
            </FORM>
            </TR>";  
      }
   }
*/




   
} // fin de la clase
   
?>