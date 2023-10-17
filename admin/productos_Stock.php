<?php require_once "./views/parte_Superior.php"; ?>

<!--INICIO DEL CONTENIDO-->
<main>
    <div class="container-fluid">
        <h1>Tabla productos</h1>
    </div>
    <section class="container-fluid">

        <div class="btn-agregar-producto btnAgregar">
            <button type="button" class="btn btn-info btn-sm mb-4" data-toggle="modal" data-target="#modal-actualizar-producto" data-dismiss="modal"><i class="fas fa-plus-square"></i>
                Agregar Producto </button>
        </div>

        <table id="tablaProductos" class="table table-striped table-bordered nowrap text-center" style="width:100%">
            <thead>
                <tr class=" text-white bg-danger">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Descuento</th>
                    <th>Imagen</th>
                    <th>Estado</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </section>
    <!-- ./Content -->

    <!-- ventana modal para registro y actualizacion -->

    <div class="modal fade" id="modal-actualizar-producto">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!---===============
        MODAL HEADER
        ========================--->
                <div class="modal-header bg-info">
                    <h4 class="modal-title">Agregar Producto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <!---===============
        MODAL BODY
        ========================--->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="hidden" name="idP" id="idProducto" value="">
                                <label for="nombreP">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombreP">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <label for="precioP">Precio</label>
                            <input type="number" class="form-control" name="precio" id="precioP">
                        </div>
                        <div class="col-sm-4">
                            <label for="precioP">descuento</label>
                            <input type="number" class="form-control" name="descuento" id="descuentoP">
                        </div>

                        <div class="col-sm-4">
                            <label for="imagenP">Imagen</label>
                            <input type="text" class="form-control" name="imagen" id="imagenP" placeholder="ingrese la ruta de la imagen">
                        </div>
                        <div class="col-sm-4">
                            <label for="descripcionP">Descripcion</label>
                            <textarea type="text" class="form-control" rows="5" name="descripcion" id="descripcionP"></textarea>
                        </div>
                        <div class="col-sm-4">
                            <label for="estadoP">Estado</label>
                            <select type="text" class="form-control" rows="5" name="estado" id="estadoP">
                                <option value="activo">Activo</option>
                                <option value="inactivo">Inactivo</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="cantidadP">Cantidad</label>
                            <input type="number" class="form-control" rows="5" name="cantidad" id="cantidadP">
                        </div>
                    </div>
                </div>
                <!---===============
        MODAL FOOTER
        ========================--->
                <div class="modal-footer jostify-content-end">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" id="btnGuardar" class="btn btn-primary">Agregar</button>
                </div>

            </div>

        </div>
    </div>

</main>
<!--FIN DEL CONTENIDO-->

<?php require_once "./views/parte_inferior.php";   ?>


<script>
    $(document).ready(function() {

        let action = "";
        let Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButtom: false,
            timer: 3000
        })



        let table = $("#tablaProductos").DataTable({
            "ajax": {
                "url": "ajax/producto.ajax.php",
                "type": "POST",
                "dataSrc": ""

            },
            "language": {
                "processing": "Procesando...",
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "emptyTable": "Ningún dato disponible en esta tabla",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "search": "Buscar:",
                "infoThousands": ",",
                "loadingRecords": "Cargando...",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "aria": {
                    "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad",
                    "collection": "Colección",
                    "colvisRestore": "Restaurar visibilidad",
                    "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                    "copySuccess": {
                        "1": "Copiada 1 fila al portapapeles",
                        "_": "Copiadas %d fila al portapapeles"
                    },
                    "copyTitle": "Copiar al portapapeles",
                    "csv": "CSV",
                    "excel": "Excel",
                    "pageLength": {
                        "-1": "Mostrar todas las filas",
                        "1": "Mostrar 1 fila",
                        "_": "Mostrar %d filas"
                    },
                    "pdf": "PDF",
                    "print": "Imprimir"
                },
                "autoFill": {
                    "cancel": "Cancelar",
                    "fill": "Rellene todas las celdas con <i>%d<\/i>",
                    "fillHorizontal": "Rellenar celdas horizontalmente",
                    "fillVertical": "Rellenar celdas verticalmentemente"
                },
                "decimal": ",",
                "searchBuilder": {
                    "add": "Añadir condición",
                    "button": {
                        "0": "Constructor de búsqueda",
                        "_": "Constructor de búsqueda (%d)"
                    },
                    "clearAll": "Borrar todo",
                    "condition": "Condición",
                    "conditions": {
                        "date": {
                            "after": "Despues",
                            "before": "Antes",
                            "between": "Entre",
                            "empty": "Vacío",
                            "equals": "Igual a",
                            "notBetween": "No entre",
                            "notEmpty": "No Vacio",
                            "not": "Diferente de"
                        },
                        "number": {
                            "between": "Entre",
                            "empty": "Vacio",
                            "equals": "Igual a",
                            "gt": "Mayor a",
                            "gte": "Mayor o igual a",
                            "lt": "Menor que",
                            "lte": "Menor o igual que",
                            "notBetween": "No entre",
                            "notEmpty": "No vacío",
                            "not": "Diferente de"
                        },
                        "string": {
                            "contains": "Contiene",
                            "empty": "Vacío",
                            "endsWith": "Termina en",
                            "equals": "Igual a",
                            "notEmpty": "No Vacio",
                            "startsWith": "Empieza con",
                            "not": "Diferente de"
                        },
                        "array": {
                            "not": "Diferente de",
                            "equals": "Igual",
                            "empty": "Vacío",
                            "contains": "Contiene",
                            "notEmpty": "No Vacío",
                            "without": "Sin"
                        }
                    },
                    "data": "Data",
                    "deleteTitle": "Eliminar regla de filtrado",
                    "leftTitle": "Criterios anulados",
                    "logicAnd": "Y",
                    "logicOr": "O",
                    "rightTitle": "Criterios de sangría",
                    "title": {
                        "0": "Constructor de búsqueda",
                        "_": "Constructor de búsqueda (%d)"
                    },
                    "value": "Valor"
                },
                "searchPanes": {
                    "clearMessage": "Borrar todo",
                    "collapse": {
                        "0": "Paneles de búsqueda",
                        "_": "Paneles de búsqueda (%d)"
                    },
                    "count": "{total}",
                    "countFiltered": "{shown} ({total})",
                    "emptyPanes": "Sin paneles de búsqueda",
                    "loadMessage": "Cargando paneles de búsqueda",
                    "title": "Filtros Activos - %d"
                },
                "select": {
                    "1": "%d fila seleccionada",
                    "_": "%d filas seleccionadas",
                    "cells": {
                        "1": "1 celda seleccionada",
                        "_": "$d celdas seleccionadas"
                    },
                    "columns": {
                        "1": "1 columna seleccionada",
                        "_": "%d columnas seleccionadas"
                    }
                },
                "thousands": ".",
                "datetime": {
                    "previous": "Anterior",
                    "next": "Proximo",
                    "hours": "Horas",
                    "minutes": "Minutos",
                    "seconds": "Segundos",
                    "unknown": "-",
                    "amPm": [
                        "am",
                        "pm"
                    ]
                },
                "editor": {
                    "close": "Cerrar",
                    "create": {
                        "button": "Nuevo",
                        "title": "Crear Nuevo Registro",
                        "submit": "Crear"
                    },
                    "edit": {
                        "button": "Editar",
                        "title": "Editar Registro",
                        "submit": "Actualizar"
                    },
                    "remove": {
                        "button": "Eliminar",
                        "title": "Eliminar Registro",
                        "submit": "Eliminar",
                        "confirm": {
                            "_": "¿Está seguro que desea eliminar %d filas?",
                            "1": "¿Está seguro que desea eliminar 1 fila?"
                        }
                    },
                    "error": {
                        "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
                    },
                    "multi": {
                        "title": "Múltiples Valores",
                        "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
                        "restore": "Deshacer Cambios",
                        "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
                    }
                },
                "info": "Mostrando de _START_ a _END_ de _TOTAL_ entradas"
            },

            "columnDefs": [{
                "targets": 8,
                "sortable": false,
                "render": function(data, type, full, meta) {
                    return "<div style='display:flex;'>" +
                        "<button style='whith:20px' type='button' class='btn btn-primary btn-sm btnEditar' data-toggle='modal' data-target='#modal-actualizar-producto'>" + "<i class='fas fa-pencil-alt'></i>" +
                        "</button>" +
                        "<button type='button' class='btn btn-danger btn-sm btnEliminar'> " + "<i class='fas fa-trash'></i>" +
                        "</button>" +
                        "</div>";
                }

            }],
            "columns": [{
                    "data": "id"
                },
                {
                    "data": "nombre"
                },
                {
                    "data": "descripcion"
                },
                {

                    "data": "precio"
                },

                {
                    "data": "descuento"
                },
                {
                    "data": "imagen"
                },
                {
                    "data": "estado"
                },
                {
                    "data": "cantidad"
                },
                {
                    "data": "acciones"
                },
            ],

        });



        $('.btn-agregar-producto').on('click', function(){
            action = "registrar";
        });

        $('#tablaProductos tbody').on('click', '.btnEliminar', function(){
            let data = table.row($(this).parents('tr')).data();
            let id = data["id"];
        
            let datos = new FormData();
            datos.append('action',"eliminar");
            datos.append('id',id);
        

            swal.fire({
                title: "¿SEGURO?",
                text: "¿Seguro que quiere eliminar el producto?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: "Sí, Eliminar",
                cancelButtonText: "Cancelar"
            }).then(resultado =>{
                if(resultado.value){


                    //llamado ajax
                    $.ajax({
                        url: "ajax/producto.ajax.php",
                        method: 'POST',
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success:function(respuesta){
                            table.ajax.reload(null, false);

                            Toast.fire({
                                icon: 'success',
                                title: 'Confirmado',
                                text: 'La categoria se eliminó correctamente',
                            })

                        }
                    })
                }
            })



        })
// EDITAR INFORMACION

$('#tablaProductos tbody').on('click', '.btnEditar', function(){
            let data = table.row($(this).parents('tr')).data();
            action = "actualizar";
            let datos = new FormData();
            datos.append('action',"actualizar");
                    
                    $('#idProducto').val(data["id"]);
                    $('#nombreP').val(data["nombre"]);
                    $('#precioP').val(data["precio"]);
                    $('#descuentoP').val(data["descuento"]);
                    $('#descripcionP').val(data["descripcion"]);
                    $('#imagenP').val(data["imagen"]);
                    $('#cantidadP').val(data["cantidad"]);
                    $('#estadoP').val(data["estado"]);


            
})
// GUARDAR LA INFORMACION DEL PRODUCTO
        $('#btnGuardar').on('click', function() {


            let id = $('#idProducto').val(),
                    nombre = $('#nombreP').val(),
                     descuento = $('#descuentoP').val(),
                    precio = $('#precioP').val(),
                     descripcion = $('#descripcionP').val(),
                     imagen = $('#imagenP').val(),
                     cantidad = $('#cantidadP').val(),
                     estado = $('#estadoP').val();

                    // Crear un objeto FormData para enviar los datos correctamente
                    let formData = new FormData();

                    formData.append('nombre', nombre);
                    formData.append('id', id);
                    formData.append('precio', precio);
                    formData.append('descuento', descuento);
                    formData.append('descripcion', descripcion);
                    formData.append('imagen', imagen);
                    formData.append('cantidad', cantidad);
                    formData.append('estado', estado);
                    formData.append('action', action);


            swal.fire({
                title: "!CONFIRMAR",
                text: "¿DESEA CONFIRMAR?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: "Si, deseo registrar",
                cancelButtonText: "Cancelar"
            }).then(resultado => {
                if (resultado.value) {

                    $.ajax({
                        url: 'ajax/producto.ajax.php',
                        method: 'POST',
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(respuesta) {
                            table.ajax.reload(null, false);
                            $('#nombreP').val('');
                            $('#descuentoP').val('');
                            $('#precioP').val('');
                            $('#descripcionP').val('');
                            $('#imagenP').val('');
                            $('#cantidadP').val('');
                            $('#estadoP').val('activo');
                            Toast.fire({
                                icon: 'success',
                                title: respuesta
                            })

                        } 
                    });



                }else{
                            
                }
            })


        });
    })










    // yuca: https://www.semana.com/resizer/wpm5cy7iLgNmWLwHGfjyNbMAnNc=/1280x0/smart/filters:format(jpg):quality(80)/cloudfront-us-east-1.images.arcpublishing.com/semana/2B666A7UU5CTLPPSF7MU7KOGTE.jpg
    // platano: https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYOmDQZqOauRN3-FseBJG0FU5pmdZw29DI7e33Z0chkK_HAzWDC3op5oUpJp0Tm4Zw1PI&usqp=CAU
    // auyama: https://www.mercadoscampesinos.gov.co/wp-content/uploads/2021/04/Auyama-comun-400x400.jpg
    // Limon: https://frutasaida.com/cdn/shop/products/criollo_1024x1024.jpg?v=1590512394
    // ñame: https://jumbocolombiaio.vtexassets.com/arquivos/ids/203173/1380.jpg?v=637814193870330000
    // guayaba: https://5aldia.cl/wp-content/uploads/2021/03/guayaba.jpeg
</script>