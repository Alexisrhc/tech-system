@extends('layouts.appAdmin')
@section('content')
	<div class="row">
    <div class="col-md-12">
         @if(session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
              <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
              <span class="alert-inner--text"><strong>Exito!</strong> {{session()->get('success')}}</span>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
         @endif
      </div>
		<div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="form-group row">
                <h3 class="col-sm-12 col-md-9">Lista De Facturas</h3>
                <div class="col-sm-10 col-md-3">
                  <form  method="GET" action="{{ route('bill') }}">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <select class="form-control form-control-sm" name="type_document" id="type_document">
                          <option selected value="V-">V-</option>
                          <option value="E-">E-</option>
                          <option value="J-">J-</option>
                        </select>
                      </div>
                        <input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="text-center form-control form-control-sm" id="bill_search" name="valueSearch" value="{{ old('bill_search') }}" placeholder="Buscar ...">
                      <div class="input-group-append">
                        <button class="btn btn-info btn-sm" type="submit"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush" id="table_bills">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Fecha</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Estatus</th>
                    <th scope="col">Acción</th>
                  </tr>
                </thead>
                <tbody>
                	@foreach($bills as $bill)
                    <tr>
                      <td>{{ $bill->created_at }}</td>
                      <td>{{ $bill->nameClient }} {{ $bill->lastname }}</td>
                      <td>{{ $bill->nameUser }} {{ $bill->lastnameUser }}</td>
                      <td>
                      	<span class="badge
                      	<?php
                  			if ($bill->status == 'pendind') {
                      			echo $status = 'badge-warning';
                      		}else if($bill->status == 'paid'){
                      			echo $status = "badge-success";
                      		}else if($bill->status == 'cancelled'){
                      			echo $status = "badge-danger";
                      		}
                      	?>
                      	">
	                      	{{ $bill->status }}
	                      </span>
	                  </td>
                    <td>
                    <form action="{{route('bill.destroy', $bill->id_bill)}}" method="POST">
                        <a href="{{ route('printedinvoice' , $bill->id_bill_temporal) }}" class="btn btn-success btn-sm">VER</a>
                          <img src="{{ asset('assets/img/svg/ic_create_24px.svg') }}" width="18px">
                        </a>
                          @method('DELETE')
                          @csrf
                          <button class="btn btn-danger btn-sm">
                            <img src="{{ asset('assets/img/svg/trash-simple.svg') }}" width="18px">
                          </button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-center mb-0">
                  {{ $bills->links() }}
                </ul>
              </nav>
            </div>
          </div>
        </div>
    </div>
@endsection