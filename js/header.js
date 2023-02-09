	/** Esta variable será la lista de los elementos que van a 
	//aparecer y desaparecer. **/
	/** Voy a seleccionar a los elementos o a todos los elementos
	con la clase .list__button--click. **/
	let listElements = document.querySelectorAll('.list__button--click');

	listElements.forEach(listElement => {
		/**Cada vez que de click en uno de estos elementos 
		quiero que se ejecute una función **/
		listElement.addEventListener('click', ()=> {
			
		/** Una vez que toque al elemento, le agregará la clase arrow,
			pero la siguiente vez que lo toque se la va a quitar **/
			listElement.classList.toggle('arrow');

			let height = 0;
			let menu = listElement.nextElementSibling;
			console.log(menu);

			if (menu.clientHeight == "0") {
				height = menu.scrollHeight;
			}

			menu.style.height = `${height}px`;
		})
	});