@extends('layouts.appAdmin')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-4">
        	<h2 class="text-white">{{ ucwords('agregar nuevo cliente') }}</h2>
        </div>
        <div class="col-md-12">
        	<form  method="POST" action="/client">
				@csrf
				<div class="row mb-2">
					<div class="col-4">
						<div class="input-group input-group-alternative">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="ni ni-badge"></i></span>
							</div>
							<input type="text" value="{{$client->document}}" class="form-control @error('document') is-invalid @enderror" name="document" value="{{ old('email') }}" required autocomplete="Documento" placeholder="V-00000000">

							@error('document')
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
							<input id="name" value="{{$client->name}}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nombre">

							@error('name')
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
							<input id="lastname" value="{{$client->lastname}}" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" placeholder="Apellido">

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
						<div class="input-group input-group-alternative">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="ni ni-email-83"></i></span>
							</div>
							<input id="email" type="email" value="{{$client->email}}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Correo Electronico">
							@error('email')
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
							<input id="phone" type="text" value="{{$client->phone}}" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Numero de telefono">
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
						<div class="input-group input-group-alternative">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="ni ni-square-pin"></i></span>
							</div>
							<textarea id="address" type="text" value="{{$client->address}}" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" placeholder="Dirección"></textarea>
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
					<button class="btn btn-success">Editar</button>
					<a class="btn btn-danger" href="{{route('client')}}">Cancelar</a>
				</div>
				</div>
			</form>
        </div>
    </div>

    <div class="row">

    </div>
@endsection
