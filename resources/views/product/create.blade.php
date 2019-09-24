@extends('layouts.appAdmin')

@section('content')
    <div class="row">
		<div class="col">
	    	<div class="card shadow">
	    		<div class="card-header border-0">
        			<h2>{{ ucwords('agregar nuevo producto') }}</h2>
	    		</div>
	    		<div class="card-body pt-0 pt-md-4">
		        	<form  method="POST" action="{{ route('product.store') }}">
						@csrf
						<div class="row mb-4">
							<div class="col-4">
								<label for="code">Código</label>
								<div class="input-group input-group-alternative">
									<span class="input-group-text">
										<img src="{{ asset('assets/img/svg/code.svg') }}" width="18px" class="ml-2 mr-2">
									</span>
									<input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}"  placeholder="Código">

									@error('code')
										<span class="invalid-feedback text-center" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-4">
								<label for="serial">Serial</label>
								<div class="input-group input-group-alternative">
									<span class="input-group-text">
										<img src="{{ asset('assets/img/svg/code.svg') }}" width="18px" class="ml-2 mr-2">
									</span>
									<input id="serial" type="text" class="form-control @error('serial') is-invalid @enderror" name="serial" value="{{ old('serial') }}" placeholder="Serial">
									@error('serial')
										<span class="invalid-feedback text-center" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-4">
								<label for="model">Modelo</label>
								<div class="input-group input-group-alternative">
									<span class="input-group-text">
										<img src="{{ asset('assets/img/svg/code.svg') }}" width="18px" class="ml-2 mr-2">
									</span>
									<input id="model" type="text" class="form-control @error('model') is-invalid @enderror" name="model" value="{{ old('model') }}" placeholder="modelo">
									@error('model')
										<span class="invalid-feedback text-center" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
						</div>
						<div class="row mb-4">
							<div class="col-4">
								<label for="name">Nombre Del Producto</label>
								<div class="input-group input-group-alternative">
									<span class="input-group-text">
										<img src="{{ asset('assets/img/svg/single-folded.svg') }}" width="18px" class="ml-2 mr-2">
									</span>
									<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nombre del producto">

									@error('name')
										<span class="invalid-feedback text-center" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-8">
								<label for="description">Descrición Del Producto</label>
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text">
											<img src="{{ asset('assets/img/svg/single-folded.svg') }}" width="18px" class="ml-2 mr-2">
										</span>
									</div>
									<input id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" placeholder="Descripción">
									@error('description')
										<span class="invalid-feedback text-center" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
						</div>
							<div class="row mb-4">
								<div class="col-4">
									<label for="description">Cantidad Del Producto</label>
									<div class="input-group input-group-alternative">
										<div class="input-group-prepend">
											<span class="input-group-text">
												<img src="{{ asset('assets/img/svg/layers-3_primary.svg') }}" width="18px" class="ml-2 mr-2">
											</span>
										</div>
										    <select class="form-control" id="quantity" type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}">
										    	@for($i = 1; $i <= 10; $i++)
										    		<option>{{ $i }}</option>
										    	@endfor
										    </select>
										@error('quantity')
											<span class="invalid-feedback text-center" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
								<div class="col-4">
									<label for="description">Precio Del Producto</label>
									<div class="input-group input-group-alternative">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="text-primary ni ni-square-pin"></i></span>
										</div>
										<input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" placeholder="Precio"/>
										@error('price')
											<span class="invalid-feedback text-center" role="alert">
												<strong>{{ $message }}</strong>
											</span>
										@enderror
									</div>
								</div>
							</div>
						<div class="row">
						<div class="col-12 text-right">
							<button class="btn btn-success">Agregar</button>
							<a class="btn btn-danger" href="{{route('product')}}">Cancelar</a>
						</div>
						</div>
					</form>
	    		</div>
	    	</div>
		</div>
    </div>
@endsection