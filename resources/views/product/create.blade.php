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
						<div class="row mb-2">
							<div class="col-12">
								<div class="form-group row">
									<label for="business_name" class="col-sm-3 col-form-label col-form-label-sm">
										{{ ucwords('códido producto:') }}
									</label>
									<div class="col-sm-9">
										<div class="input-group input-group-alternative">
											<span class="input-group-text">
												<img src="{{ asset('assets/img/svg/code.svg') }}" width="18px" class="ml-2 mr-2">
											</span>
											<input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" id="code_product" type="text" class="form-control @error('code_product') is-invalid @enderror" name="code_product" value="{{ old('code_product') }}"  placeholder="{{ ucwords('código producto') }}">

											@error('code_product')
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
							<div class="col-12">
								<div class="form-group row">
									<label for="business_name" class="col-sm-3 col-form-label col-form-label-sm">
										{{ ucwords('serial producto:') }}
									</label>
									<div class="col-sm-9">
										<div class="input-group input-group-alternative">
											<span class="input-group-text">
												<img src="{{ asset('assets/img/svg/code.svg') }}" width="18px" class="ml-2 mr-2">
											</span>
											<input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" id="serial_product" type="text" class="form-control @error('serial_product') is-invalid @enderror" name="serial_product" value="{{ old('serial_product') }}"  placeholder="{{ ucwords('serial producto') }}">

											@error('serial_product')
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
							<div class="col-12">
								<div class="form-group row">
									<label for="business_name" class="col-sm-3 col-form-label col-form-label-sm">
										{{ ucwords('smart card:') }}
									</label>
									<div class="col-sm-9">
										<div class="input-group input-group-alternative">
											<span class="input-group-text">
												<img src="{{ asset('assets/img/svg/code.svg') }}" width="18px" class="ml-2 mr-2">
											</span>
											<input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" id="smart_card" type="text" class="form-control @error('smart_card') is-invalid @enderror" name="smart_card" value="{{ old('smart_card') }}" placeholder="{{ ucwords('smart card') }}">
											@error('smart_card')
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
							<div class="col-12">
								<div class="form-group row">
									<label for="business_name" class="col-sm-3 col-form-label col-form-label-sm">
										{{ ucwords('modelo:') }}
									</label>
									<div class="col-sm-9">
										<div class="input-group input-group-alternative">
											<span class="input-group-text">
												<img src="{{ asset('assets/img/svg/code.svg') }}" width="18px" class="ml-2 mr-2">
											</span>
											<input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" id="model" type="text" class="form-control @error('model') is-invalid @enderror" name="model" value="{{ old('model') }}" placeholder="{{ ucwords('modelo:') }}">
											@error('model')
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
							<div class="col-12">
								<div class="form-group row">
									<label for="business_name" class="col-sm-3 col-form-label col-form-label-sm">
										{{ ucwords('nombre del producto:') }}
									</label>
									<div class="col-sm-9">
										<div class="input-group input-group-alternative">
											<span class="input-group-text">
												<img src="{{ asset('assets/img/svg/single-folded.svg') }}" width="18px" class="ml-2 mr-2">
											</span>
											<input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="{{ ucwords('nombre del producto') }}">

											@error('name')
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
							<div class="col-12">
								<div class="form-group row">
									<label for="business_name" class="col-sm-3 col-form-label col-form-label-sm">
										{{ ucwords('descripción del producto:') }}
									</label>
									<div class="col-sm-9">
										<div class="input-group input-group-alternative">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<img src="{{ asset('assets/img/svg/single-folded.svg') }}" width="18px" class="ml-2 mr-2">
												</span>
											</div>
											<input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" placeholder="{{ ucwords('descripción del producto') }}">
											@error('description')
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
							<div class="col-12">
								<div class="form-group row">
									<label for="business_name" class="col-sm-3 col-form-label col-form-label-sm">
										{{ ucwords('cantidad del producto:') }}
									</label>
									<div class="col-sm-9">
										<div class="input-group input-group-alternative">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<img src="{{ asset('assets/img/svg/layers-3_primary.svg') }}" width="18px" class="ml-2 mr-2">
												</span>
											</div>
											    <input class="form-control" id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" placeholder="CANTIDAD" value="{{ old('quantity') }}" />
											@error('quantity')
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
							<div class="col-12">
								<div class="form-group row">
									<label for="business_name" class="col-sm-3 col-form-label col-form-label-sm">
										{{ ucwords('precio del producto:') }}
									</label>
									<div class="col-sm-9">
										<div class="input-group input-group-alternative">
											<div class="input-group-prepend">
												<img src="{{ asset('assets/img/svg/dollar.svg') }}" width="20px" class="ml-3 mr-2 mt-2 mb-2">
											</div>
											<input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" placeholder="{{ ucwords('precio del producto') }}"/>
											@error('price')
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
								<a class="btn btn-danger btn-sm" href="{{route('product')}}">Cancelar</a>
							</div>
						</div>
					</form>
				</div>
	    	</div>
		</div>
    </div>
@endsection