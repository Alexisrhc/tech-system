@extends('layouts.appAdmin')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="card shadow">
            <div class="card-body pt-0 pt-md-4">
            	<h3 class="mb-4">{{ ucwords('datos del cliente:') }}</h3>
            	<div class="row mb-2">
            		{{-- DOCUMENTO DE IDENTIDAD --}}
					<div class="col-sm-12 col-md-12 col-xl-4 text-center">
						<label class="small">
							{{ ucwords('documento de identidad:') }}
						</label>
	            		<div class="input-group mb-3">
		            		<div class="input-group-prepend">
		            			<select class="form-control form-control-sm" name="type_document" id="type_document">
									<option selected value="V-">V-</option>
									<option value="E-">E-</option>
									<option value="J-">J-</option>
								</select>
		            		</div>
		            		<input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="text-center form-control @error('document') is-invalid @enderror form-control-sm" id="document" name="document" value="{{ old('document') }}" placeholder="00000000">
			            </div>
			        </div>
					{{-- APELLIDO --}}
					<div class="col-sm-12 col-md-12 col-xl-4 text-center">
						<label class="small">
							{{ ucwords('apellido(s):') }}
						</label>
						<div class="input-group input-group-alternative">
							<input type="text" readonly class="form-control-plaintext text-center form-control-sm" id="lastname" name="lastname" value="{{ old('lastname') }}">
						</div>
					</div>
					{{-- NOMBRE --}}
					<div class="col-sm-12 col-md-12 col-xl-4 text-center">
						<label class="small">
							{{ ucwords('nombre(s):') }}
						</label>
						<div class="input-group input-group-alternative">
							<input type="text" readonly class="form-control-plaintext text-center form-control-sm" id="name" name="name" value="{{ old('name') }}">
						</div>
					</div>
				</div>
				<div class="row">
					{{-- NOMBRE --}}
					<div class="col-sm-12 col-md-12 col-xl-4 text-center">
						<label class="small">
							{{ ucwords('telefono:') }}
						</label>
						<div class="input-group input-group-alternative">
							<input type="text" readonly class="form-control-plaintext text-center form-control-sm" id="phone" name="phone" value="{{ old('phone') }}">
						</div>
					</div>
					{{-- DIRECCION --}}
					<div class="col-sm-12 col-md-12 col-xl-8 text-center">
						<label class="small">
							{{ ucwords('dirección:') }}
						</label>
						<div class="input-group input-group-alternative">
							<input type="text" readonly class="form-control-plaintext text-center form-control-sm" id="address" name="address" value="{{ old('address') }}">
						</div>
					</div>
				</div>
            </div>
            <div class="card-body pt-0 pt-md-4" id="services">
            	<div style="display: block;">
            		<h3 class="mb-4">{{ ucwords('Sistema:') }}</h3>
            		<div class="col-12">
            			<div class="form-group row">
            				<label for="business_name" class="col-sm-3 col-form-label col-form-label-sm">
            					{{ ucwords('Tienda:') }}
							</label>
							<div class="col-sm-9">
								<div class="input-group input-group-alternative">
									<select class="form-control form-control-sm" name="id_store" id="id_store">
									</select>
								</div>
							</div>
						</div>
					</div>
            		<div class="col-12">
            			<div class="form-group row">
            				<label for="business_name" class="col-sm-3 col-form-label col-form-label-sm">
            					{{ ucwords('Vendedor:') }}
							</label>
							<div class="col-sm-9">
								<div class="input-group input-group-alternative">
									<select class="form-control form-control-sm" name="id_seller" id="id_seller">
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12">
            			<div class="form-group row">
            				<label for="business_name" class="col-sm-3 col-form-label col-form-label-sm">
            					{{ ucwords('Instalador:') }}
							</label>
							<div class="col-sm-9">
								<div class="input-group input-group-alternative">
									<select class="form-control form-control-sm" name="id_technical" id="id_technical">
									</select>
								</div>
							</div>
						</div>
					</div>
            	</div>
			</div>
            <div class="card-body pt-0 pt-md-4">
            	{{-- <h3 class="mb-4">{{ ucwords('datos de producto:') }}</h3> --}}
            	<div class="row mb-2 justify-content-end">
			        <div class="col-sm-12 col-md-12 col-xl-3 text-center searchProduct">
			        	<label class="small">
							{{ ucwords('buscar productos:') }}
						</label>
	            		<div class="input-group mb-3">
	            			<button class="btn btn-info btn-sm w-100" data-toggle="modal" data-target=".bd-example-modal-lg" type="button" id="click">
	            				<i class="fas fa-search"></i>
	            			</button>
			            </div>
			        </div>
            	</div>
            	{{-- DESCRIPCION DE LA FACTURA --}}
            	<div class="row mb-2">
            		<div class="col-sm-12 col-md-12 col-xl-12 text-center table-responsive">
            			<table class="table align-items-center table-flush" id="table-product-details">
            			</table>
			        </div>
            	</div>
            </div>
            <div class="card-footer pt-3 text-right">
            	<button type="button" class="btn btn-sm btn-danger" id="cancel_bill">Cancelar</button>
            	<button type="button" class="btn btn-success btn-sm" id="process_bill">Procesar</button>
            </div>
          </div>
        </div>
    </div>
    <input type="hidden" id="id_seller" value="{{ Auth::user()->id }}">
    <input type="hidden" id="id_bill_temporal" value="">
    <input type="hidden" id="id_client" value="">
    {{-- @if(Session::has('store'))
    	<input type="hidden" id="id_store" value="{{ Session::get('store')[0]->id_store }}">
    @endif --}}
    {{-- modal --}}

	<div class="modal fade bd-example-modal-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
		    <div class="modal-content">
		    	<div class="modal-header">
		    		<h4 class="modal-title">Lista de productos</h4>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			    </div>
		      <div class="modal-body">
		      		<div class="row">
		      			<div class="col-sm-6 col-md-6 col-xl-6 text-center">
		      				<div class="input-group mb-3">
			            		<input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase()" id="search_product" type="text" class="text-center form-control  form-control-sm" name="code_product" placeholder="BUSQUEDA DE PRODUCTO">
			            		<div class="input-group-append">
			            			<span class="btn btn-info btn-sm"><i class="fas fa-search"></i></span>
			            		</div>
					        </div>
		      			</div>
		      			<div class="col-sm-6 col-md-6 col-xl-6 text-center">
		      				<input type="number" class="form-control col form-control-sm" id="quantity_input" value= "1" placeholder="CANTIDAD DE PRODUCTO">
		      			</div>
		      		</div>
            		<div class="col-sm-12 col-md-12 col-xl-12 text-center table-responsive">
						<table class="table align-items-center table-flush" id="table-product">
						</table>
            		</div>
		      </div>
		  	</div>
		</div>
	</div>
@endsection

@section('script')
<script type="module">
	import { common } from './js/common.js';


	$( ".searchProduct" ).hide()
	let products = []
	/**
	 * Listar productos en la tabla productos
	 */
	$( "#click" ).click(() => {
		let url = {
			url: 'listproduct/',
			data: {}
		}
		getTableProduct(url)
	})

	/*
	 * obtener tabla con productos
	 */
	function getTableProduct (url) {
		common.getData(url)
			.then(res => {
				let header = ['id_product','serial_product', 'model', 'name', 'price','quantity', 'add'];
		    	let table = common.dynamicTable(header, res, 'id_product')
		        $("#table-product").html(table)
			})
			.catch(err => {
				console.log(err)
			})
	}

	/*
	 * funcion para cancelar factura
	 */
	$( "#cancel_bill" ).click(() => {
	 	let data = {
	 		status: 'cancelled'
	 	}
	 	common.updateData(['bill-temporal', $('#id_bill_temporal').val()], data)
			.then(res => {
				getDataBill_Details()
				$('#document').val('')
				$('#id_client').val('')
				$('#name').val('')
				$('#lastname').val('')
				$('#phone').val('')
				$('#address').val('')
			})
			.catch(err => {
				console.log(err)
			})

	})

	/**
	 * obtener datos del cliente por CEDULA en el campo de cedula (enter == key(13))
	 */
	$( "#document" ).on('keypress', function(e){
		if (e.which === 13) {
		let dataUrl = {
			url: '/client/'+ $('#type_document').val()+$('#document').val(),
			type: 'get'
		}
		common.getData(dataUrl)
			.then(res => {
				if (res.length <= 0) {
					location.href = '/client/create'
				}
				$('#id_client').val(res[0].id_client)
				$('#name').val(res[0].name)
				$('#lastname').val(res[0].lastname)
				$('#phone').val(res[0].phone)
				$('#address').val(res[0].address)
				$( ".searchProduct" ).show()
				let data = {
					status: 'active',
					date: common.formatDate()
				}
				common.postData('bill-temporal', data)
					.then(res => {
						// console.log(res)
						$('#id_bill_temporal').val(res.id_bill_temporal)
						getDataBill_Details()
					})
			})
			.catch(err => {
				console.log(err)
			})
		}
	})

	/**
	 * Obtener detalle de factura
	 */
	function getDataBill_Details () {
		let dataUrl = {
			url: '/bill-details/'+ $('#id_bill_temporal').val(),
			type: 'get'
		}
		common.getData(dataUrl)
			.then(res => {
				if (res) {
					products = res
					let header = ['index','serial_product', 'model', 'name', 'price','quantity','price_total', 'delete'];
					let table = common.dynamicTable(header, res, 'id_bill_detail')
					$("#table-product-details").html(table)
				}
			})
	}

	/**
	 * buscar producto por clave o por nombre
	 */
	$(document).on('keyup', '#search_product', () => {
		let value = $('#search_product').val()
		let valueSearch = {
			name: null,
			code_product: null,
			serial_product: null,
			price: null
		}
		let url = {
			url: 'listproduct/',
			/**
			 * ESTO valueSearch ES EL KEY? esos son los parametros :o YA VEO
			 */
			data: common.paramsSearch(valueSearch, value)
		}
		setTimeout(() => {
			getTableProduct(url)
		}, 200)
	})

	/**
	 * guarda el detalles del producto al agregarlo a la factura
	 */
	$(document).on("click","#save_key", function() {
		let id_product = $(this).val()
		let quantity_input = $('#quantity_input').val()
		let data = {
			id_bill_temporal: $('#id_bill_temporal').val(),
			id_product: id_product,
			quantity: quantity_input
		}
		common.postData('bill-details', data)
			.then(res => {
				getDataBill_Details()
			})
	})

	/**
	 * Eliminar producto de la lista detalle
	 */
	$(document).on("click","#delete_key", function() {
		let id_details = $(this).val()
		common.deleteData('bill-details', id_details)
			.then(res => {
				getDataBill_Details()
			})
	})

	 /**
	 * Enviar Bill
	 */
	$(document).on("click","#process_bill", function() {
		let data = {
			id_bill_temporal: $('#id_bill_temporal').val(),
			id_user	: $('#id_seller').val(),
			id_client: $('#id_client').val(),
			id_store: $('#id_store').val(),
			id_technical: $('#id_technical').val(),
			status: 'pendind'
		}
		common.postData('bill', data)
			.then(res => {
				products.forEach(element => {
					// console.log(element)
					common.updateData(
						[
							'productQuantity',
							element['id_product']
						],
						{
							quantity: element['quantity'],
							serial_product: element['serial_product'],
							name: element['name']
						}
					)
					.then(res => {
					})

					common.updateData(
						[
							'bill-temporal',
							data.id_bill_temporal
						],
						{
							status: 'pendind',
						}
					)
					.then(res => {
					})

				})
				location.href = 'printed-invoice/'+res.id_bill_temporal
			})
	})

	/*
	 * obtener los empledos registrados en el sistema
	 */


	async function getStore() {
      let url = {
        url: 'selectStore'
      }
      let store = await common.getData(url)
      let select = common.dynamicSelect(store)
      $("#id_store").html(select)
    }
    getStore()



    async function dynamicSelectSeller() {
      let url = {
        url: 'selectSeller'
      }
      let seller = await common.getData(url)
      let select = common.dynamicSelectSeller(seller)
      $("#id_seller").html(select)
    }
    dynamicSelectSeller()


    async function getTechnical() {
      let url = {
        url: 'selectTechnical'
      }
      let Technical = await common.getData(url)
      let select = common.getTechnical(Technical)
      $("#id_technical").html(select)
    }
    getTechnical()


	getDataBill_Details()
</script>
@endsection
