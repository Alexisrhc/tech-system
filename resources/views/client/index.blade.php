@extends('layouts.appAdmin')

@section('content')
    <div class="row">
        <div class="col-md-12 text-right">
        	<a href="{{ route('client-create') }}" class="btn btn-sm btn-success">
        		Agregar Cliente
        		<i class="ni ni-fat-add text-yellow"></i>
        	</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Lista De Clientes</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Documento</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Dirección</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($clients as $client)
                    <tr>
                      <td>
                        {{$client->document}}
                      </td>
                      <td>
                        {{ ucwords($client->name)}}
                      </td>
                      <td>
                        {{ucwords($client->lastname)}}
                      </td>
                      <td>
                        {{$client->email}}
                      </td>
                      <td>
                        {{$client->phone}}
                      </td>
                      <td>
                        {{ucwords($client->address)}}
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
@endsection
