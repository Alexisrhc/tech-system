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
											<input
											style="text-transform:uppercase;"
											onkeyup="javascript:this.value=this.value.toUpperCase();"
											type="text"
											class="form-control @error('code') is-invalid @enderror"
											name="code"
											value="{{ $seller[0]->code }}"
											value="{{ old('code') }}">

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
											<input
											style="text-transform:uppercase;"
											onkeyup="javascript:this.value=this.value.toUpperCase();"
											type="text"
											class="form-control @error('document') is-invalid @enderror"
											name="document"
											value="{{ $seller[0]->document }}"
											value="{{ old('document') }}">
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
											<select
											style="text-transform:uppercase;"
											onkeyup="javascript:this.value=this.value.toUpperCase();"
											type="text"
											class="form-control @error('rol_user') is-invalid @enderror"
											name="rol_user" >
												<option selected disabled hidden value="{{ $seller[0]->rol_user }}">{{ trans('admin.'.$seller[0]->rol_user) }}</option>
							                    <option value="employee">EMPLEADO</option>
							                    <option value="technical">TECNICO</option>
							                    <option value="admin">ADMINISTRADOR</option>
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
											<input
											style="text-transform:uppercase;"
											onkeyup="javascript:this.value=this.value.toUpperCase();"
											type="text"
											class="form-control @error('name') is-invalid @enderror"
											name="name"
											value="{{ $seller[0]->name }}"
											value="{{ old('name') }}">
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
											<input
											style="text-transform:uppercase;"
											onkeyup="javascript:this.value=this.value.toUpperCase();"
											type="text"
											class="form-control @error('lastname') is-invalid @enderror"
											name="lastname"
											value="{{ $seller[0]->lastname }}"
											value="{{ old('lastname') }}">
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
											<input
											style="text-transform:uppercase;"
											onkeyup="javascript:this.value=this.value.toUpperCase();"
											type="email"
											class="form-control @error('email') is-invalid @enderror"
											name="email"
											value="{{ $seller[0]->email }}"
											value="{{ old('email') }}">
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
											<input
											style="text-transform:uppercase;"
											onkeyup="javascript:this.value=this.value.toUpperCase();"
											type="password"
											class="form-control @error('password') is-invalid @enderror"
											name="password"
											value="{{ old('password') }}" placeholder="Contraseña"/>
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
								<button class="btn btn-success btn-sm">Actualizar</button>
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
