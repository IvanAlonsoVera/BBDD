function registraTema() {

	let salida = prompt("¿Estas seguro de crear el tema? (S/N)");

	if(salida=="S"){

		let tema = [];
		tema.push(document.getElementById("titulo").value);
		tema.push(document.getElementById("texto").value);
		tema.push(document.getElementById("cate").value);
	    
		const llamada = new XMLHttpRequest();

		//**********************************************
		//recibir la respuesta
		llamada.onload = function() {
			let resp = JSON.parse(this.responseText);
	    	if (resp[0]){
	    		
		    	let con = document.getElementById("contenedorTemas");

		    	let ctn = document.createElement("div");
		    	ctn.setAttribute("class","mt-3 card border-dark");

		    	let img = document.createElement("img");
		    	img.setAttribute("class","card-img-top");
		    	img.setAttribute("src","imagenes/prueba.jpg");

		    	let tit = document.createElement("div");
		    	tit.setAttribute("class","card-header");
		    	let titulo = document.createTextNode(tema[0]);
		    	
		    	
		    	let tex = document.createElement("div");
		    	tex.setAttribute("class","card-body");
		    	let texto = document.createTextNode(tema[1]);

		    	let btn = document.createElement("a");
		    	btn.setAttribute("class","btn btn-primary");
		    	btn.setAttribute("href","borraTema.php?id="+resp[1]+"&cate="+tema[2]);
		    	let boton = document.createTextNode("borrar");

		    	con.prepend(ctn);
		    	ctn.appendChild(img);
		    	ctn.appendChild(tit);
		    	ctn.appendChild(tex);
		    	ctn.appendChild(btn);
		    	tit.appendChild(titulo);
		    	tex.appendChild(texto);
		    	btn.appendChild(boton);


	    	}else{
	    		alert ("error");
	    	}

	    }
		//**********************************************

		//**********************************************

		//construir la consulta
		llamada.open("POST", "registraTema.php", true);
		llamada.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		//ejecutar la consulta
	  	llamada.send("tema="+JSON.stringify(tema));
		//**********************************************
	}
}