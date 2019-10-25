@extends('layouts.appAdmin')

@section('content')
    <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row">
                <h3 class="col-sm-12 col-md-9 mb-0">Instalación</h3>
              </div>
            </div>
            <div class="card-body">
            	<div class="row mb-3">
	            	<div class="col-sm-12 col-md-12 col-xl-3">
						<label class="small">
							{{ ucwords('documento de cliente:') }}
						</label>
	            		<div class="input-group">
		            		<div class="input-group-prepend">
		            			<select class="form-control form-control-sm" name="type_document" id="type_document">
									<option selected value="V-">V-</option>
									<option value="E-">E-</option>
									<option value="J-">J-</option>
								</select>
		            		</div>
		            		<input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="form-control @error('document') is-invalid @enderror form-control-sm" id="document" name="document" value="{{ old('document') }}" placeholder="00000000">
			            </div>
			        </div>
			        <div class="col-sm-12 col-md-12 col-xl-3">
						<label class="small">
							{{ ucwords('apellido(s):') }}
						</label>
						<div class="input-group input-group-alternative">
							<input type="text" readonly class="form-control-plaintext form-control-sm" id="lastname" name="lastname" value="{{ old('lastname') }}">
						</div>
					</div>
					<div class="col-sm-12 col-md-12 col-xl-3">
						<label class="small">
							{{ ucwords('nombre(s):') }}
						</label>
						<div class="input-group input-group-alternative">
							<input type="text" readonly class="form-control-plaintext form-control-sm" id="name" name="name" value="{{ old('name') }}">
						</div>
					</div>
					<div class="col-sm-12 col-md-12 col-xl-3">
						<label class="small">
							{{ ucwords('telefono:') }}
						</label>
						<div class="input-group input-group-alternative">
							<input type="text" readonly class="form-control-plaintext form-control-sm" id="phone" name="phone" value="{{ old('phone') }}">
						</div>
					</div>
            	</div>
            	<div class="row mb-3">
            		<div class="col-sm-12 col-md-12 col-xl-12">
						<label class="small">
							{{ ucwords('dirección:') }}
						</label>
						<div class="input-group input-group-alternative">
							<input type="text" readonly class="form-control-plaintext text-center form-control-sm" id="address" name="address" value="{{ old('address') }}">
						</div>
					</div>
				</div>
				<div class="row mb-3">
					<h3 class="col-sm-12 col-md-9 mb-0">Servicio</h3>
				</div>
				<div class="row mb-3">
            		<div class="col-sm-12 col-md-12 col-xl-12">
						<div class="form-group row">
							<label for="business_name" class="col-sm-3 col-form-label col-form-label-sm">
								{{ ucwords('tipo servicio:') }}
							</label>
							<div class="col-sm-9">
								<div class="input-group input-group-alternative">
									<select type="text" class="form-control form-control-sm @error('rol_user') is-invalid @enderror" name="rol_user" value="{{ old('rol_user') }}" >
				                      <option value="">INSTALACION NUEVA</option>
				                      <option value="">SERVICIO TECNICO</option>
				                      <option value="">MUDANZA</option>
				                    </select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row mb-3">
            		<div class="col-sm-12 col-md-12 col-xl-12">
						<div class="form-group row">
							<label for="business_name" class="col-sm-3 col-form-label col-form-label-sm">
								{{ ucwords('tecnico:') }}
							</label>
							<div class="col-sm-9">
								<div class="input-group input-group-alternative">
									<select type="text" class="form-control form-control-sm " name="" id="id_tecnico">
				                      <option value="">TECNICO</option>
				                    </select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row mb-3">
            		<div class="col-sm-12 col-md-12 col-xl-12">
						<div class="form-group row">
							<label for="business_name" class="col-sm-3 col-form-label col-form-label-sm">
								{{ ucwords('precio servicio:') }}
							</label>
							<div class="col-sm-9">
								<div class="input-group mb-3">
								  <div class="input-group-prepend">
								    <span class="input-group-text form-control-sm">$</span>
								  </div>
								  <input type="number" class="form-control form-control-sm" aria-label="Amount (to the nearest dollar)">

								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row mb-3">
					<h3 class="col-sm-12 col-md-9 mb-0">Materiales</h3>
				</div>

				<div class="row mb-3">
            		<div class="form-group row col-sm-12">
						<label for="business_name" class="col-sm-7  col-form-label col-form-label-sm">
						</label>
						<label for="business_name" class="col-sm-3 col-form-label col-form-label-sm ">
							{{ ucwords('cantidad') }}
						</label>
						<label for="business_name" class="col-sm-2 col-form-label col-form-label-sm ">
							{{ ucwords('precio') }}
						</label>
					</div>
				</div>

				<div class="row mb-3">
					<div class="form-group row col-sm-12">
						<label class="col-sm-7 col-form-label col-form-label-sm">
							{{ ucwords('cable coaxial simple') }}
						</label>
						<input type="text" class="col-sm-2 form-control-sm form-control-sm text-center" id="name_campo">
						<label class="col-sm-1 col-xl-3 col-form-label col-form-label-sm text-center" id="name_campo">
						</label>
					</div>
				</div>

				<div class="row mb-3">
					<div class="form-group row col-sm-12">
						<label class="col-sm-7 col-form-label col-form-label-sm">
							{{ ucwords('cable coaxial dual') }}
						</label>
						<input type="text" class="col-sm-2 form-control-sm form-control-sm text-center" id="name_campo">
						<label class="col-sm-1 col-xl-3 col-form-label col-form-label-sm text-center" id="name_campo">
						</label>
					</div>
				</div>

				<div class="row mb-3">
					<div class="form-group row col-sm-12">
						<label class="col-sm-7 col-form-label col-form-label-sm">
							{{ ucwords('conectores') }}
						</label>
						<input type="text" class="col-sm-2 form-control-sm form-control-sm text-center" id="name_campo">
						<label class="col-sm-1 col-xl-3 col-form-label col-form-label-sm text-center" id="name_campo">
						</label>
					</div>
				</div>

				<div class="row mb-3">
					<div class="form-group row col-sm-12">
						<label class="col-sm-7 col-form-label col-form-label-sm">
							{{ ucwords('union') }}
						</label>
						<input type="text" class="col-sm-2 form-control-sm form-control-sm text-center" id="name_campo">
						<label class="col-sm-1 col-xl-3 col-form-label col-form-label-sm text-center" id="name_campo">
						</label>
					</div>
				</div>

				<div class="row mb-3">
					<div class="form-group row col-sm-12">
						<label class="col-sm-7 col-form-label col-form-label-sm">
							{{ ucwords('antena') }}
						</label>
						<input type="text" class="col-sm-2 form-control-sm form-control-sm text-center" id="name_campo">
						<label class="col-sm-1 col-xl-3 col-form-label col-form-label-sm text-center" id="name_campo">
						</label>
					</div>
				</div>

				<div class="row mb-3">
					<div class="form-group row col-sm-12">
						<label class="col-sm-7 col-form-label col-form-label-sm">
							{{ ucwords('LNB') }}
						</label>
						<input type="text" class="col-sm-2 form-control-sm form-control-sm text-center" id="name_campo">
						<label class="col-sm-1 col-xl-3 col-form-label col-form-label-sm text-center" id="name_campo">
						</label>
					</div>
				</div>

				<div class="row mb-3">
					<div class="form-group row col-sm-12">
						<label class="col-sm-7 col-form-label col-form-label-sm">
							{{ ucwords('splilter 1x2') }}
						</label>
						<input type="text" class="col-sm-2 form-control-sm form-control-sm text-center" id="name_campo">
						<label class="col-sm-1 col-xl-3 col-form-label col-form-label-sm text-center" id="name_campo">
						</label>
					</div>
				</div>

				<div class="row mb-3">
					<div class="form-group row col-sm-12">
						<label class="col-sm-7 col-form-label col-form-label-sm">
							{{ ucwords('splilter 1x4') }}
						</label>
						<input type="text" class="col-sm-2 form-control-sm form-control-sm text-center" id="name_campo">
						<label class="col-sm-1 col-xl-3 col-form-label col-form-label-sm text-center" id="name_campo">
						</label>
					</div>
				</div>

				<div class="row mb-3">
					<div class="form-group row col-sm-12">
						<label class="col-sm-7 col-form-label col-form-label-sm">
							{{ ucwords('multi swith 1x4') }}
						</label>
						<input type="text" class="col-sm-2 form-control-sm form-control-sm text-center" id="name_campo">
						<label class="col-sm-1 col-xl-3 col-form-label col-form-label-sm text-center" id="name_campo">
						</label>
					</div>
				</div>
				<div class="row mb-3">
					<div class="form-group row col-sm-12">
						<label class="col-sm-7 col-form-label col-form-label-sm">
							{{ ucwords('multi swith 1x8') }}
						</label>
						<input type="text" class="col-sm-2 form-control-sm form-control-sm text-center" id="name_campo">
						<label class="col-sm-1 col-xl-3 col-form-label col-form-label-sm text-center" id="name_campo">
						</label>
					</div>
				</div>
				<div class="row mb-3">
					<div class="form-group row col-sm-12">
						<label class="col-sm-7 col-form-label col-form-label-sm">
							{{ ucwords('amplificador lineal') }}
						</label>
						<input type="text" class="col-sm-2 form-control-sm form-control-sm text-center" id="name_campo">
						<label class="col-sm-1 col-xl-3 col-form-label col-form-label-sm text-center" id="name_campo">
						</label>
					</div>
				</div>
				<div class="row mb-3">
					<div class="form-group row col-sm-12">
						<label class="col-sm-7 col-form-label col-form-label-sm">
							{{ ucwords('amplificador activo') }}
						</label>
						<input type="text" class="col-sm-2 form-control-sm form-control-sm text-center" id="name_campo">
						<label class="col-sm-1 col-xl-3 col-form-label col-form-label-sm text-center" id="name_campo">
						</label>
					</div>
				</div>
				<div class="row mb-3">
					<div class="form-group row col-sm-12">
						<label class="col-sm-7 col-form-label col-form-label-sm">
							{{ ucwords('cable HDMI') }}
						</label>
						<input type="text" class="col-sm-2 form-control-sm form-control-sm text-center" id="name_campo">
						<label class="col-sm-1 col-xl-3 col-form-label col-form-label-sm text-center" id="name_campo">
						</label>
					</div>
				</div>
				<div class="row mb-3">
					<div class="form-group row col-sm-12">
						<label class="col-sm-7 col-form-label col-form-label-sm">
							{{ ucwords('cable RCA') }}
						</label>
						<input type="text" class="col-sm-2 form-control-sm form-control-sm text-center" id="name_campo">
						<label class="col-sm-1 col-xl-3 col-form-label col-form-label-sm text-center" id="name_campo">
						</label>
					</div>
				</div>
				<div class="row mb-3">
					<div class="form-group row col-sm-12">
						<label class="col-sm-7 col-form-label col-form-label-sm">
							{{ ucwords('cable RCA 10 pines') }}
						</label>
						<input type="text" class="col-sm-2 form-control-sm form-control-sm text-center" id="name_campo">
						<label class="col-sm-1 col-xl-3 col-form-label col-form-label-sm text-center" id="name_campo">
						</label>
					</div>
				</div>
				<div class="row mb-3">
					<div class="form-group row col-sm-12">
						<label class="col-sm-7 col-form-label col-form-label-sm">
							{{ ucwords('cable corriente') }}
						</label>
						<input type="text" class="col-sm-2 form-control-sm form-control-sm text-center" id="name_campo">
						<label class="col-sm-1 col-xl-3 col-form-label col-form-label-sm text-center" id="name_campo">
						</label>
					</div>
				</div>
				<div class="row mb-3">
					<div class="form-group row col-sm-12">
						<label class="col-sm-7 col-form-label col-form-label-sm">
							{{ ucwords('cable corriente con regulador') }}
						</label>
						<input type="text" class="col-sm-2 form-control-sm form-control-sm text-center" id="name_campo">
						<label class="col-sm-1 col-xl-3 col-form-label col-form-label-sm text-center" id="name_campo">
						</label>
					</div>
				</div>
            </div>
            <div class="card-footer pt-3 text-right">
            	<button type="button" class="btn btn-sm btn-danger" id="cancel_bill">Cancelar</button>
            	<button type="button" class="btn btn-success btn-sm" id="process_bill">Procesar</button>
            </div>
          </div>
        </div>
      </div>
@endsection