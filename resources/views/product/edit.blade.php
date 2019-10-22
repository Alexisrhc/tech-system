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
							<div class="col-12">
								<div class="form-group row">
									<label for="business_name" class="col-sm-3 col-form-label col-form-label-sm">
										{{ ucwords('código producto:') }}
									</label>
									<div class="col-sm-9">
										<div class="input-group input-group-alternative">
											<span class="input-group-text">
												<img src="{{ asset('assets/img/svg/code.svg') }}" width="18px" class="ml-2 mr-2">
											</span>
											<input
											style="text-transform:uppercase;"
											onkeyup="javascript:this.value=this.value.toUpperCase();"
											id="code_product"
											type="text" class="form-control @error('code_product') is-invalid @enderror"
											name="code_product"
											value="{{$product[0]->code_product}}">

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
											<input
											style="text-transform:uppercase;"
											onkeyup="javascript:this.value=this.value.toUpperCase();"
											id="serial_product"
											type="text" class="form-control @error('serial_product') is-invalid @enderror"
											name="serial_product"
											value="{{$product[0]->serial_product}}">

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
											<input
											style="text-transform:uppercase;"
											onkeyup="javascript:this.value=this.value.toUpperCase();"
											id="smart_card"
											name="smart_card"
											type="text" class="form-control @error('smart_card') is-invalid @enderror"
											value="{{$product[0]->smart_card}}">
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
											<input
											style="text-transform:uppercase;"
											onkeyup="javascript:this.value=this.value.toUpperCase();"
											id="model"
											type="text" class="form-control @error('model') is-invalid @enderror"
											name="model"
											value="{{$product[0]->model}}">
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
											<input
											style="text-transform:uppercase;"
											onkeyup="javascript:this.value=this.value.toUpperCase();"
											id="name"
											type="text" class="form-control @error('name') is-invalid @enderror"
											name="name"
											value="{{$product[0]->name}}">

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
											<input
											style="text-transform:uppercase;"
											onkeyup="javascript:this.value=this.value.toUpperCase();"
											id="description"
											type="description" class="form-control @error('description') is-invalid @enderror"
											name="description"
											value="{{$product[0]->description}}">
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
											<input
											style="text-transform:uppercase;"
											onkeyup="javascript:this.value=this.value.toUpperCase();"
											id="quantity"
											type="number" class="form-control @error('quantity') is-invalid @enderror"
											name="quantity"
											value="{{$product[0]->quantity}}">
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
											<input
											id="price"
											type="text" class="form-control @error('price') is-invalid @enderror"
											name="price"
											value="{{$product[0]->price}}">
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
							<div class="col-12">
								<div class="form-group row">
									<label for="business_name" class="col-sm-3 col-form-label col-form-label-sm">
										{{ ucwords('estado del producto:') }}
									</label>
									<div class="col-sm-9">
										<div class="input-group input-group-alternative">
											<div class="input-group-prepend">
												<img src="{{ asset('assets/img/svg/single-folded.svg') }}" width="18px" class="ml-2 mr-2">
											</div>
											<select id="status" type="text" class="form-control @error('status') is-invalid @enderror" name="status" value="{{ old('status') }}" placeholder="PRECIO">
												<option value="1">ACTIVO</option>
												<option value="0">INACTIVO</option>
											</select>
											@error('status')
												<span class="invalid-feedback text-center" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12 text-right">
								<button class="btn btn-success btn-sm">{{ ucwords('actualizar') }}</button>
								<a class="btn btn-danger btn-sm" href="{{route('product')}}">{{ ucwords('cancelar') }}</a>
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
