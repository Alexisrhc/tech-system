@extends('layouts.appAdmin')

@section('content')
    <div class="row">
        <div class="col-md-12 text-right">
        	<a href="{{ route('product.create') }}" class="btn btn-sm btn-primary">
        		Agregar Producto
            <img src="{{ asset('assets/img/svg/layers-3.svg') }}" width="18px" class="ml-2 mr-2">
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
              <h3 class="mb-0">Lista De Productos</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col"> {{ ucwords('codigo producto')}} </th>
                    <th scope="col"> {{ ucwords('serial producto')}} </th>
                    <th scope="col"> {{ ucwords('smart card')}} </th>
                    <th scope="col"> {{ ucwords('nombre')}} </th>
                    <th scope="col"> {{ ucwords('descripción')}} </th>
                    <th scope="col"> {{ ucwords('cantidad')}} </th>
                    <th scope="col"> {{ ucwords('precio')}} </th>
                    <th>Acción</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($products as $product)
                    <tr>
                      <td>
                        {{$product->code_product}}
                      </td>
                      <td>
                        {{$product->serial_product}}
                      </td>
                      <td>
                        {{ ucwords($product->smart_card)}}
                      </td>
                      <td>
                        {{ucwords(ucwords($product->name))}}
                      </td>
                      <td>
                        {{substr($product->description, 0, 25)}}
                      </td>
                      <td>
                        {{$product->quantity}}
                      </td>
                      <td>
                        {{$product->price}}
                      </td>
                      <td>
                        <form action="{{route('product.destroy', $product->id_product)}}" method="POST">
                          <a href="{{route('product.edit', $product->id_product)}}" class="btn btn-primary btn-sm">
                            <img src="{{ asset('assets/img/svg/ic_create_24px.svg') }}" width="18px">
                          </a>
                          @method('DELETE')
                          @csrf
                          <button class="btn btn-danger btn-sm">
                            {{-- <i class="ni ni-fat-remove"></i> --}}
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
                <ul class="pagination justify-content-end mb-0">
                  {{ $products->links() }}
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
@endsection