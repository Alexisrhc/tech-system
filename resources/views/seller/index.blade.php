@extends('layouts.appAdmin')

@section('content')
	<div class="row">
        <div class="col-md-12 text-right">
        	<a href="{{ route('employee.create') }}" class="btn btn-sm btn-primary">
        		Agregar Empleado
        		<i class="ni ni-fat-add text-primary"></i>
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
              <h3 class="mb-0">Lista De Empleados</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Documento</th>
                    <th scope="col">Nombre(s)</th>
                    <th scope="col">Apellido(s)</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Tipo Usuario</th>
                    <th>Acción</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($Users as $user)
                    <tr>
                      <td>
                        {{$user->code}}
                      </td>
                      <td>
                        {{ ucwords($user->document)}}
                      </td>
                      <td>
                        {{ucwords(ucwords($user->name))}}
                      </td>
                      <td>
                        {{ucwords(ucwords($user->lastname))}}
                      </td>
                      <td>
                        {{$user->email}}
                      </td>
                      <td>
                        {{ trans('admin.'.$user->rol_user) }}
                      </td>
                      <td>
                        <form action="{{route('employee.destroy', $user->id)}}" method="POST">
                          <a href="{{route('employee.edit', $user->id)}}" class="btn btn-primary btn-sm">
                            <img src="{{ asset('assets/img/svg/ic_create_24px.svg') }}" width="18px">
                          </a>
                          @method('DELETE')
                          @csrf
                          <button class="btn btn-danger btn-sm">
                            <img src="{{ asset('assets/img/svg/trash-simple.svg') }}" width="17px">
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
                  {{ $Users->links() }}
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
@endsection