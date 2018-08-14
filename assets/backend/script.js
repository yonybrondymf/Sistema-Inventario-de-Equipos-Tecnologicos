$(document).ready(function(){
	$(document).on("keyup",".dataTables_filter input",function() {
	    var value = $(this).val();
	    $("#search").val(value);
	});

	$(document).on("submit","#upload-data",function(e){
		e.preventDefault();

		swal({
		    title: "¿Estas seguro de importar los datos del archivo selecionado?",
		    text: "Si esta seguro de hacerlo haga click en el boton Aceptar, caso contrario haga click en cancelar",
		    type: "warning",
	        showCancelButton: true,
	        confirmButtonClass: "btn-danger",
	        confirmButtonText: "Aceptar",
	        closeOnConfirm: false,
	        showLoaderOnConfirm: true,
		},
		function(isConfirm){

		   	if (isConfirm){
		     	var formData = new FormData($("#upload-data")[0]);

				$.ajax({
					url: base_url + "administrador/usuarios/importar",
					type:"POST",
					data: formData,
					cache:false,
					contentType:false,
					processData:false,
					//dataType:"json",
					success:function(resp){
						if (Number(resp) == 1) {
							swal({
							     title: "Bien Hecho!",
							     text: "La importación de los datos fue exitosa",
							     type: "success",
							     timer: 3000
							     },
							     function () {
							            location.reload(true);
							            tr.hide();
							    });
							/*swal("Registro Exitoso!", "Su imagen de Perfil fue actualizada", "success");
							window.location.href = base_url + "usuario/perfil";*/
						}else{
							//alert(resp.error);
							swal("Error!","No se pudo importar los datos", "error");
						}
					}
				});
		    } 
		 });

		
	});
	

	$(document).on("click", ".btn-view",function(){
		id = $(this).val();
		modulo = $("#modulo").val();
		$.ajax({
			url: base_url + "equipos/"+modulo+"/view",
			type: "POST",
			data: {id:id},
			success: function(resp){
				$("#modal-default .modal-body").html(resp);
			}
		});
	});
	$(document).on("click", ".btn-view-conf",function(){
		id = $(this).val();
		modulo = $("#modulo").val();
		$.ajax({
			url: base_url + "configuraciones/"+modulo+"/view",
			type: "POST",
			data: {id:id},
			success: function(resp){
				$("#modal-default .modal-body").html(resp);
			}
		});
	});

	$(document).on("click", ".btn-delete", function(e){
		e.preventDefault();
		ruta = $(this).attr("href");
		swal({
		    title: "¿Estas seguro de eliminar el registro?",
		    text: "Si esta seguro de hacerlo haga click en el boton Aceptar, caso contrario haga click en cancelar",
		    type: "warning",
	        showCancelButton: true,
	        confirmButtonClass: "btn-danger",
	        confirmButtonText: "Aceptar",
	        closeOnConfirm: false,
	        showLoaderOnConfirm: true,
		},
		function(isConfirm){

		   	if (isConfirm){
		     	$.ajax({
					url: ruta,
					type: "POST",
					success: function(resp){
						window.location.href = base_url + resp;
					}
				});
		    } 
		 });
		
	});
	
	$('.btn-group button , .btn-group a').tooltip(); 



	$(document).on("click", ".btn-mante", function(){
		idequipo = $(this).val();

		$("#idequipo").val(idequipo);
		modulo = $("#modulo").val();

		$.ajax({
			url: base_url + "equipos/"+modulo+"/getMantenimientos",
			type: "POST",
			data:{idequipo:idequipo},
			dataType: "json",
			success:function(resp){
				html = "";
				$.each(resp, function( index, value ) {
					html += "<tr>";
					html += "<td>"+value.id+"</td>";
					html += "<td>"+value.fecha+"</td>";
					html += "<td>"+value.tecnico+"</td>";
					html += "<td>"+value.descripcion+"</td>"
					html += "</tr>";
				});

				$("#tbmantenimientos tbody").html(html);
			}
		});


	}); 

	$("#tb-without-buttons").DataTable({
		language: {
	            "lengthMenu": "Mostrar _MENU_ registros por pagina",
	            "zeroRecords": "No se encontraron resultados en su busqueda",
	            "searchPlaceholder": "Buscar registros",
	            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
	            "infoEmpty": "No existen registros",
	            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
	            "search": "Buscar:",
	            "paginate": {
	                "first": "Primero",
	                "last": "Último",
	                "next": "Siguiente",
	                "previous": "Anterior"
	            },
	        },
	}); 

	$("#tb-with-buttons").DataTable({
		dom: 'lBfrtip',
		language: {
	            "lengthMenu": "Mostrar _MENU_ registros por pagina",
	            "zeroRecords": "No se encontraron resultados en su busqueda",
	            "searchPlaceholder": "Buscar registros",
	            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
	            "infoEmpty": "No existen registros",
	            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
	            "search": "Buscar:",
	            "paginate": {
	                "first": "Primero",
	                "last": "Último",
	                "next": "Siguiente",
	                "previous": "Anterior"
	            },
	        },

            buttons: [
                {
	                extend: 'excelHtml5',
	                title: "Listado de "+ $("#modulo").val(),
	                exportOptions: {
	                    columns: [':visible :not(:last-child)']
	                },
	            },
	            {
	                extend: 'pdfHtml5',
	                title: "Listado de "+$("#modulo").val(),
	                exportOptions: {
	                    columns: [':visible :not(:last-child)']
	                }
	                
	            }
            ],
            pageSize: 'A4',
            content: [{ style: 'fullWidth' }],
            styles: { // style for printing PDF body
                    fullWidth: { fontSize: 18, bold: true, alignment: 'right', margin: [0,0,0,0] }
            },
	}); 

	$("#tbcomputadora").DataTable({
		dom: 'lBfrtip',
		language: {
	            "lengthMenu": "Mostrar _MENU_ registros por pagina",
	            "zeroRecords": "No se encontraron resultados en su busqueda",
	            "searchPlaceholder": "Buscar registros",
	            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
	            "infoEmpty": "No existen registros",
	            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
	            "search": "Buscar:",
	            "paginate": {
	                "first": "Primero",
	                "last": "Último",
	                "next": "Siguiente",
	                "previous": "Anterior"
	            },
	        },

            buttons: [
                {
	                extend: 'excelHtml5',
	                title: "Listado de "+ $("#modulo").val(),
	                exportOptions: {
	                    columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21]
	                },
	                orientation: 'landscape', 
	                pageSize: 'LEGAL'
	            },
	            {
	                extend: 'pdfHtml5',
	                title: "Listado de "+$("#modulo").val(),
	                exportOptions: {
	                    columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21]
	                },
	                orientation: 'landscape', 
	                pageSize: 'LEGAL'
	                
	            }
            ],
            "columnDefs": [
	            {
	                "targets": [ 2 ],
	                "visible": false,
	                "searchable": false
	            },
	            {
	                "targets": [ 3 ],
	                "visible": false,
	                "searchable": false
	            },
	            {
	                "targets": [ 4 ],
	                "visible": false,
	                "searchable": false
	            },
	            {
	                "targets": [ 5 ],
	                "visible": false,
	                "searchable": false
	            },
	            
	            {
	                "targets": [ 12 ],
	                "visible": false,
	                "searchable": false
	            },
	            
	            {
	                "targets": [ 14 ],
	                "visible": false,
	                "searchable": false
	            },
	            {
	                "targets": [ 15 ],
	                "visible": false,
	                "searchable": false
	            },
	            {
	                "targets": [ 16 ],
	                "visible": false,
	                "searchable": false
	            },
	            {
	                "targets": [ 17 ],
	                "visible": false,
	                "searchable": false
	            },
	           	{
	                "targets": [ 18 ],
	                "visible": false,
	                "searchable": false
	            },
	            {
	                "targets": [ 20 ],
	                "visible": false,
	                "searchable": false
	            },

	        ],
	});

	$("#tbmonitor").DataTable({
		dom: 'lBfrtip',
		language: {
	            "lengthMenu": "Mostrar _MENU_ registros por pagina",
	            "zeroRecords": "No se encontraron resultados en su busqueda",
	            "searchPlaceholder": "Buscar registros",
	            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
	            "infoEmpty": "No existen registros",
	            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
	            "search": "Buscar:",
	            "paginate": {
	                "first": "Primero",
	                "last": "Último",
	                "next": "Siguiente",
	                "previous": "Anterior"
	            },
	        },

            buttons: [
                {
	                extend: 'excelHtml5',
	                title: "Listado de "+ $("#modulo").val(),
	                exportOptions: {
	                    columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14]
	                },
	                orientation: 'landscape', 
	                pageSize: 'LEGAL'
	            },
	            {
	                extend: 'pdfHtml5',
	                title: "Listado de "+$("#modulo").val(),
	                exportOptions: {
	                    columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14]
	                },
	                orientation: 'landscape', 
	                pageSize: 'LEGAL'
	                
	            }
            ],
            "columnDefs": [
	            {
	                "targets": [ 3 ],
	                "visible": false,
	                "searchable": false
	            },
	            {
	                "targets": [ 6 ],
	                "visible": false,
	                "searchable": false
	            },
	            {
	                "targets": [ 7 ],
	                "visible": false,
	                "searchable": false
	            },
	            {
	                "targets": [ 8 ],
	                "visible": false,
	                "searchable": false
	            },
	            
	            {
	                "targets": [ 9 ],
	                "visible": false,
	                "searchable": false
	            },
	            
	            {
	                "targets": [ 11 ],
	                "visible": false,
	                "searchable": false
	            },
	            
	            

	        ],
	});

	$("#tbimpresora").DataTable({
		dom: 'lBfrtip',
		language: {
	            "lengthMenu": "Mostrar _MENU_ registros por pagina",
	            "zeroRecords": "No se encontraron resultados en su busqueda",
	            "searchPlaceholder": "Buscar registros",
	            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
	            "infoEmpty": "No existen registros",
	            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
	            "search": "Buscar:",
	            "paginate": {
	                "first": "Primero",
	                "last": "Último",
	                "next": "Siguiente",
	                "previous": "Anterior"
	            },
	        },

            buttons: [
                {
	                extend: 'excelHtml5',
	                title: "Listado de "+ $("#modulo").val(),
	                exportOptions: {
	                    columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13]
	                },
	                orientation: 'landscape', 
	                pageSize: 'LEGAL'
	            },
	            {
	                extend: 'pdfHtml5',
	                title: "Listado de "+$("#modulo").val(),
	                exportOptions: {
	                    columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13]
	                },
	                orientation: 'landscape', 
	                pageSize: 'LEGAL'
	                
	            }
            ],
            "columnDefs": [
	            {
	                "targets": [ 2 ],
	                "visible": false,
	                "searchable": false
	            },
	            {
	                "targets": [ 5 ],
	                "visible": false,
	                "searchable": false
	            },
	            {
	                "targets": [ 6 ],
	                "visible": false,
	                "searchable": false
	            },
	            {
	                "targets": [ 7 ],
	                "visible": false,
	                "searchable": false
	            },
	            {
	                "targets": [ 8 ],
	                "visible": false,
	                "searchable": false
	            },

	        ],
	});
	

	$(document).on("click", "#btn-agregar-mantenimiento", function(){
		$("#form-mantenimiento")[0].reset();
		$("#idMantenimiento").val(null);
	});
	$(document).on("click", ".btn-edit-mantenimiento", function(){
		id = $(this).val();
		$("#idMantenimiento").val(id);
		$.ajax({
			url: base_url + "mantenimientos/vehiculos/getMantenimiento",
			type: "POST",
			data: {id: id},
			dataType:"json",
			success:function(resp){
				$("#numfac").val(resp.numfac);
				$("#costo").val(resp.costo);
				$("#descripcion").val(resp.descripcion);
				$("#proveedor").val(resp.proveedor);
				$("#fecha").val(resp.fecha_vencimiento);
				$("#tipomantenimiento").val(resp.tipomantenimiento_id);
				$("#cantidad").val(resp.cantidad);
			}
		});
	});
	$(document).on("click", ".btn-subir", function(){
		valorbtn = $(this).val(); 
		info = valorbtn.split("*");
		$("#idUsuario").val(info[0]);
		if (info[1] !="") {
			html = "<img src='"+base_url+"assets/images/firmas/"+info[1]+"' class='imagen-firma img-responsive'>";
			$(".imagen").html(html);
			$(".label-imagen").text("Actualizar Firma:");
		} else{
			$(".imagen").html("");
			$(".label-imagen").text("Subir Firma:");
		}

	});

	$(document).on("submit","#form-change-firma",function(e){
		e.preventDefault();

		var formData = new FormData($("#form-change-firma")[0]);

		$.ajax({
			url: base_url + "administrador/usuarios/changeFirma",
			type:"POST",
			data: formData,
			cache:false,
			contentType:false,
			processData:false,
			dataType:"json",
			success:function(resp){
				if (resp.status == 1) {
					swal({
					     title: "Bien Hecho!",
					     text: "Su imagen de Firma fue actualizada",
					     type: "success",
					     timer: 3000
					     },
					     function () {
					            location.reload(true);
					            tr.hide();
					    });
					/*swal("Registro Exitoso!", "Su imagen de Perfil fue actualizada", "success");
					window.location.href = base_url + "usuario/perfil";*/
				}else{
					//alert(resp.error);
					swal("Error!", resp.error.replace(/(<([^>]+)>)/ig,""), "error");
				}
			}
		});
	});
	$("#form-change-hoja").submit(function(e){
		e.preventDefault();
		var formData = new FormData($("#form-change-hoja")[0]);

		$.ajax({
			url: base_url + "administrador/usuarios/changeHoja",
			type:"POST",
			data: formData,
			cache:false,
			contentType:false,
			processData:false,
			dataType:"json",
			success:function(resp){
				if (resp.status == 1) {
					swal({
					     title: "Bien Hecho!",
					     text: "Su hoja de vida fue actualizada",
					     type: "success",
					     timer: 3000
					     },
					     function () {
					            location.reload(true);
					            tr.hide();
					    });
				}else{
					swal("Error!", resp.error.replace(/(<([^>]+)>)/ig,""), "error");
				}
			}
		});
	});
	$("#form-change-image").submit(function(e){
		e.preventDefault();

		var formData = new FormData($("#form-change-image")[0]);

		$.ajax({
			url: base_url + "administrador/usuarios/changeImagen",
			type:"POST",
			data: formData,
			cache:false,
			contentType:false,
			processData:false,
			dataType:"json",
			success:function(resp){
				if (resp.status == 1) {
					swal({
					     title: "Bien Hecho!",
					     text: "Su imagen de Perfil fue actualizada",
					     type: "success",
					     timer: 3000
					     },
					     function () {
					            location.reload(true);
					            tr.hide();
					    });
					/*swal("Registro Exitoso!", "Su imagen de Perfil fue actualizada", "success");
					window.location.href = base_url + "usuario/perfil";*/
				}else{
					//alert(resp.error);
					swal("Error!", resp.error.replace(/(<([^>]+)>)/ig,""), "error");
				}
			}
		});
	});



	$(document).on("click",".btn-print",function(){

        $(".modal-body").print({
            globalStyles: true,
            mediaPrint: false,
            stylesheet: null,
            noPrintSelector: ".no-print",
            append: null,
            prepend: null,
            manuallyCopyFormValues: true,
            deferred: $.Deferred(),
            timeout: 750,
            title: "  ",
            doctype: '<!doctype html>'
        });
    });

	$(".btn-view-proveedor").on("click", function(){
		id = $(this).val();
		$.ajax({
				url: base_url + "ingresos/proveedores/view",
				type:"POST",
				data: {id: id},
				success:function(resp){
					$("#modal-default .modal-body").html(resp);
				}
			});
	});



	$(".btn-habilitar").on("click", function(){
		id = $(this).val();
		swal({
		    title: "¿Estas de habilitar al usuario seleccionado?",
		    text: "Si esta seguro de hacerlo haga click en el boton Aceptar, caso contrario haga click en cancelar",
		    type: "warning",
	        showCancelButton: true,
	        confirmButtonClass: "btn-danger",
	        confirmButtonText: "Aceptar",
	        closeOnConfirm: false,
	        showLoaderOnConfirm: true,
		},
		function(isConfirm){

		   	if (isConfirm){
		     	ActualizarUsuario(id, 1);
		    } 
		 });
		

		//ActualizarUsuario(id, 1);
	});
	$(".btn-deshabilitar").on("click", function(){
		id = $(this).val();

		swal({
		    title: "¿Estas de deshabilitar al usuario seleccionado?",
		    text: "Si esta seguro de hacerlo haga click en el boton Aceptar, caso contrario haga click en cancelar",
		    type: "warning",
	        showCancelButton: true,
	        confirmButtonClass: "btn-danger",
	        confirmButtonText: "Aceptar",
	        closeOnConfirm: false,
	        showLoaderOnConfirm: true,
		},
		function(isConfirm){

		   	if (isConfirm){
		     	ActualizarUsuario(id, 0);
		    } 
		 });
		
	});
	$(document).ready(function() {
        $('#tbproveedor').DataTable({
            dom: 'lBfrtip',
            language: {
	            "lengthMenu": "Mostrar _MENU_ registros por pagina",
	            "zeroRecords": "No se encontraron resultados en su busqueda",
	            "searchPlaceholder": "Buscar registros",
	            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
	            "infoEmpty": "No existen registros",
	            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
	            "search": "Buscar:",
	            "paginate": {
	                "first": "Primero",
	                "last": "Último",
	                "next": "Siguiente",
	                "previous": "Anterior"
	            },
	        },
            buttons: [
                {
	                extend: 'excelHtml5',
	                title: "Listado de Proveedores",
	                exportOptions: {
	                    columns: [ 0, 1,2, 3, 4, 5,6,7 ]
	                },
	            },
	            {
	                extend: 'pdfHtml5',
	                title: "Listado de Proveedores",
	                exportOptions: {
	                    columns: [ 0, 1,2, 3, 4, 5 ,6,7]
	                }
	                
	            }
            ],
            pageSize: 'A4',
            content: [{ style: 'fullWidth' }],
            styles: { // style for printing PDF body
                    fullWidth: { fontSize: 18, bold: true, alignment: 'right', margin: [0,0,0,0] }
            },
        });
    } );

   
    $(document).ready(function() {
        $('#tbmantenimiento').DataTable({
            dom: 'lBfrtip',
            language: {
	            "lengthMenu": "Mostrar _MENU_ registros por pagina",
	            "zeroRecords": "No se encontraron resultados en su busqueda",
	            "searchPlaceholder": "Buscar registros",
	            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
	            "infoEmpty": "No existen registros",
	            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
	            "search": "Buscar:",
	            "paginate": {
	                "first": "Primero",
	                "last": "Último",
	                "next": "Siguiente",
	                "previous": "Anterior"
	            },
	        },
            buttons: [
                {
	                extend: 'excelHtml5',
	                title: "Listado de Mantenimientos",
	                exportOptions: {
	                    columns: [ 0, 1,2, 3, 4, 5,6,7,8,9 ]
	                },
	            },
	            {
	                extend: 'pdfHtml5',
	                title: "Listado de Mantenimientos",
	                exportOptions: {
	                    columns: [ 0, 1,2, 3, 4, 5 ,6,7,8,9]
	                },
	                orientation: 'landscape',
	                
	            }
            ],
            pageSize: 'A4',
            content: [{ style: 'fullWidth' }],
            styles: { // style for printing PDF body
                    fullWidth: { fontSize: 10, bold: true, alignment: 'right', margin: [0,0,0,0] }
            },
        });
    } );

    $(document).ready(function() {
        $('#tbusuario').DataTable({
            dom: 'lBfrtip',
            language: {
	            "lengthMenu": "Mostrar _MENU_ registros por pagina",
	            "zeroRecords": "No se encontraron resultados en su busqueda",
	            "searchPlaceholder": "Buscar registros",
	            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
	            "infoEmpty": "No existen registros",
	            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
	            "search": "Buscar:",
	            "paginate": {
	                "first": "Primero",
	                "last": "Último",
	                "next": "Siguiente",
	                "previous": "Anterior"
	            },
	        },
            buttons: [
                {
	                extend: 'excelHtml5',
	                title: "Listado de Usuarios",
	                exportOptions: {
	                    columns: [ 0, 1,2, 3, 4]
	                },
	            },
	            {
	                extend: 'pdfHtml5',
	                title: "Listado de Usuarios",
	                exportOptions: {
	                    columns: [ 0, 1,2, 3, 4]
	                }
	                
	            }
            ],
            pageSize: 'A4',
            content: [{ style: 'fullWidth' }],
            styles: { // style for printing PDF body
                    fullWidth: { fontSize: 18, bold: true, alignment: 'right', margin: [0,0,0,0] }
            },
        });
    } );

});

function ActualizarUsuario(idusuario, estado){
	$.ajax({
		url: base_url + "administrador/usuarios/actEstado",
		type: "POST",
		data: {id:idusuario,estado:estado},
		success:function(resp){
			window.location.href = base_url + resp;
		}
	});
}