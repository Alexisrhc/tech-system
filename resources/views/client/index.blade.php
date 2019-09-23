@extends('layouts.appAdmin')

@section('content')
    <div class="row">
        <div class="col-md-12 text-right">
        	<a href="{{ route('client.create') }}" class="btn btn-sm btn-success">
        		Agregar Cliente
        		<i class="ni ni-fat-add text-yellow"></i>
        	</a>
        </div>
    </div>
    <div class="row mt-3">
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
                    <th>Acción</th>
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
                        {{substr(ucwords($client->address), 0, 10)}}
                      </td>
                      <td>
                        <form action="{{route('client.destroy', $client->id_client)}}" method="POST">
                        <a href="{{route('client.edit', $client->id_client)}}" class="btn btn-success btn-sm">
                          <i class="ni ni-ruler-pencil"></i>
                        </a>
                          @method('DELETE')
                          @csrf
                          <button class="btn btn-danger btn-sm"><i class="ni ni-fat-remove"></i></button>
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
                  {{ $clients->links() }}
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
@endsection
