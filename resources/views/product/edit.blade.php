@extends('layouts.appAdmin')

@section('content')
    <div class="row">
    	<div class="col">
	    	<div class="card shadow">
	    		<div class="card-header border-0">
        			<h2 class="">{{ ucwords('editar producto') }}</h2>
	    		</div>
	    		<div class="card-body pt-0 pt-md-4">
			    	<form  method="POST" action="{{ route('product.update', $product[0]->id_product)}}">
			    		@method('PUT')
						@csrf
						<div class="row mb-2">
							<div class="col-4">
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ni ni-badge"></i></span>
									</div>
									<input type="text" value="{{$product[0]->code}}" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('email') }}" required placeholder="Codigo">

									@error('code')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-4">
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ni ni-single-02"></i></span>
									</div>
									<input id="serial" value="{{$product[0]->serial}}" type="text" class="form-control @error('serial') is-invalid @enderror" name="serial" value="{{ old('serial') }}" placeholder="Serial">

									@error('serial')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-4">
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ni ni-single-02"></i></span>
									</div>
									<input id="name" value="{{$product[0]->name}}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nombre del producto">

									@error('name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							</div>
							<div class="row mb-2">
								<div class="col-6">
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ni ni-email-83"></i></span>
									</div>
									<input id="description" type="description" value="{{$product[0]->description}}" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" placeholder="Descripción">
									@error('description')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-6">
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ni ni-mobile-button"></i></span>
									</div>
									<input id="quantity" type="text" value="{{$product[0]->quantity}}" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" placeholder="Cantidad">
									@error('quantity')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
									</div>
								</div>
							</div>
							<div class="row mb-2">
							<div class="col-12">
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ni ni-square-pin"></i></span>
									</div>
									<input id="price" type="text" value="{{$product[0]->price}}" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" placeholder="Precio">
									@error('price')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							</div>
						<div class="row">
							<div class="col-12 text-right">
								<button class="btn btn-success">Guardar</button>
								<a class="btn btn-danger" href="{{route('product')}}">Cancelar</a>
							</div>
						</div>
					</form>
	    		</div>
	    	</div>
	    </div>
    </div>

    <div class="row">

    </div>
@endsection