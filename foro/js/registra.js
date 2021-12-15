function registra() {
	let usuario = {};

	usuario.nom = document.getElementById("nom").value;
	usuario.ape = document.getElementById("ape").value;
	usuario.ema = document.getElementById("ema").value;
	usuario.usu = document.getElementById("usu").value;
	usuario.pas = document.getElementById("pas").value;

	if(usuario.usu != "" && usuario.pas != "" && usuario.ema != ""){
		regAjax(usuario);
	}else{
		window.location.replace("errorRegistro.html");
	}
}

function regAjax(u) {
	const llamada = new XMLHttpRequest();

	//**********************************************
	//recibir la respuesta
	llamada.onload = function() {

    	let resp = JSON.parse(this.responseText);

    	if(resp){
    		document.getElementById("salida").innerHTML="Usuario registrado";
    	}else{
    		window.location.replace("errorRegistro.html");
    	}

    }
	//**********************************************

	//**********************************************

	//construir la consulta
	llamada.open("POST", "registrousuarioAjax.php", true);
	llamada.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//ejecutar la consulta
  	llamada.send("usuario="+JSON.stringify(u));
	//**********************************************	
}