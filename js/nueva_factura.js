
$(document).ready(function(){
	load(1);
});

function load(page){

	$("#loader").fadeIn('slow');
	$.ajax({
		url:'./ajax/productos_factura.php?action=ajax',
		beforeSend: function(objeto){
			$('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
		},
		success:function(data){
			$(".outer_div").html(data).fadeIn('slow');
			$('#loader').html('');

		}
	})
}
function agregar (id)
{


	var unidades=document.getElementById('U_'+id).value;
	var paquetes=document.getElementById('P_'+id).value;

	alert('id='+id+'unidade'+unidades+' pac '+paquetes);
	if (isNaN(cantidad))
	{
		alert('Esto no es un numero');
		document.getElementById('U'+id).focus();
		return false;
	}
	if (isNaN(precio_venta))
	{
		alert('Esto no es un numero');
		document.getElementById('P_'+id).focus();
		return false;
	}

	$.ajax({
		type: "POST",
		url: "./../../../ajax/agregar_facturacion.php",
		data: "id="+id+"&paquetes="+paquetes+"&unidades="+unidades,
		beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		},
		success: function(datos){
			$("#resultados").html(datos);
		}
	});
}

function eliminar (id)
{

	$.ajax({
		type: "GET",
		url: "./ajax/agregar_facturacion.php",
		data: "id="+id,
		beforeSend: function(objeto){
			$("#resultados").html("Mensaje: Cargando...");
		},
		success: function(datos){
			$("#resultados").html(datos);
		}
	});
}

$("#datos_factura").submit(function(){
	var id_cliente = $("#id_cliente").val();
	var id_vendedor = $("#id_vendedor").val();
	var condiciones = $("#condiciones").val();

	if (id_cliente==""){
		alert("Usted Debe Seleccionar un cliente. Para crear un cliente vaya a la seccion de clientes");
		$("#nombre_cliente").focus();
		return false;
	}
	VentanaCentrada('./pdf/documentos/factura_pdf.php?id_cliente='+id_cliente+'&id_vendedor='+id_vendedor+'&condiciones='+condiciones,'Factura','','1024','768','true');
});