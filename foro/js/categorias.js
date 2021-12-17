function creaCategoria() {

	let nombre=document.getElementById('tituloCat').value;
	let descrip = document.getElementById('descCat').value;	
	let id = insertaCategoria(nombre,descrip);
	
	
}
function insertaCategoria(nom, desc) {
	
	const llamada = new XMLHttpRequest();

	if(this.responseText!=-1){
		let tabla = document.getElementById("tabCat");
		let fila = document.createElement("tr");
		let celda = document.createElement("td");
		let texto = document.createTextNode(nom+" - "+desc);
		let enlace = document.createElement("a");

		enlace.setAttribute("href","http://foro.iva/temas.php?cate="+this.responseText);

		enlace.appendChild(texto);

		celda.appendChild(enlace);

		fila.appendChild(celda);

		tabla.appendChild(fila);
	}else{
		alert("error al crear categoria");
	}



	llamada.onload = function(){
		let res = this.responseText;
		return res;
	}

	llamada.open("GET", "crearcategoria.php?nombre="+nom+"&descrip="+desc,true);
	llamada.send();
}