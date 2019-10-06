export const common = {
	/**
		* Tabla dinamica
		*/
	dynamicTable (header, data, key) {
		let table = '<thead class="thead-light"><tr>';
		header.forEach((tr) => {
			table += '<th scope="col">'+ this.translate(tr) +'</th>'
		})
		table += '</tr></thead><tbody>';
		data.forEach((elemet, index) => {
			table += '<tr>';
			header.forEach(value => {
				if (value === 'index') {
					table += `
						<td>
							${index + 1}
						</td>
					`;
				}
				if (elemet[value] !== undefined) {
					table += `
						<td>
							${elemet[value]}
						</td>
					`;
				}
				if (value === 'action') {
					table += `
						<td>
							<button class="btn btn-sm btn-success" value="${elemet[key]}" id="save_key">
								${this.translate('add')}
							</button>
						</td>
					`;
				}
			});
			table += '</tr>';
		});
			table += '</tbody>';

		return table;
	},
	/**
	 * Description
	 */
	getData (urlData) {
		return new Promise((resolve, reject) => {
			$.ajax(urlData)
				.done((data) => {
					resolve(data)
	        	}).fail(() => {
	        		reject({error: 'error en la peticion'})
	        	});
		})
	},
	/**
	 * Description
	 */
	postData (url, data) {
		let urlData = {
			dataType: 'json',
			type: 'Post',
			url: url,
			data: data
		}
		return new Promise((resolve, reject) => {
			$.ajax(urlData)
				.done((data) => {
					resolve(data)
	        	}).fail(() => {
	        		reject({error: 'error en la peticion'})
	        	});
		})
	},
	/**
	 * boton de la table
	  */
	buttonTabla (button) {
		let buttons = ''
		button.forEach(elemet => {
			buttons += `
				<button class="${elemet.class}"> ${elemet.name} </button>
			`
		})
	},
	/**
	 * Date
	 */
	 formatDate () {
	 	let date = `${new Date().getFullYear()}/${new Date().getMonth() + 1}/${new Date().getDate()}-${new Date().getHours()}:${new Date().getMinutes()}:${new Date().getSeconds()}`
	 	return date
	 },
	/*
	 * traductor de parametros
	 */
	translate (data) {
		let dataTrans = {
			'id_product': 'ID Producto',
			'serial_product': 'Producto Serial',
			'model': 'Modelo',
			'name': 'Nombre',
			'price': 'Precio uni',
			'price_total' : 'precio total',
			'action': 'Acción',
			'add': 'Agregar',
			'quantity_input' : 'Cantidad',
			'smart_card' : 'Smart Card',
			'description' : 'Descripción',
			'index': 'Item',
			'quantity' : 'cantidad'
		}
		return dataTrans[data]
	}
}
