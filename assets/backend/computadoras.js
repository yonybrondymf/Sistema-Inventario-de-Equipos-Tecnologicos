$(document).ready(function(){
	/*mostrarComputadoras("",1,10);
	mostrarImpresoras("",1,10);
	mostrarMonitores("",1,10);
	mostrarTablets("",1,10);
	mostrarProyectores("",1,10);
	mostrarLectores("",1,10);*/

	$("#file-excel").mouseover(function(){
        $("#tipoarchivo").val("1");
    });
    $("#file-pdf").mouseover(function(){
        $("#tipoarchivo").val("2");
    });
	$('#checkRange').change(function() {
        if($(this).is(":checked")) {
            $(this).val("1");
            $("#fecinicio").removeAttr("disabled");
            $("#fecfin").removeAttr("disabled");
            $("#fecinicio").attr("required","required");
            $("#fecfin").attr("required","required");
            

        }
       	else{
       		$(this).val("0");
       		$("#fecinicio").attr("disabled","disabled");
            $("#fecfin").attr("disabled","disabled");
            $("#fecinicio").removeAttr("required");
            $("#fecfin").removeAttr("required");
            $("#fecinicio").val(null);
            $("#fecfin").val(null);


       	}       
    });
    $("#searchImpresoras").submit(function(e){
		e.preventDefault();

		$("#fechainicio").val($("#fecinicio").val());
		$("#fechafin").val($("#fecfin").val());
		$("#searchfecha").val($("#checkRange").val());
		$("#search").val($("#busqueda").val());
		valorBuscar = $("#search").val();
		mostrarImpresoras(valorBuscar,1,10);
	});

	$("#searchMonitores").submit(function(e){
		e.preventDefault();

		$("#fechainicio").val($("#fecinicio").val());
		$("#fechafin").val($("#fecfin").val());
		$("#searchfecha").val($("#checkRange").val());
		$("#search").val($("#busqueda").val());
		valorBuscar = $("#search").val();
		mostrarMonitores(valorBuscar,1,10);
	});
	$("#searchProyectores").submit(function(e){
		e.preventDefault();

		$("#fechainicio").val($("#fecinicio").val());
		$("#fechafin").val($("#fecfin").val());
		$("#searchfecha").val($("#checkRange").val());
		$("#search").val($("#busqueda").val());
		valorBuscar = $("#search").val();
		mostrarProyectores(valorBuscar,1,10);
	});

	$("#searchTablets").submit(function(e){
		e.preventDefault();

		$("#fechainicio").val($("#fecinicio").val());
		$("#fechafin").val($("#fecfin").val());
		$("#searchfecha").val($("#checkRange").val());
		$("#search").val($("#busqueda").val());
		valorBuscar = $("#search").val();
		mostrarTablets(valorBuscar,1,10);
	});
	$("#searchLectores").submit(function(e){
		e.preventDefault();

		$("#fechainicio").val($("#fecinicio").val());
		$("#fechafin").val($("#fecfin").val());
		$("#searchfecha").val($("#checkRange").val());
		$("#search").val($("#busqueda").val());
		valorBuscar = $("#search").val();
		mostrarLectores(valorBuscar,1,10);
	});

	$("#searchComputadoras").submit(function(e){
		e.preventDefault();

		$("#fechainicio").val($("#fecinicio").val());
		$("#fechafin").val($("#fecfin").val());
		$("#searchfecha").val($("#checkRange").val());
		$("#search").val($("#busqueda").val());
		valorBuscar = $("#search").val();
		mostrarComputadoras(valorBuscar,1,10);
	});

	/*
	$("input[name=busqueda]").keyup(function(){
		textobuscar = $(this).val();
		valoroption = $("#cantidad").val();
		mostrarComputadoras(textobuscar,1,10);
	});
*/
	$("body").on("click",".paginacionComp li a",function(e){
		e.preventDefault();
		valorhref = $(this).attr("href");
		valorBuscar = $("#search").val();
		valoroption = $("#cantidad").val();
		mostrarComputadoras(valorBuscar,valorhref,10);
	});
	$("body").on("click",".paginacionImp li a",function(e){
		e.preventDefault();
		valorhref = $(this).attr("href");
		valorBuscar = $("#search").val();
		valoroption = $("#cantidad").val();
		mostrarImpresoras(valorBuscar,valorhref,10);
	});
	$("body").on("click",".paginacionTab li a",function(e){
		e.preventDefault();
		valorhref = $(this).attr("href");
		valorBuscar = $("#search").val();
		valoroption = $("#cantidad").val();
		mostrarTablets(valorBuscar,valorhref,10);
	});
	$("body").on("click",".paginacionPro li a",function(e){
		e.preventDefault();
		valorhref = $(this).attr("href");
		valorBuscar = $("#search").val();
		valoroption = $("#cantidad").val();
		mostrarProyectores(valorBuscar,valorhref,10);
	});
	$("body").on("click",".paginacionLec li a",function(e){
		e.preventDefault();
		valorhref = $(this).attr("href");
		valorBuscar = $("#search").val();
		valoroption = $("#cantidad").val();
		mostrarLectores(valorBuscar,valorhref,10);
	});

	$("#cantidad").change(function(){
		valoroption = $(this).val();
		valorBuscar = $("#search").val();
		mostrarComputadoras(valorBuscar,1,10);
	});

});


function mostrarComputadoras(valorBuscar,pagina,cantidad){
	fecinicio = $("#fechainicio").val();
	fecfin = $("#fechafin").val();
	checkfecha = $("#searchfecha").val();

	$.ajax({
		url : base_url + "reportes/computadoras/searchComputadoras",
		type: "POST",
		data: {buscar:valorBuscar,nropagina:pagina,cantidad:cantidad,checkfecha:checkfecha,fecfin:fecfin,fecinicio:fecinicio},
		dataType:"json",
		success:function(response){
			
			filas = "";
			$.each(response.computadoras,function(key,item){
				filas +="<tr>"
				filas +="<td>"+item.codigo+"</td>";
				filas +="<td>"+item.finca+"</td>";
				filas +="<td>"+item.area+"</td>";
				filas +="<td>"+item.velocidad+"</td>";
				filas +="<td>"+item.disco+"</td>";
				filas +="<td>"+item.monitor+"</td>";
				filas +="<td>"+item.memoria+"</td>";
				filas +="<td>"+item.serial_so+"</td>";
				filas +="<td>"+item.nombres+"</td>";
				if (item.estado == 1) {
					status = "Activo";
				}else{
					status = "Inactivo";
				}
				filas +="<td>"+status+"</td>";
				filas +="<td>"+item.fecregistro+"</td>";
				filas +='<td><button type="button" class="btn btn-primary btn-flat btn-view" data-toggle="modal" data-target="#modal-default" value="'+item.id+'" title="Ver">'+
                  '<span class="fa fa-eye"></span></button></td>';
				filas +="</tr>";
			});

			$("#tbcomputadoras tbody").html(filas);
			linkseleccionado = Number(pagina);
			//total registros
			totalregistros = response.totalregistros;
			//cantidad de registros por pagina
			cantidadregistros = response.cantidad;

			numerolinks = Math.ceil(totalregistros/cantidadregistros);
			paginador = "<ul class='pagination'>";
			if(linkseleccionado>1)
			{
				paginador+="<li><a href='1'>&laquo;</a></li>";
				paginador+="<li><a href='"+(linkseleccionado-1)+"' '>&lsaquo;</a></li>";

			}
			else
			{
				paginador+="<li class='disabled'><a href='#'>&laquo;</a></li>";
				paginador+="<li class='disabled'><a href='#'>&lsaquo;</a></li>";
			}
			//muestro de los enlaces 
			//cantidad de link hacia atras y adelante
 			cant = 5;
 			//inicio de donde se va a mostrar los links
			pagInicio = (linkseleccionado > cant) ? (linkseleccionado - cant) : 1;
			//condicion en la cual establecemos el fin de los links
			if (numerolinks > cant)
			{
				//conocer los links que hay entre el seleccionado y el final
				pagRestantes = numerolinks - linkseleccionado;
				//defino el fin de los links
				pagFin = (pagRestantes > cant) ? (linkseleccionado + cant) :numerolinks;
			}
			else 
			{
				pagFin = numerolinks;
			}

			for (var i = pagInicio; i <= pagFin; i++) {
				if (i == linkseleccionado)
					paginador +="<li class='active'><a href='javascript:void(0)'>"+i+"</a></li>";
				else
					paginador +="<li><a href='"+i+"'>"+i+"</a></li>";
			}
			//condicion para mostrar el boton sigueinte y ultimo
			if(linkseleccionado<numerolinks)
			{
				paginador+="<li><a href='"+(linkseleccionado+1)+"' >&rsaquo;</a></li>";
				paginador+="<li><a href='"+numerolinks+"'>&raquo;</a></li>";

			}
			else
			{
				paginador+="<li class='disabled'><a href='#'>&rsaquo;</a></li>";
				paginador+="<li class='disabled'><a href='#'>&raquo;</a></li>";
			}
			
			paginador +="</ul>";
			$(".paginacionComp").html(paginador);

		}
	});
}

function mostrarImpresoras(valorBuscar,pagina,cantidad){
	fecinicio = $("#fechainicio").val();
	fecfin = $("#fechafin").val();
	checkfecha = $("#searchfecha").val();

	$.ajax({
		url : base_url + "reportes/impresoras/searchImpresoras",
		type: "POST",
		data: {buscar:valorBuscar,nropagina:pagina,cantidad:cantidad,checkfecha:checkfecha,fecfin:fecfin,fecinicio:fecinicio},
		dataType:"json",
		success:function(response){
			
			filas = "";
			$.each(response.impresoras,function(key,item){
				filas +="<tr>"
				filas +="<td>"+item.codigo+"</td>";
				filas +="<td>"+item.finca+"</td>";
				filas +="<td>"+item.area+"</td>";
				filas +="<td>"+item.bitacora+"</td>";
		
				
				filas +="<td>"+item.nombres+"</td>";
				if (item.estado == 1) {
					status = "Activo";
				}else{
					status = "Inactivo";
				}
				filas +="<td>"+status+"</td>";
				filas +="<td>"+item.fecregistro+"</td>";
				filas +='<td><button type="button" class="btn btn-primary btn-flat btn-view" data-toggle="modal" data-target="#modal-default" value="'+item.id+'" title="Ver">'+
                  '<span class="fa fa-eye"></span></button></td>';
				filas +="</tr>";
			});

			$("#tbimpresoras tbody").html(filas);
			linkseleccionado = Number(pagina);
			//total registros
			totalregistros = response.totalregistros;
			//cantidad de registros por pagina
			cantidadregistros = response.cantidad;

			numerolinks = Math.ceil(totalregistros/cantidadregistros);
			paginador = "<ul class='pagination'>";
			if(linkseleccionado>1)
			{
				paginador+="<li><a href='1'>&laquo;</a></li>";
				paginador+="<li><a href='"+(linkseleccionado-1)+"' '>&lsaquo;</a></li>";

			}
			else
			{
				paginador+="<li class='disabled'><a href='#'>&laquo;</a></li>";
				paginador+="<li class='disabled'><a href='#'>&lsaquo;</a></li>";
			}
			//muestro de los enlaces 
			//cantidad de link hacia atras y adelante
 			cant = 5;
 			//inicio de donde se va a mostrar los links
			pagInicio = (linkseleccionado > cant) ? (linkseleccionado - cant) : 1;
			//condicion en la cual establecemos el fin de los links
			if (numerolinks > cant)
			{
				//conocer los links que hay entre el seleccionado y el final
				pagRestantes = numerolinks - linkseleccionado;
				//defino el fin de los links
				pagFin = (pagRestantes > cant) ? (linkseleccionado + cant) :numerolinks;
			}
			else 
			{
				pagFin = numerolinks;
			}

			for (var i = pagInicio; i <= pagFin; i++) {
				if (i == linkseleccionado)
					paginador +="<li class='active'><a href='javascript:void(0)'>"+i+"</a></li>";
				else
					paginador +="<li><a href='"+i+"'>"+i+"</a></li>";
			}
			//condicion para mostrar el boton sigueinte y ultimo
			if(linkseleccionado<numerolinks)
			{
				paginador+="<li><a href='"+(linkseleccionado+1)+"' >&rsaquo;</a></li>";
				paginador+="<li><a href='"+numerolinks+"'>&raquo;</a></li>";

			}
			else
			{
				paginador+="<li class='disabled'><a href='#'>&rsaquo;</a></li>";
				paginador+="<li class='disabled'><a href='#'>&raquo;</a></li>";
			}
			
			paginador +="</ul>";
			$(".paginacionImp").html(paginador);

		}
	});
}

function mostrarMonitores(valorBuscar,pagina,cantidad){
	fecinicio = $("#fechainicio").val();
	fecfin = $("#fechafin").val();
	checkfecha = $("#searchfecha").val();

	$.ajax({
		url : base_url + "reportes/monitores/search",
		type: "POST",
		data: {buscar:valorBuscar,nropagina:pagina,cantidad:cantidad,checkfecha:checkfecha,fecfin:fecfin,fecinicio:fecinicio},
		dataType:"json",
		success:function(response){
			
			filas = "";
			$.each(response.monitores,function(key,item){
				filas +="<tr>"
				filas +="<td>"+item.codigo+"</td>";
				filas +="<td>"+item.tamaño+"</td>";
				filas +="<td>"+item.finca+"</td>";
				filas +="<td>"+item.area+"</td>";
				filas +="<td>"+item.bitacora+"</td>";
		
				
				filas +="<td>"+item.nombres+"</td>";
				if (item.estado == 1) {
					status = "Activo";
				}else{
					status = "Inactivo";
				}
				filas +="<td>"+status+"</td>";
				filas +="<td>"+item.fecregistro+"</td>";
				filas +='<td><button type="button" class="btn btn-primary btn-flat btn-view" data-toggle="modal" data-target="#modal-default" value="'+item.id+'" title="Ver">'+
                  '<span class="fa fa-eye"></span></button></td>';
				filas +="</tr>";
			});

			$("#tbmonitores tbody").html(filas);
			linkseleccionado = Number(pagina);
			//total registros
			totalregistros = response.totalregistros;
			//cantidad de registros por pagina
			cantidadregistros = response.cantidad;

			numerolinks = Math.ceil(totalregistros/cantidadregistros);
			paginador = "<ul class='pagination'>";
			if(linkseleccionado>1)
			{
				paginador+="<li><a href='1'>&laquo;</a></li>";
				paginador+="<li><a href='"+(linkseleccionado-1)+"' '>&lsaquo;</a></li>";

			}
			else
			{
				paginador+="<li class='disabled'><a href='#'>&laquo;</a></li>";
				paginador+="<li class='disabled'><a href='#'>&lsaquo;</a></li>";
			}
			//muestro de los enlaces 
			//cantidad de link hacia atras y adelante
 			cant = 5;
 			//inicio de donde se va a mostrar los links
			pagInicio = (linkseleccionado > cant) ? (linkseleccionado - cant) : 1;
			//condicion en la cual establecemos el fin de los links
			if (numerolinks > cant)
			{
				//conocer los links que hay entre el seleccionado y el final
				pagRestantes = numerolinks - linkseleccionado;
				//defino el fin de los links
				pagFin = (pagRestantes > cant) ? (linkseleccionado + cant) :numerolinks;
			}
			else 
			{
				pagFin = numerolinks;
			}

			for (var i = pagInicio; i <= pagFin; i++) {
				if (i == linkseleccionado)
					paginador +="<li class='active'><a href='javascript:void(0)'>"+i+"</a></li>";
				else
					paginador +="<li><a href='"+i+"'>"+i+"</a></li>";
			}
			//condicion para mostrar el boton sigueinte y ultimo
			if(linkseleccionado<numerolinks)
			{
				paginador+="<li><a href='"+(linkseleccionado+1)+"' >&rsaquo;</a></li>";
				paginador+="<li><a href='"+numerolinks+"'>&raquo;</a></li>";

			}
			else
			{
				paginador+="<li class='disabled'><a href='#'>&rsaquo;</a></li>";
				paginador+="<li class='disabled'><a href='#'>&raquo;</a></li>";
			}
			
			paginador +="</ul>";
			$(".paginacionMon").html(paginador);

		}
	});
}
function mostrarProyectores(valorBuscar,pagina,cantidad){
	fecinicio = $("#fechainicio").val();
	fecfin = $("#fechafin").val();
	checkfecha = $("#searchfecha").val();

	$.ajax({
		url : base_url + "reportes/proyectores/search",
		type: "POST",
		data: {buscar:valorBuscar,nropagina:pagina,cantidad:cantidad,checkfecha:checkfecha,fecfin:fecfin,fecinicio:fecinicio},
		dataType:"json",
		success:function(response){
			
			filas = "";
			$.each(response.proyectores,function(key,item){
				filas +="<tr>"
				filas +="<td>"+item.codigo+"</td>";
				filas +="<td>"+item.fabricante+"</td>";
				filas +="<td>"+item.modelo+"</td>";
				filas +="<td>"+item.descripcion+"</td>";
		
				
				filas +="<td>"+item.nombres+"</td>";
				if (item.estado == 1) {
					status = "Activo";
				}else{
					status = "Inactivo";
				}
				filas +="<td>"+status+"</td>";
				filas +="<td>"+item.fecregistro+"</td>";
				filas +='<td><button type="button" class="btn btn-primary btn-flat btn-view" data-toggle="modal" data-target="#modal-default" value="'+item.id+'" title="Ver">'+
                  '<span class="fa fa-eye"></span></button></td>';
				filas +="</tr>";
			});

			$("#tbproyectores tbody").html(filas);
			linkseleccionado = Number(pagina);
			//total registros
			totalregistros = response.totalregistros;
			//cantidad de registros por pagina
			cantidadregistros = response.cantidad;

			numerolinks = Math.ceil(totalregistros/cantidadregistros);
			paginador = "<ul class='pagination'>";
			if(linkseleccionado>1)
			{
				paginador+="<li><a href='1'>&laquo;</a></li>";
				paginador+="<li><a href='"+(linkseleccionado-1)+"' '>&lsaquo;</a></li>";

			}
			else
			{
				paginador+="<li class='disabled'><a href='#'>&laquo;</a></li>";
				paginador+="<li class='disabled'><a href='#'>&lsaquo;</a></li>";
			}
			//muestro de los enlaces 
			//cantidad de link hacia atras y adelante
 			cant = 5;
 			//inicio de donde se va a mostrar los links
			pagInicio = (linkseleccionado > cant) ? (linkseleccionado - cant) : 1;
			//condicion en la cual establecemos el fin de los links
			if (numerolinks > cant)
			{
				//conocer los links que hay entre el seleccionado y el final
				pagRestantes = numerolinks - linkseleccionado;
				//defino el fin de los links
				pagFin = (pagRestantes > cant) ? (linkseleccionado + cant) :numerolinks;
			}
			else 
			{
				pagFin = numerolinks;
			}

			for (var i = pagInicio; i <= pagFin; i++) {
				if (i == linkseleccionado)
					paginador +="<li class='active'><a href='javascript:void(0)'>"+i+"</a></li>";
				else
					paginador +="<li><a href='"+i+"'>"+i+"</a></li>";
			}
			//condicion para mostrar el boton sigueinte y ultimo
			if(linkseleccionado<numerolinks)
			{
				paginador+="<li><a href='"+(linkseleccionado+1)+"' >&rsaquo;</a></li>";
				paginador+="<li><a href='"+numerolinks+"'>&raquo;</a></li>";

			}
			else
			{
				paginador+="<li class='disabled'><a href='#'>&rsaquo;</a></li>";
				paginador+="<li class='disabled'><a href='#'>&raquo;</a></li>";
			}
			
			paginador +="</ul>";
			$(".paginacionPro").html(paginador);

		}
	});
}
function mostrarTablets(valorBuscar,pagina,cantidad){
	fecinicio = $("#fechainicio").val();
	fecfin = $("#fechafin").val();
	checkfecha = $("#searchfecha").val();

	$.ajax({
		url : base_url + "reportes/tablets/search",
		type: "POST",
		data: {buscar:valorBuscar,nropagina:pagina,cantidad:cantidad,checkfecha:checkfecha,fecfin:fecfin,fecinicio:fecinicio},
		dataType:"json",
		success:function(response){
			
			filas = "";
			$.each(response.tablets,function(key,item){
				filas +="<tr>"
				filas +="<td>"+item.codigo+"</td>";
				filas +="<td>"+item.fabricante+"</td>";
				filas +="<td>"+item.modelo+"</td>";
				filas +="<td>"+item.descripcion+"</td>";
		
				
				filas +="<td>"+item.nombres+"</td>";
				if (item.estado == 1) {
					status = "Activo";
				}else{
					status = "Inactivo";
				}
				filas +="<td>"+status+"</td>";
				filas +="<td>"+item.fecregistro+"</td>";
				filas +='<td><button type="button" class="btn btn-primary btn-flat btn-view" data-toggle="modal" data-target="#modal-default" value="'+item.id+'" title="Ver">'+
                  '<span class="fa fa-eye"></span></button></td>';
				filas +="</tr>";
			});

			$("#tbtablets tbody").html(filas);
			linkseleccionado = Number(pagina);
			//total registros
			totalregistros = response.totalregistros;
			//cantidad de registros por pagina
			cantidadregistros = response.cantidad;

			numerolinks = Math.ceil(totalregistros/cantidadregistros);
			paginador = "<ul class='pagination'>";
			if(linkseleccionado>1)
			{
				paginador+="<li><a href='1'>&laquo;</a></li>";
				paginador+="<li><a href='"+(linkseleccionado-1)+"' '>&lsaquo;</a></li>";

			}
			else
			{
				paginador+="<li class='disabled'><a href='#'>&laquo;</a></li>";
				paginador+="<li class='disabled'><a href='#'>&lsaquo;</a></li>";
			}
			//muestro de los enlaces 
			//cantidad de link hacia atras y adelante
 			cant = 5;
 			//inicio de donde se va a mostrar los links
			pagInicio = (linkseleccionado > cant) ? (linkseleccionado - cant) : 1;
			//condicion en la cual establecemos el fin de los links
			if (numerolinks > cant)
			{
				//conocer los links que hay entre el seleccionado y el final
				pagRestantes = numerolinks - linkseleccionado;
				//defino el fin de los links
				pagFin = (pagRestantes > cant) ? (linkseleccionado + cant) :numerolinks;
			}
			else 
			{
				pagFin = numerolinks;
			}

			for (var i = pagInicio; i <= pagFin; i++) {
				if (i == linkseleccionado)
					paginador +="<li class='active'><a href='javascript:void(0)'>"+i+"</a></li>";
				else
					paginador +="<li><a href='"+i+"'>"+i+"</a></li>";
			}
			//condicion para mostrar el boton sigueinte y ultimo
			if(linkseleccionado<numerolinks)
			{
				paginador+="<li><a href='"+(linkseleccionado+1)+"' >&rsaquo;</a></li>";
				paginador+="<li><a href='"+numerolinks+"'>&raquo;</a></li>";

			}
			else
			{
				paginador+="<li class='disabled'><a href='#'>&rsaquo;</a></li>";
				paginador+="<li class='disabled'><a href='#'>&raquo;</a></li>";
			}
			
			paginador +="</ul>";
			$(".paginacionTab").html(paginador);

		}
	});
}

function mostrarLectores(valorBuscar,pagina,cantidad){
	fecinicio = $("#fechainicio").val();
	fecfin = $("#fechafin").val();
	checkfecha = $("#searchfecha").val();

	$.ajax({
		url : base_url + "reportes/lectores/search",
		type: "POST",
		data: {buscar:valorBuscar,nropagina:pagina,cantidad:cantidad,checkfecha:checkfecha,fecfin:fecfin,fecinicio:fecinicio},
		dataType:"json",
		success:function(response){
			
			filas = "";
			$.each(response.lectores,function(key,item){
				filas +="<tr>"
				filas +="<td>"+item.codigo+"</td>";
				filas +="<td>"+item.fabricante+"</td>";
				filas +="<td>"+item.modelo+"</td>";
				filas +="<td>"+item.descripcion+"</td>";
		
				
				filas +="<td>"+item.nombres+"</td>";
				if (item.estado == 1) {
					status = "Activo";
				}else{
					status = "Inactivo";
				}
				filas +="<td>"+status+"</td>";
				filas +="<td>"+item.fecregistro+"</td>";
				filas +='<td><button type="button" class="btn btn-primary btn-flat btn-view" data-toggle="modal" data-target="#modal-default" value="'+item.id+'" title="Ver">'+
                  '<span class="fa fa-eye"></span></button></td>';
				filas +="</tr>";
			});

			$("#tblectores tbody").html(filas);
			linkseleccionado = Number(pagina);
			//total registros
			totalregistros = response.totalregistros;
			//cantidad de registros por pagina
			cantidadregistros = response.cantidad;

			numerolinks = Math.ceil(totalregistros/cantidadregistros);
			paginador = "<ul class='pagination'>";
			if(linkseleccionado>1)
			{
				paginador+="<li><a href='1'>&laquo;</a></li>";
				paginador+="<li><a href='"+(linkseleccionado-1)+"' '>&lsaquo;</a></li>";

			}
			else
			{
				paginador+="<li class='disabled'><a href='#'>&laquo;</a></li>";
				paginador+="<li class='disabled'><a href='#'>&lsaquo;</a></li>";
			}
			//muestro de los enlaces 
			//cantidad de link hacia atras y adelante
 			cant = 5;
 			//inicio de donde se va a mostrar los links
			pagInicio = (linkseleccionado > cant) ? (linkseleccionado - cant) : 1;
			//condicion en la cual establecemos el fin de los links
			if (numerolinks > cant)
			{
				//conocer los links que hay entre el seleccionado y el final
				pagRestantes = numerolinks - linkseleccionado;
				//defino el fin de los links
				pagFin = (pagRestantes > cant) ? (linkseleccionado + cant) :numerolinks;
			}
			else 
			{
				pagFin = numerolinks;
			}

			for (var i = pagInicio; i <= pagFin; i++) {
				if (i == linkseleccionado)
					paginador +="<li class='active'><a href='javascript:void(0)'>"+i+"</a></li>";
				else
					paginador +="<li><a href='"+i+"'>"+i+"</a></li>";
			}
			//condicion para mostrar el boton sigueinte y ultimo
			if(linkseleccionado<numerolinks)
			{
				paginador+="<li><a href='"+(linkseleccionado+1)+"' >&rsaquo;</a></li>";
				paginador+="<li><a href='"+numerolinks+"'>&raquo;</a></li>";

			}
			else
			{
				paginador+="<li class='disabled'><a href='#'>&rsaquo;</a></li>";
				paginador+="<li class='disabled'><a href='#'>&raquo;</a></li>";
			}
			
			paginador +="</ul>";
			$(".paginacionLec").html(paginador);

		}
	});
}