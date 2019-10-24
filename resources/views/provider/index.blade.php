@extends('layouts.appAdmin')

@section('content')
    <div class="row">
        <div class="col-md-12 text-right">
        	<a href="{{ route('provider.create') }}" class="btn btn-sm btn-primary">
        		{{ucwords('agregar proveedor')}}
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
                <h3 class="col-sm-12 col-md-9 mb-0">Lista De Proveedores</h3>
                <div class="col-sm-10 col-md-3">
                  <form  method="GET" action="{{ route('provider') }}">
                    <div class="input-group input-group-alternative">

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
                    <th scope="col">{{ucwords('producto')}}</th>
                    <th scope="col">{{ucwords('rif')}}</th>
                    <th scope="col">{{ucwords('razon social')}}</th>
                    <th scope="col">{{ucwords('contacto')}}</th>
                    <th scope="col">{{ucwords('nombre')}}</th>
                    <th scope="col">{{ucwords('correo')}}</th>
                    <th scope="col">{{ucwords('telefono')}}</th>
                    <th scope="col">{{ucwords('dirección')}}</th>
                    <th>Acción</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($providers as $provider)
                    <tr>
                      <td>
                        {{$provider->product}}
                      </td>
                      <td>
                        {{$provider->rif}}
                      </td>
                      <td>
                        {{ ucwords($provider->business_name)}}
                      </td>
                      <td>
                        {{ucwords($provider->contact)}}
                      </td>
                      <td>
                        {{$provider->name}}
                      </td>
                      <td>
                        {{$provider->email}}
                      </td>
                      <td>
                        {{$provider->phone}}
                      </td>
                      <td>
                        {{substr(ucwords($provider->address), 0, 25)}}
                      </td>
                      <td>
                        <form action="{{route('provider.destroy', $provider->id_provider)}}" method="POST">
                        <a href="{{route('provider.edit', $provider->id_provider)}}" class="btn btn-primary btn-sm">
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
                  {{ $providers->links() }}
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
@endsection
