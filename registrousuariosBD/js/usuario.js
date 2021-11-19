const llamada = new XMLHttpRequest();

function registrar (){
	let registro ={};

	registro.nombre = document.getElementById("nom").value;
	registro.apellido = document.getElementById("ape").value;
	registro.correo = document.getElementById("cor").value;
	registro.usuario = document.getElementById("usu").value;
	registro.contrasena = document.getElementById("passw").value;

	if((registro.usuario != "") && (registro.contrasena != "") && (registro.correo != "")){

		ajax(registro);

	}else{
		window.location.replace("error.html");
	}
}
function login (){
	let login ={};

	login.usuario = document.getElementById("usu").value;
	login.contrasena = document.getElementById("passw").value;

	ajax(login);
}
function ajax (u){
	console.log(u);
	console.log(u.usuario);
	if (!(u.usuario=="") && !(u.contrasena=="")) {
	console.log("estas dentro")
		llamada.onload=function(){
			alert(this.responseText);
			//let resp = JSON.parse(this.responseText);

			//if(resp){
			//	document.getElementById("salida").innerHTML="usuario registrado";
			//}else{
			//	window.location.replace("errorRegistro.html");
			//}
		}

		llamada.open("POST", "registrousuarios.php?" , true);

		llamada.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		
  		llamada.send("usu="+JSON.stringify(u));

	}else{
		window.location.replace("error.html")
	}

}