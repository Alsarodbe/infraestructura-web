$(document).ready(function(){
    var id, opcion;
    opcion = 4;

    tablaPaginas = $("#tablaPaginas").DataTable({
        "ajax":{            
            "url": "bd/crud.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "id"},
            {"data": "pagina"},
            {"data": "nombre"},
            {"data": "contra"},
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'>Editar</button><button class='btn btn-danger btn-sm btnBorrar'>Eliminar</button></div></div>"}
        ],
        
        //Para cambiar el lenguaje a español
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });

var fila; //captura la fila, para editar o eliminar
//submit para el Alta y Actualización
$('#formPaginas').submit(function(e){
    e.preventDefault();    
    nombre = $.trim($("#nombre").val());
    pagina = $.trim($("#pagina").val());
    contra = $.trim($("#contra").val());  

    $.ajax({
        url: "bd/crud.php",
        type: "POST",
        datatype:"json",    
        data: {id:id,pagina:pagina,nombre:nombre, contra:contra, opcion:opcion},    
        success: function(data) {
            tablaPaginas.ajax.reload(null, false);
         }
      });	
    $("#modalCRUD").modal("hide");    
    
}); 
    
$("#btnNuevo").click(function(){
    opcion = 1; //alta
    id=null;
    $("#formPaginas").trigger("reset");
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nueva Página");            
    $('#modalCRUD').modal('show');        
});    
  
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    opcion = 2; //editar
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    pagina = fila.find('td:eq(1)').text();
    nombre = fila.find('td:eq(2)').text();
    contra = fila.find('td:eq(3)').text();
    
    $("#pagina").val(pagina);
    $("#nombre").val(nombre);
    $("#contra").val(contra);
    
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Página");            
    $('#modalCRUD').modal('show');  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    id = parseInt($(this).closest('tr').find('td:eq(0)').text());
    opcion = 3 //borrar
    var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crud.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, id:id},
            success: function(){
                tablaPaginas.row(fila.parents('tr')).remove().draw();
            }
        });
    }   
});   
    
});