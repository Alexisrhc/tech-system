@extends('layouts.appAdmin')

@section('content')
    <div class="row">
		<div class="col">
	    	<div class="card shadow">
	    		<div class="card-header border-0">
        			<h2>{{ ucwords('agregar nuevo empleado') }}</h2>
	    		</div>
	    		<div class="card-body pt-0 pt-md-4">
		        	<form  method="POST" action="{{ route('employee.store') }}">
						@csrf
						<div class="row mb-2">
							<div class="col-12">
								<div class="form-group row">
									<label for="business_name" class="col-sm-3 col-form-label col-form-label-sm">
										{{ ucwords('código:') }}
									</label>
									<div class="col-sm-9">
										<div class="input-group input-group-alternative">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="ni ni-badge text-primary"></i></span>
											</div>
											<input type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}"  placeholder="{{ ucwords('código vendedor') }}">

											@error('code')
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
										{{ ucwords('documento de identidad:') }}
									</label>
									<div class="col-sm-9">
										<div class="input-group input-group-alternative">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="ni ni-badge text-primary"></i></span>
											</div>
											<input type="text" class="form-control @error('document') is-invalid @enderror" name="document" value="{{ old('document') }}"  placeholder="Documento de identidad">

											@error('document')
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
										{{ ucwords('tipo de empleado:') }}
									</label>
									<div class="col-sm-9">
										<div class="input-group input-group-alternative">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="ni ni-single-02 text-primary"></i></span>
											</div>
											<select type="text" class="form-control @error('rol_user') is-invalid @enderror" name="rol_user" value="{{ old('rol_user') }}" >
						                      <option value="admin">ADMINISTRADOR</option>
						                      <option value="employee">EJECUTIVO DE VENTAS</option>
						                      <option value="technical">TECNICO</option>
						                      <option value="administrativy">ADMINISTRATIVO</option>
						                    </select>

											@error('type_seller')
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
										{{ ucwords('nombre:') }}
									</label>
									<div class="col-sm-9">
										<div class="input-group input-group-alternative">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="ni ni-single-02 text-primary"></i></span>
											</div>
											<input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Nombre(s)">
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
										{{ ucwords('apellido:') }}
									</label>
									<div class="col-sm-9">
										<div class="input-group input-group-alternative">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="ni ni-single-02 text-primary"></i></span>
											</div>
											<input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" placeholder="Apellido(s)">
											@error('lastname')
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
										{{ ucwords('correo electrónico:') }}
									</label>
									<div class="col-sm-9">
										<div class="input-group input-group-alternative">
											<div class="input-group-prepend">
												<span class="input-group-text"><i class="ni ni-email-83 text-primary"></i></span>
											</div>
											<input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Correo Electronico"/>
											@error('email')
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
										{{ ucwords('contraseña:') }}
									</label>
									<div class="col-sm-9">
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
								</div>
							</div>
						</div>

						<div class="row mb-2">
							<div class="col-12">
								<div class="form-group row">
									<label for="business_name" class="col-sm-3 col-form-label col-form-label-sm">
										{{ ucwords('confirmar contraseña:') }}
									</label>
									<div class="col-sm-9">
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
							</div>
						</div>

						<div class="row">
							<div class="col-12 text-right">
								<button class="btn btn-success btn-sm">Agregar</button>
								<a class="btn btn-danger btn-sm" href="{{route('employee')}}">Cancelar</a>
							</div>
						</div>
					</form>
	    		</div>
	    	</div>
		</div>
    </div>
@endsection