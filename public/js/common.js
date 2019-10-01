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
		data.forEach(elemet => {
			table += '<tr>';
			header.forEach(value => {
				table += `
					<td>
						${(elemet[value] !== undefined) ? elemet[value] : `
							<button class="btn btn-sm btn-success" value="${elemet[key]}" id="save_key">
								${this.translate('add')}
							</button>`
						}
					</td>
				`;
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
	/*
	 * traductor de parametros
	 */
	translate (data) {
		let dataTrans = {
			'id_product': 'ID Producto',
			'serial_product': 'Producto Serial',
			'model': 'Modelo',
			'name': 'Nombre',
			'price': 'Precio',
			'action': 'Acción',
			'add': 'Agregar'
		}
		return dataTrans[data]
	}
}
