@extends('layouts.appAdmin')

@section('content')
    <div class="row">
		<div class="col">
	    	<div class="card shadow">
	    		<div class="card-header border-0">
        			<h2>{{ ucwords('agregar nuevo cliente') }}</h2>
	    		</div>
	    		<div class="card-body pt-0 pt-md-4">
		        	<form  method="POST" action="{{ route('client.store') }}">
						@csrf
						<div class="row mb-2">
							<div class="col-4">
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ni ni-badge text-primary"> </i></span>
									</div>
									<input type="text" class="form-control @error('document') is-invalid @enderror" name="document" value="{{ old('document') }}" placeholder="V-00000000">

									@error('document')
										<span class="invalid-feedback text-center" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-4">
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ni ni-single-02 text-primary"></i></span>
									</div>
									<input id="name"
									type="text" class="form-control @error('name') is-invalid @enderror"
									name="name"
									value="{{ old('name') }}"
									placeholder="Nombre">

									@error('name')
										<span class="invalid-feedback text-center" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-4">
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ni ni-single-02 text-primary"></i></span>
									</div>
									<input id="lastname"
									type="text" class="form-control @error('lastname') is-invalid @enderror"
									name="lastname"
									value="{{ old('lastname') }}"
									placeholder="Apellido">

									@error('lastname')
										<span class="invalid-feedback text-center" role="alert">
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
										<span class="input-group-text"><i class="ni ni-email-83 text-primary"></i></span>
									</div>
									<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Correo Electronico">
									@error('email')
										<span class="invalid-feedback text-center" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-6">
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ni ni-mobile-button text-primary"></i></span>
									</div>
									<input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Numero de telefono">
									@error('phone')
										<span class="invalid-feedback text-center" role="alert">
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
										<span class="input-group-text"><i class="ni ni-square-pin text-primary"></i></span>
									</div>
									<textarea id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" placeholder="Dirección"></textarea>
									@error('address')
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
							<a class="btn btn-danger" href="{{route('client')}}">Cancelar</a>
						</div>
						</div>
					</form>
	    		</div>
	    	</div>
		</div>
    </div>
@endsection