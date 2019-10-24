@extends('layouts.appAdmin')
@section('content')
    <div class="row">
        <div class="col-md-12 text-right">
        	<a href="{{ route('client.create') }}" class="btn btn-sm btn-primary">
        		Agregar Cliente
            <img src="{{ asset('assets/img/svg/ic_person_add_24px.svg') }}" width="18px" class="ml-2 mr-2">
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
            <div class="form-group row">
                <h3 class="col-sm-12 col-md-9">Lista De Clientes</h3>
                <div class="col-sm-10 col-md-3">
                  <form  method="GET" action="{{ route('client') }}">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <select class="form-control form-control-sm" id="type_document">
                          <option selected value="V-">V-</option>
                          <option value="E-">E-</option>
                          <option value="J-">J-</option>
                        </select>
                      </div>
                        <input style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" class="text-center form-control form-control-sm" id="client_search" name="valueSearch" value="{{ old('client_search') }}" placeholder="Buscar ...">
                      <div class="input-group-append">
                        <button class="btn btn-info btn-sm" type="submit"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
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
                        {{substr(ucwords($client->address), 0, 25)}}
                      </td>
                      <td>
                        <form action="{{route('client.destroy', $client->id_client)}}" method="POST">
                        <a href="{{route('client.edit', $client->id_client)}}" class="btn btn-primary btn-sm">
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
                  {{ $clients->links() }}
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
@endsection
