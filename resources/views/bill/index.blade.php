@extends('layouts.appAdmin')
@section('content')
	<div class="row">
		<div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Lista De Facturas</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">ID</th>
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
                      <td>{{ $bill->id_bill }}</td>
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
                      <td><a href="{{ route('printedinvoice' , $bill->id_bill_temporal) }}" class="btn btn-success btn-sm">Pre-visualizar</a></td>
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