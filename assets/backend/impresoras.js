$(document).ready(function(){
	mostrarImpresoras("",1,2);

	/*$("#file-excel").mouseover(function(){
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
    });*/

	$("#searchImpresoras").submit(function(e){
		e.preventDefault();

		$("#fechainicio").val($("#fecinicio").val());
		$("#fechafin").val($("#fecfin").val());
		$("#searchfecha").val($("#checkRange").val());
		$("#search").val($("#busqueda").val());
		valorBuscar = $("#search").val();
		mostrarImpresoras(valorBuscar,1,2);
	});

	/*
	$("input[name=busqueda]").keyup(function(){
		textobuscar = $(this).val();
		valoroption = $("#cantidad").val();
		mostrarComputadoras(textobuscar,1,2);
	});
*/
	/*$("body").on("click",".paginacion li a",function(e){
		e.preventDefault();
		valorhref = $(this).attr("href");
		valorBuscar = $("#search").val();
		valoroption = $("#cantidad").val();
		mostrarComputadoras(valorBuscar,valorhref,2);
	});*/

	/*$("#cantidad").change(function(){
		valoroption = $(this).val();
		valorBuscar = $("#search").val();
		mostrarComputadoras(valorBuscar,1,2);
	});*/

});


function mostrarImpresoras(valorBuscar,pagina,cantidad){
	fecinicio = $("#fechainicio").val();
	fecfin = $("#fechafin").val();
	checkfecha = $("#searchfecha").val();

	$.ajax({
		url : base_url + "reportes/impresoras/searchComputadoras",
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
 			cant = 2;
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
			$(".paginacion").html(paginador);

		}
	});
}