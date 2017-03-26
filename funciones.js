function insertar(){
    $.ajax({
        type:"POST",
        dataType: "json",
        url:"./admin.php/persona/guardar",
        data: {/*miJSON : dataString*/
            "nombre" : document.getElementById("nombre5").value,
            "apellido" : document.getElementById("apellido5").value,
            "dni" : document.getElementById("dni5").value
        }
    })
    .done(function(respuesta){
        alert("Se agregó correctamente");
    })
    .fail(function(error){
        alert("Hay un error");
    });				
}	
function modificar(){			
    $.ajax({
        type:"PUT",
        dataType: "json",
        url:"./admin.php/persona/modificar",
        data: {
            "id" : document.getElementById("id5").value,
            "nombre" : document.getElementById("nombre5").value,
            "apellido" : document.getElementById("apellido5").value,
        }
    })
    .done(function(respuesta){
        alert("Se modificó correctamente");
    })
    .fail(function(error){
        alert("Hay un error");
    });		
                        
}
function eliminar(){			
    $.ajax({
        type:"DELETE",
        dataType: "json",
        url:"./admin.php/persona/borrar",
        data: {
            "id" : document.getElementById("id5").value
        }
    })
    .done(function(respuesta){
        alert("Se eliminó correctamente");
    })
    .fail(function(error){
        alert("Hay un error");
    });			
}