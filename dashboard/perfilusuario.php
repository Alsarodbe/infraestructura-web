<?php require_once "vistas/parte_superior.php" ?>

<!--INICIO del cont principal-->
<?php
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

    $consulta = "SELECT * FROM users WHERE id = '$idUs'";			
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $datos=$resultado->fetchAll(PDO::FETCH_ASSOC);
        $nombre = $datos['name'];

?>
<hr>
<div class="container bootstrap snippet">
    <div class="row">
  		<div class="col-sm-10"><h1>User name</h1></div>
    </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->

      <div class="text-center">
        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
        <input type="file" class="text-center center-block file-upload">
      </div></hr><br>
          
        </div><!--/col-3-->
    	<div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Información</a></li>
                <li><p>   _|_   </p></li>
                <li><a data-toggle="tab" href="#messages">Editar</a></li>
              </ul>

              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                  <form class="form" action="##" method="post" id="InformationForm">
                  <div class="form-group">
                          <div class="col-xs-6">
                              <label for=""><h4>Nombre:</h4></label><br>
                              <label><h4>Nombre</h4></label>
                           </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for=""><h4>Apellidos:</h4></label><br>
                            <label><h4>Apellidos</h4></label>
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for=""><h4>Telefono:</h4></label><br>
                             <label for=""><h4>Telefono</h4></label>
                           </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for=""><h4>Correo electronico:</h4></label><br>
                              <label for=""><h4>Correo electronico</h4></label>
                           </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for=""><h4>Pais:</h4></label><br>
                              <label for=""><h4>Pais</h4></label>
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for=""><h4>Contraseña:</h4></label><br>
                              <label for=""><h4>Contraseña</h4></label>
                          </div>
                      </div>
              	</form>
              
              <hr>
              
             </div><!--/tab-pane-->
             <div class="tab-pane" id="messages">
               
               <h2></h2>
               
               <hr>
                  <form class="form" action="pufuncion.php" method="post" id="registrationForm">
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for=""><h4>Nombre</h4></label>
                              <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Apellidos" title="Coloca tu nombre">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for=""><h4>Apellidos</h4></label>
                              <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Apellidos" title="Coloca tus apellidos">
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for=""><h4>Telefono</h4></label>
                              <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Número de Telefono" title="Coloca tu número de Telefono">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for=""><h4>Correo electronico</h4></label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="Coloca tu Correo">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for=""><h4>Pais</h4></label>
                              <input type="email" class="form-control" id="location" placeholder="Pais" title="Coloca tu pais">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for=""><h4>Contraseña</h4></label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" title="Coloca tu contraseña">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for=""><h4>Verificar</h4></label>
                              <input type="password" class="form-control" name="password2" id="password2" placeholder="Verificar Contraseña" title="Coloca tu contraseña">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Guardar</button>
                               	<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Limpiar</button>
                            </div>
                      </div>
              	</form>
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->
<!--Fin del cont principal-->

<?php require_once "vistas/parte_inferior.php" ?>              
