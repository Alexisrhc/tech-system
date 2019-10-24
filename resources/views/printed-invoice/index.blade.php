@extends('layouts.appPrintedInvoice')

@section('content')
	<div class="row">
        <div class="col-md-12 text-right">
        	<a target="_blank" href="{{ route('printed', $printedinvoice->id_bill_temporal) }}" class="btn btn-sm btn-success">
        		GENERAR REPORTE DE FACTURA
        	</a>
        </div>
    </div>

    <div class="row mt-3 mb-3">
        <div class="col mb-3">
        	<div class="card shadow">
        		<div class="card-header border-0 text-center">
        			<h3 class="mb-2">Datos del Cliente</h3>
        		</div>
				<div class="col-12">
					<div class="form-group row">
						<label for="document" class="col-sm-3 col-form-label form-control-sm text-right">
							{{ ucwords('Cedula Cliente:') }}
						</label>
						<div class="col-sm-9">
							<div class="input-group input-group-alternative">
								<input type="hidden" value="{{$printedinvoice->id_bill_temporal}}" id="temporal">
								<input
								style="text-transform:uppercase;"
								onkeyup="javascript:this.value=this.value.toUpperCase();"
								type="text"
								class="form-control @error('document') is-invalid @enderror form-control-sm"
								name="document"
								value="{{ $client->document }}">
								@error('document')
									<span class="invalid-feedback text-center" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
					</div>
				</div>
				<div class="col-12">
					<div class="form-group row">
						<label for="name" class="col-sm-3 col-form-label form-control-sm text-right">
							{{ ucwords('nombre(s):') }}
						</label>
						<div class="col-sm-9">
							<div class="input-group input-group-alternative">
								<input
								style="text-transform:uppercase;"
								onkeyup="javascript:this.value=this.value.toUpperCase();"
								type="text"
								class="form-control @error('name') is-invalid @enderror form-control-sm"
								name="name"
								value="{{ $client->name }}">
								@error('name')
									<span class="invalid-feedback text-center" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
					</div>
				</div>
				<div class="col-12">
					<div class="form-group row">
						<label for="lastname" class="col-sm-3 col-form-label form-control-sm text-right">
							{{ ucwords('Apellido(s):') }}
						</label>
						<div class="col-sm-9">
							<div class="input-group input-group-alternative">
								<input
								style="text-transform:uppercase;"
								onkeyup="javascript:this.value=this.value.toUpperCase();"
								type="text"
								class="form-control @error('lastname') is-invalid @enderror form-control-sm"
								name="lastname"
								value="{{ $client->lastname }}">
								@error('lastname')
									<span class="invalid-feedback text-center" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
					</div>
				</div>
				<div class="col-12">
					<div class="form-group row">
						<label for="address" class="col-sm-3 col-form-label form-control-sm text-right">
							{{ ucwords('Dirección(s):') }}
						</label>
						<div class="col-sm-9">
							<div class="input-group input-group-alternative">
								<input
								style="text-transform:uppercase;"
								onkeyup="javascript:this.value=this.value.toUpperCase();"
								type="text"
								class="form-control @error('address') is-invalid @enderror form-control-sm"
								name="address"
								value="{{ $client->address }}">
								@error('address')
									<span class="invalid-feedback text-center" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>
					</div>
				</div>

				<div class="card-header border-0 text-center">
        			<h3 class="mb-2">Detalle de productos</h3>
        		</div>

        		<div class="col-sm-12 col-md-12 col-xl-12 text-center table-responsive">
        			<table class="table align-items-center table-flush" id="table-product-bills-details">
        			</table>
        		</div>
        		<div class="col-sm-12 col-md-12 col-xl-12 text-center table-responsive mr-4">
		    		<div class="table-responsive">
		    			<table class="table align-items-center table-flush text-rights">
							<thead class="thead-light">
								<tr>
									@for($i =0; $i <= 18; $i++)
										<th></th>
									@endfor
									<th>Precio total a cancelar</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									@for($i =0; $i <= 18; $i++)
										<td></td>
									@endfor
									<td id="total_bills">
									</td>
								</tr>
							</tbody>
			    		</table>
			        </div>
			    </div>
			</div>
		</div>
	</div>
@endsection

@section('script')
<script type="module">
	import { common } from '../js/common.js';
	function getBill () {
		let url = {
			url: '/imprimir/' + $('#temporal').val(),
			data: {
				bills: false
			}
		}
		common.getData(url)
			.then(res => {
				let header = ['index','serial_product', 'model', 'name', 'price','quantity','price_total'];
				let table = common.dynamicTable(header, res.bills, 'id_bill_detail')
				$("#table-product-bills-details").html(table)
				$("#total_bills").html(res.total)
			})
	}
	getBill()
</script>
@endsection
