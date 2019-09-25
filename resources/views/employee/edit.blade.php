@extends('layouts.appAdmin')
@section('content')
    <div class="row">
    	<div class="col">
	    	<div class="card shadow">
	    		<div class="card-header border-0">
        			<h2 class="">{{ ucwords('editar empleado') }}</h2>
	    		</div>
	    		<div class="card-body pt-0 pt-md-4">
			    	<form  method="POST" action="{{ route('employee.update', $seller[0]->id)}}">
			    		@method('PUT')
						@csrf
						<div class="row mb-2">

							<div class="col-6">
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="text-primary ni ni-badge"></i></span>
									</div>
									<input type="text" value="{{$seller[0]->document}}" class="form-control @error('document') is-invalid @enderror" name="document" value="{{ old('email') }}" required autocomplete="Documento" placeholder="V-00000000">
									@error('document')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-6">
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="text-primary ni ni-email-83"></i></span>
									</div>
									<input type="text" value="{{$seller[0]->email}}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
						</div>
						<div class="row mb-2">
							<div class="col-4">
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="text-primary ni ni-single-02"></i></span>
									</div>
									<input id="name" value="{{$seller[0]->name}}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nombre">

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
										<span class="input-group-text"><i class="text-primary ni ni-single-02"></i></span>
									</div>
									<input id="lastname" value="{{$seller[0]->lastname}}" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" placeholder="Apellido">

									@error('lastname')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-4">
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<img src="{{ asset('assets/img/svg/code.svg') }}" width="18px" class="ml-2 mr-2">
									</div>
									<input type="text" value="{{$seller[0]->code}}" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('email') }}" >
									@error('code')
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
										<span class="input-group-text"><i class="ni ni-lock-circle-open text-primary"></i></span>
									</div>
									<input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Contraseña"/>
									@error('password')
										<span class="invalid-feedback text-center" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-6">
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="ni ni-lock-circle-open text-primary"></i></span>
									</div>
									<input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirmar contraseña"/>
									@error('password_confirmation')
										<span class="invalid-feedback text-center" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-12 text-right">
								<button class="btn btn-success btn-sm">Guardar</button>
								<a class="btn btn-danger btn-sm" href="{{route('employee')}}">Cancelar</a>
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
