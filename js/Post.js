//Creo una funcion, a la cual nombre Enviar
function Enviar()
{
	//Declaracion de variable y obtencion de datos del formulario
	var Nombre=document.getElementById('Nombre').value;
	var Asunto=document.getElementById('Asunto').value;
	var Email=document.getElementById('Email').value;
	var Mensaje=document.getElementById('Mensaje').value;
	//me traigo las variables de php en una cadena string
	var DataEn='Nombre=' +Nombre+'&Email='+Email+'&Asunto='+Asunto+'&Mensaje='+Mensaje;
	var C=/^[a-zZ-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
	//console.log(Nom+Asu+Ema+Men);
	//Validaciones:
	//si nombre  es vacio se le nootifica al usuario, que el nombre es necesario

	if(Nombre==='')
	{
		//alert("Por favor ingrese su nombre");
		//$("Mensaje1").html("escribe tu nombre");
		document.getElementById("Mensaje1").innerHTML = 'escribe tu nombre';
	}
	//si asunto es vacio se le nootifica al usuario, que el asunto es necesario
	if (Asunto==='')
	{
		//alert("Por favor escribe el asunto");
		$("Mensaje3").html("escribe el asunto");
		document.getElementById("Mensaje3").innerHTML = 'escribe el asunto';
	}
	//si email  es vacio se le nootifica al usuario, que el email es necesario
	if (Email==='')
	{
		//alert("Por favor escribe el email");
		$("Mensaje2").html("escribe el email");
		document.getElementById("Mensaje2").innerHTML = 'escribe tu email';
	}
	//si mensaje  es vacio se le nootifica al usuario, que el mensaje es necesario
	if (Mensaje==='')
	{
		//alert("Por favor escribe el Mensaje");
		$("Mensaje4").html("el mensaje es indispensable");
		document.getElementById("Mensaje4").innerHTML = 'el mensaje es indispensable';
	}

	//si no entra entar en este if:
	//recorro email para verificar que sea un correo valido
	else if (!C.test(Email))
	{
		//alert("Por favor escribe un correo real");
		$("Mensaje").html("");
		//se le nootifica al usuario, que el email debe tener un formato adecuado
		document.getElementById("Mensaje3").innerHTML = 'Por favor escribe un correo real';
	}
	//si no:
	else
	{
		//alert("Enviar datos!");
		//creo cadena
		//console.log(DataEn);
		//utilizo ajax para que no se refresque el navegador
		$.ajax({
		type:'POST',
		url:'Envia.php',
		data:DataEn,
		//creo una funcion que espera un parametro respuesta
		success:function(respuesta)
		{
			//alert("Enviar datos!");
			//la respuesta ava hacer:
			//si es igual a 1, es lo mismo decir si el email fue enviado
			if (respuesta==1)
			{
				//alert("Es cierto");
				//notifico al usuario que el correo se envio
				//alert("paso por aqiui");
				$("#Resultado").html("Enviado con exito, en breve respopnderemos a su solicitud");
			}else
			 {
				 alert("No");
			 		//notifico al usuario que el correo no se envio
			 	$("#Resultado").html("Tu mensaje no se ha podido enviar, intentalo de nuevo");
			 }
		}
	});
		return false;
	}
}
