@extends('layouts.appAdmin')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-4">
        	<h2 class="text-white">{{ ucwords('agregar nuevo cliente') }}</h2>
        </div>

        <div class="col-md-12">
        	<form>
			  <div class="row mb-2">
			    <div class="col-4">
			      <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-badge"></i></span>
                    </div>
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="Documento" placeholder="V-00000000">

                    @error('email')
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
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Nombre">

                    @error('email')
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
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Apellido">

                    @error('email')
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
			  	 		<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Correo Electronico">
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
	                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Numero de telefono">
	                    @error('email')
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
	                    <textarea id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Nombre"></textarea>
	                    @error('email')
	                        <span class="invalid-feedback" role="alert">
	                            <strong>{{ $message }}</strong>
	                        </span>
	                    @enderror
	                </div>
			  	</div>
			  </div>
			  <div class="row">
			  	<div class="col-12 text-right">
			  		<button class="btn btn-success">Agregar</button>
			  		<button class="btn btn-danger">Cancelar</button>
			  	</div>
			  </div>
			</form>
        </div>
    </div>

    <div class="row">

    </div>
@endsection
