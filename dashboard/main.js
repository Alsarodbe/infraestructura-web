$(document).ready(function(){
    var user_id, opcion;
    opcion = 4;

    tablaPaginas = $("#tablaPaginas").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"  
       }],
        
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

$("#formPaginas").submit(function(e){
    e.preventDefault();    
    nombre = $.trim($("#nombre").val());
    pagina = $.trim($("#pagina").val());
    contra = $.trim($("#contra").val());    
    $.ajax({
        url: "bd/crud.php",
        type: "POST",
        dataType: "json",
        data: {nombre:nombre, pagina:pagina, contra:contra, id:id, opcion:opcion},
        success: function(data){  
            console.log(data);
            id = data[0].id;            
            nombre = data[0].nombre;
            pagina = data[0].pagina;
            contra = data[0].contra;
            if(opcion == 1){tablaPaginas.row.add([id,nombre,pagina,contra]).draw();}
            else{tablaPaginas.row(fila).data([id,nombre,pagina,contra]).draw();}            
        }        
    });
    $("#modalCRUD").modal("hide");    
    
}); 
    
$("#btnNuevo").click(function(){
    $("#formPaginas").trigger("reset");
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nueva Página");            
    $("#modalCRUD").modal("show");        
    id=null;
    opcion = 1; //alta
});    
  
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    pagina = fila.find('td:eq(1)').text();
    nombre = fila.find('td:eq(2)').text();
    contra = fila.find('td:eq(3)').text();
    
    $("#pagina").val(pagina);
    $("#nombre").val(nombre);
    $("#contra").val(contra);
    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Página");            
    $("#modalCRUD").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());
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