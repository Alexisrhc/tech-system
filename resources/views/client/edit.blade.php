@extends('layouts.appAdmin')

@section('content')
    <div class="row">
    	<div class="col">
	    	<div class="card shadow">
	    		<div class="card-header border-0">
        			<h2 class="">{{ ucwords('editar cliente') }}</h2>
	    		</div>
	    		<div class="card-body pt-0 pt-md-4">
			    	<form  method="POST" action="{{ route('client.update', $client[0]->id_client)}}">
			    		@method('PUT')
						@csrf
						<div class="row mb-2">
							<div class="col-4">
								<label for="type_document" class="col-form-label-sm">{{ ucwords('documento de identidad:') }}</label>
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="text-primary ni ni-badge"></i></span>
									</div>
									<input type="text" value="{{$client[0]->document}}" class="form-control @error('document') is-invalid @enderror" name="document" value="{{ old('email') }}" required autocomplete="Documento" placeholder="V-00000000">

									@error('document')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-4">
								<label for="name" class="col-form-label-sm">{{ ucwords('nombre:') }}</label>
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="text-primary ni ni-single-02"></i></span>
									</div>
									<input id="name" value="{{$client[0]->name}}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nombre">

									@error('name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-4">
								<label for="lastname" class="col-form-label-sm">{{ ucwords('apellido:') }}</label>
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="text-primary ni ni-single-02"></i></span>
									</div>
									<input id="lastname" value="{{$client[0]->lastname}}" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" placeholder="Apellido">

									@error('lastname')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							</div>
							<div class="row mb-2">
								<div class="col-6">
								<label for="email" class="col-form-label-sm">{{ ucwords('correo electrónico:') }}</label>
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="text-primary ni ni-email-83"></i></span>
									</div>
									<input id="email" type="email" value="{{$client[0]->email}}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Correo Electronico">
									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-6">
								<label for="phone" class="col-form-label-sm">{{ ucwords('número de telefono:') }}</label>
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="text-primary ni ni-mobile-button"></i></span>
									</div>
									<input id="phone" type="text" value="{{$client[0]->phone}}" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Numero de telefono">
									@error('phone')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
									</div>
								</div>
							</div>
							<div class="row mb-2">
							<div class="col-12">
								<label for="address" class="col-form-label-sm">{{ ucwords('dirección:') }}</label>
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="text-primary ni ni-square-pin"></i></span>
									</div>
									<textarea id="address" type="text" value="{{$client[0]->address}}" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" placeholder="Dirección">{{$client[0]->address}}</textarea>
									@error('address')
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
								<a class="btn btn-danger" href="{{route('client')}}">Cancelar</a>
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
