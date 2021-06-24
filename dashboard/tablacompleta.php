   <?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Tabla Completa</h1>

<div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo</button>    
            </div>    
        </div>    
    </div>    
    <br>  
<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaPaginas" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>id</th>
                                <th>Página Web</th>
                                <th>Nombre Usuario</th>
                                <th>Contraseña</th>     
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>                 
                        </tbody>        
                       </table>                    
                    </div>
                </div>
        </div>  
    </div>    
      
<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formPaginas">    
            <div class="modal-body">
                <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Página:</label>
                    <input type="text" class="form-control" id="pagina">
                    </div> 
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Nombre Usuario:</label>
                    <input type="text" class="form-control" id="nombre">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Contraseña:</label>
                    <input type="text" class="form-control" id="contra">
                    </div> 
                </div>     
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  
      
    
    
</div>
<!--FIN del cont principal-->

<?php require_once "vistas/parte_inferior.php"?>

           
