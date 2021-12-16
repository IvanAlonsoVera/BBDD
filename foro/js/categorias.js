function creaCategoria() {

	let nombre=document.getElementById('tituloCat').value;
	let descrip = document.getElementById('descCat').value;	

	if(id==-1){
		let tabla = document.getElementById("tabCat");
		let fila = document.createElement("tr");
		let celda = document.createElement("td");
		let texto = document.createTextNode(nombre+" "+descrip);

		celda.appendChild(texto);

		fila.appendChild(celda);

		tabla.appendChild(fila);
	}
	
}
function insertaCategoria(nom, desc) {
	const llamada = new XMLHttpRequest();

	llamada.onload = function(){
		return (this.responseText);
	}

	llamada.open("GET", "creaCategoria.php?nombre"+nom+"&descrip="+desc,true);
}