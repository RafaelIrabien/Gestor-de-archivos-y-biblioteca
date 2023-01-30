
	window.addEventListener('DOMContentLoaded', cambiarMes);


	//Función que transforma un número al nombre del mes para aplicar estilo css
	function numAMes(numero){
		switch(parseInt(numero)){
			  case 1: return "enero";
			  case 2: return "febrero";
			  case 3: return "marzo";
			  case 4: return "abril";
			  case 5: return "mayo";
			  case 6: return "junio";
			  case 7: return "julio";
			  case 8: return "agosto";
			  case 9: return "septiembre";
			  case 10: return "octubre";
			  case 11: return "noviembre";
			  case 12: return "diciembre";
		}
	}

	function cambiarMes(){
		let fechaHoy = new Date();

		//decimos que extraiga al elemento body,
		//le asignamos una clase

		//document.getElementsByTagName("body")[0].classList.add(numAMes(fechaHoy.getMonth()+1));
		jQuery("body").addClass(numAMes(fechaHoy.getMonth()+1));

		
	}