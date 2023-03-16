  
  function agregarCategoria(){
    //Validamos que el input esté lleno, por lo que lo guardamos en una variable
        var categoria = $('#nombreCategoria').val();

        if (categoria == "") {
           swal("Debes agregar una categoría");
           return false;
        } else {
           $.ajax({
                type:"POST",
                data:"categoria=" + categoria,
                url:"../procesos/categorias/agregarCategoria.php",
                success:function(respuesta){
                  respuesta = respuesta.trim();

                  if (respuesta == 1) {
                      //Cargar la tabla nuevamente
                      $('#tablaCategorias').load("categorias/tablaCategorias.php");
                      
                      //Limpamos el control una vez agregada la categoría y agregamos los mensajes
                      $('#nombreCategoria').val("");
                      swal(":D", "Agregado con exito", "success");
                  } else {
                      swal(":(", "Falló al agregar", "error");
                  }
                }
           });
        }

  }


  function eliminarCategoria(idCategoria){
    idCategoria = parseInt(idCategoria);

    if (idCategoria < 1) {
        swal("No tiene id de categoría");
        return false;

    } else {
        //Muestra mensaje de advertencia
        swal({
          title: "¿Está seguro de eliminar esta categoría?",
          text: "Una vez eliminada, no podrá recuperarse",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
                type: "POST",
                data: "idCategoria=" + idCategoria,
                url: "../procesos/categorias/eliminarCategoria.php",
                success:function(respuesta){
                  respuesta = respuesta.trim();
                  if (respuesta == 1) {
                    //Cargar la tabla nuevamente
                    $('#tablaCategorias').load("categorias/tablaCategorias.php");
                    swal("Eliminado con éxito", {
                        icon: "success",
                    });
                  } else {
                    swal(":(", "Falló al eliminar", "error");
                  }
                }
            });
          }
        });
    }
  }


  function obtenerDatosCategoria(idCategoria){
    $.ajax({
          type: "POST",
          data: "idCategoria=" + idCategoria,
          url: "../procesos/categorias/obtenerCategoria.php",
          success:function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);

            $('#id_Categoria').val(respuesta['idCategoria']);
            $('#categoriaU').val(respuesta['nombreCategoria']);


          }

    });
  }



  function actualizarCategoria() {
    //Si el control o input viene vacío, entonces muestra un mensaje
    if ($('#categoriaU').val() == "" ) {
      swal("No hay categoría");
      return false;

    } else {
        $.ajax({
              type: "POST",
              //Mandamos el formulario completo
              data: $('#frmActualizarCategoria').serialize(),
              url: "../procesos/categorias/actualizarCategoria.php",
              success:function(respuesta){
                respuesta = respuesta.trim();

                if (respuesta == 1) {
                    //Actualiza la tabla
                    $('#tablaCategorias').load("categorias/tablaCategorias.php");
                    swal(":D", "Categoría actualizada con éxito", "success");
                } else {
                    swal(":(", "Falló al actualizar", "error");
                }
              }
        });
    }
  }