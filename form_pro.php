<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Formulario Proyectos</title>

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
       require "proyecto.php";
       $proyecto = proyecto::find($_GET['id']);
       print('

      <div class="panel-heading"><h2>Editar Proyecto</h2></div>
        <div class="panel-body">
			<form class="form-horizontal">
			  <div class="form-group">
			    <label for="inputNombre" class="col-sm-2 control-label">Nombre</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputNombre" placeholder="Escribe nombre..." name="'.$proyecto->nombre.'">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputDescripcion" class="col-sm-2 control-label">Descripci&oacute;n</label>
			    <div class="col-sm-10">
			      <textarea class="form-control" id="inputDescripcion" rows="3" placeholder="Escribe descripci&oacute;n...">'.$proyecto->descripcion.'</textarea>
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <div class="checkbox">
			        <label>
			          <input type="checkbox"> Proceso
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

      <div class="panel-heading"><h2>Nuevo Proyecto</h2></div>
        <div class="panel-body">
			<form class="form-horizontal">
			  <div class="form-group">
			    <label for="inputNombre" class="col-sm-2 control-label">Nombre</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="inputNombre" placeholder="Escribe nombre...">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputDescripcion" class="col-sm-2 control-label">Descripci&oacute;n</label>
			    <div class="col-sm-10">
			      <textarea class="form-control" id="inputDescripcion" rows="3" placeholder="Escribe descripci&oacute;n..."></textarea>
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <div class="checkbox">
			        <label>
			          <input type="checkbox"> Proceso
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


	?>


	
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="custom/js/custom.js"></script>


</body>
</html>