<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Formulario Actividades</title>

	<!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="custom/css/styles.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<div class="panel panel-default" id="panel-proyectos">
<?php

    if(isset($_GET['id']) && $_GET['id']!='')
    {
       require "actividad.php";
       $actividad = actividad::find($_GET['id']);
       print('

      <div class="panel-heading"><h2>Editar Actividad</h2></div>
        <div class="panel-body">
			<form action="index.php?accion=mod_act" method="POST" class="form-horizontal">
			<input type="hidden" name="id" value="'.$actividad->id.'">
			  <div class="form-group">
			    <label for="inputNombre" class="col-sm-2 control-label">Nombre</label>
			    <div class="col-sm-10">
			      <input name="nombre" type="text" class="form-control" id="inputNombre" placeholder="Escribe nombre..." value="'.$actividad->nombre.'">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputDescripcion" class="col-sm-2 control-label">Descripci&oacute;n</label>
			    <div class="col-sm-10">
			      <textarea name="descripcion" class="form-control" id="inputDescripcion" rows="3" placeholder="Escribe descripci&oacute;n...">'.$actividad->descripcion.'</textarea>
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <div class="checkbox">
			        <label>');
       if($actividad->es_proceso==false)
       	print('
			          <input name="proceso" type="checkbox"> Proceso');
       else
       print('
			          <input name="proceso" type="checkbox" checked> Proceso');
       print('
			        </label>
			      </div>
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="button" class="btn btn-default">Cancelar</button>
			      <button type="submit" class="btn btn-primary">Guardar</button>
			    </div>
			  </div>
			</form>
		</div>
	  </div>
			');
    }
    else {

       print('

      <div class="panel-heading"><h2>Nueva Actividad</h2></div>
        <div class="panel-body">
			<form action="index.php?accion=nuevo_act" method="POST" class="form-horizontal">
			<input type="hidden" name="id_proyect" value="'.$_GET["id_proyect"].'">
			  <div class="form-group">
			    <label for="inputNombre" class="col-sm-2 control-label">Nombre</label>
			    <div class="col-sm-10">
			      <input name="nombre" type="text" class="form-control" id="inputNombre" placeholder="Escribe nombre...">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputDescripcion" class="col-sm-2 control-label">Descripci&oacute;n</label>
			    <div class="col-sm-10">
			      <textarea name="descripcion" class="form-control" id="inputDescripcion" rows="3" placeholder="Escribe descripci&oacute;n..."></textarea>
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="button" class="btn btn-default">Cancelar</button>
			      <button type="submit" class="btn btn-primary">Guardar</button>
			    </div>
			  </div>
			</form>
		</div>
	  </div>
			');
    

       }


	?>


	
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="custom/js/custom.js"></script>


</body>
</html>