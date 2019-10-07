@extends('layouts.appAdmin')
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">{{ ucwords('') }}</h3>
            </div>
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
							@error('document')
								<span class="invalid-feedback text-center" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
		            		{{-- <div class="input-group-append">
		            			<button class="btn btn-info btn-sm" id="search"><i class="fas fa-search"></i></button>
		            		</div> --}}
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
            	{{-- <div id="">
            		<button class="btn btn-sm btn-success">{{ ucwords('agregar servicios') }}</button>
            	</div> --}}
            	<div style="display: none">
	            	<h3 class="mb-4">{{ ucwords('datos de servicio:') }}</h3>
	            	<div class="row mb-2">
				        {{-- SERVICIO --}}
						<div class="col-sm-12 col-md-12 col-xl-4 text-center">
							<label class="small">
								{{ ucwords('tipo de servicio:') }}
							</label>
		            		<div class="input-group mb-3">
			            			<select class="form-control form-control-sm" name="type_document" id="type_document">
			            				<option hidden>SELECCIONE</option>
										<option value="">VENTAS</option>
										<option value="">INSTALACIÓN</option>
										<option value="">REPARACIÓN</option>
									</select>
				            </div>
				        </div>
				        {{-- TIENDA --}}
				        <div class="col-sm-12 col-md-12 col-xl-4 text-center">
							<label class="small">
								{{ ucwords('tienda:') }}
							</label>
		            		<div class="input-group mb-3">
			            			<select class="form-control form-control-sm" name="type_document" id="type_document">
			            				<option hidden>SELECCIONE</option>
										<option value="">TIENDA</option>
									</select>
				            </div>
				        </div>
				        {{-- EMPLEADO --}}
				        <div class="col-sm-12 col-md-12 col-xl-4 text-center">
							<label class="small">
								{{ ucwords('empleado:') }}
							</label>
							<div class="input-group input-group-alternative">
								<input type="text" readonly class="form-control-plaintext text-center form-control-sm" name="employee" value="{{ Auth::user()->name .' '.Auth::user()->lastname }}" >
							</div>
						</div>
					</div>
            	</div>
			</div>
            <div class="card-body pt-0 pt-md-4">
            	<h3 class="mb-4">{{ ucwords('datos de producto:') }}</h3>
            	<div class="row mb-2">
			        <div class="col-sm-12 col-md-12 col-xl-4 text-center">
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
    <input type="hidden" id="user_session" value="{{ Auth::user()->id }}">
    <input type="hidden" id="id_bill_temporal" value="">
    <input type="hidden" id="id_client" value="">
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
	/**
	 * Listar productos en la tabla productos
	 */
	$( "#click" ).click(() => {
		let dataUrl = {
			url: 'listproduct/',
			data: {}
		}
		getTableProduct(dataUrl)
	})

	/*
	 * obtener tabla con productos
	 */
	function getTableProduct (url) {
		common.getData(url)
			.then(res => {
				let header = ['id_product','serial_product', 'model', 'name', 'price', 'add'];
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
				let data = {
					status: 'pendind',
					date: common.formatDate()
				}
				common.postData('bill-temporal', data)
					.then(res => {
						console.log(res)
						$('#id_bill_temporal').val(res.id_bill_temporal)
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
	 * Description
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
			id_user	: $('#user_session').val(),
			id_client: $('#id_client').val(),
		}
		common.postData('bill', data)
			.then(res => {
				console.log('priented');
			})
	})
	getDataBill_Details()

</script>
@endsection
