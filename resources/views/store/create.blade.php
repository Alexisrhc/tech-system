@extends('layouts.appAdmin')

@section('content')
    <div class="row">
		<div class="col">
	    	<div class="card shadow">
	    		<div class="card-header border-0">
        			<h2>{{ ucwords('agregar nueva tienda') }}</h2>
	    		</div>
	    		<div class="card-body pt-0 pt-md-4">
		        	<form  method="POST" action="{{ route('store.store') }}">
						@csrf
						<div class="row mb-2">
							<div class="col-12">
								<div class="form-group row">
									<label for="name" class="col-sm-2 col-form-label">
										{{ ucwords('nombre de la tienda:') }}
									</label>
									<div class="col-sm-10">
										<div class="input-group input-group-alternative">
											<input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="NOMBRE">
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
									<label for="phone" class="col-sm-2 col-form-label">
										{{ ucwords('telefono:') }}
									</label>
									<div class="col-sm-10">
										<div class="input-group input-group-alternative">
											<input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="0000-000-00-00">
											@error('phone')
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
									<label for="address" class="col-sm-2 col-form-label">
										{{ ucwords('dirección:') }}
									</label>
									<div class="col-sm-10">
										<div class="input-group input-group-alternative">
											<input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" placeholder="DIRECCION">
											@error('address')
												<span class="invalid-feedback text-center" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row mb-2">
							<div class="col-12 text-right">
								<button class="btn btn-success btn-sm">Agregar</button>
								<a class="btn btn-danger btn-sm" href="{{route('store')}}">Cancelar</a>
							</div>
						</div>
					</form>
	    		</div>
	    	</div>
		</div>
    </div>
@endsection