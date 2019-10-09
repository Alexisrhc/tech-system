@extends('layouts.appAdmin')

@section('content')
    <div class="row">
		<div class="col">
	    	<div class="card shadow">
	    		<div class="card-header border-0">
        			<h2>{{ ucwords('editar proveedor') }}</h2>
	    		</div>
	    		<div class="card-body pt-0 pt-md-4">
		        	<form  method="POST" action="{{ route('provider.update' , $provider[0]->id_provider) }}">
		        		@method('PUT')
						@csrf
						<div class="row mb-2">
							<div class="col-12">
								<div class="form-group row">
									<label for="rif" class="col-sm-2 col-form-label">
										{{ ucwords('rif:') }}
									</label>
									<div class="col-sm-10">
										<div class="input-group input-group-alternative">
											<input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control @error('rif') is-invalid @enderror" name="rif" value="{{$provider[0]->rif}}">
											@error('rif')
												<span class="invalid-feedback text-center" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>
								</div>
							</div>

							<div class="col-12">
								<div class="form-group row">
									<label for="business_name" class="col-sm-2 col-form-label">
										{{ ucwords('razon social:') }}
									</label>
									<div class="col-sm-10">
										<div class="input-group input-group-alternative">
											<input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control @error('business_name') is-invalid @enderror" name="business_name" value="{{$provider[0]->business_name}}">
											@error('business_name')
												<span class="invalid-feedback text-center" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>
								</div>
							</div>

							<div class="col-12">
								<div class="form-group row">
									<label for="name" class="col-sm-2 col-form-label">
										{{ ucwords('nombre:') }}
									</label>
									<div class="col-sm-10">
										<div class="input-group input-group-alternative">
											<input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$provider[0]->name}}">
											@error('name')
												<span class="invalid-feedback text-center" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>
								</div>
							</div>

							<div class="col-12">
								<div class="form-group row">
									<label for="contact" class="col-sm-2 col-form-label">
										{{ ucwords('contacto:') }}
									</label>
									<div class="col-sm-10">
										<div class="input-group input-group-alternative">
											<input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{$provider[0]->contact}}">
											@error('contact')
												<span class="invalid-feedback text-center" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>
								</div>
							</div>

							<div class="col-12">
								<div class="form-group row">
									<label for="address" class="col-sm-2 col-form-label">
										{{ ucwords('dirección:') }}
									</label>
									<div class="col-sm-10">
										<div class="input-group input-group-alternative">
											<input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{$provider[0]->address}}">
											@error('address')
												<span class="invalid-feedback text-center" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>
								</div>
							</div>

							<div class="col-12">
								<div class="form-group row">
									<label for="phone" class="col-sm-2 col-form-label">
										{{ ucwords('telefono:') }}
									</label>
									<div class="col-sm-10">
										<div class="input-group input-group-alternative">
											<input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$provider[0]->phone}}">
											@error('phone')
												<span class="invalid-feedback text-center" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>
								</div>
							</div>

							<div class="col-12">
								<div class="form-group row">
									<label for="email" class="col-sm-2 col-form-label">
										{{ ucwords('E-mail:') }}
									</label>
									<div class="col-sm-10">
										<div class="input-group input-group-alternative">
											<input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$provider[0]->email}}">
											@error('email')
												<span class="invalid-feedback text-center" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>
								</div>
							<hr class="my-3">
							</div>

							<div class="card-header border-0">
			        			<h2>{{ ucwords('datos bancarios') }}</h2>
				    		</div>

							<div class="col-12">
								<div class="form-group row">
									<label for="bank_account" class="col-sm-2 col-form-label">
										{{ ucwords('banco:') }}
									</label>
									<div class="col-sm-10">
										<div class="input-group input-group-alternative">
											<input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control @error('bank') is-invalid @enderror" name="bank" value="{{$provider[0]->bank}}">
											@error('bank')
												<span class="invalid-feedback text-center" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>
								</div>
							</div>

							<div class="col-12">
								<div class="form-group row">
									<label for="bank_account" class="col-sm-2 col-form-label">
										{{ ucwords('n° de cuenta:') }}
									</label>
									<div class="col-sm-10">
										<div class="input-group input-group-alternative">
											<input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control @error('bank_account') is-invalid @enderror" name="bank_account" value="{{$provider[0]->bank_account}}">
											@error('bank_account')
												<span class="invalid-feedback text-center" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>
								</div>
							</div>

							<div class="col-12">
								<div class="form-group row">
									<label for="name_bank_account" class="col-sm-2 col-form-label">
										{{ ucwords('nombre:') }}
									</label>
									<div class="col-sm-10">
										<div class="input-group input-group-alternative">
											<input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control @error('name_bank_account') is-invalid @enderror" name="name_bank_account" value="{{$provider[0]->name_bank_account}}">
											@error('name_bank_account')
												<span class="invalid-feedback text-center" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>
								</div>
							</div>

							<div class="col-12">
								<div class="form-group row">
									<label for="id_bank_account" class="col-sm-2 col-form-label">
										{{ ucwords('C.I:') }}
									</label>
									<div class="col-sm-10">
										<div class="input-group input-group-alternative">
											<input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control @error('id_bank_account') is-invalid @enderror" name="id_bank_account" value="{{$provider[0]->id_bank_account}}">
											@error('id_bank_account')
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
								<a class="btn btn-danger btn-sm" href="{{route('provider')}}">Cancelar</a>
							</div>
						</div>
					</form>
	    		</div>
	    	</div>
		</div>
    </div>
@endsection