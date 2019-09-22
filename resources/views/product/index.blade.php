@extends('layouts.appAdmin')

@section('content')
    <div class="row">
        <div class="col-md-12 text-right">
        	<a href="{{ route('product.create') }}" class="btn btn-sm btn-success">
        		Agregar Producto
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
              <h3 class="mb-0">Lista De Productos</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Serial</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio</th>
                    <th>Acción</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($products as $product)
                    <tr>
                      <td>
                        {{$product->code}}
                      </td>
                      <td>
                        {{ ucwords($product->serial)}}
                      </td>
                      <td>
                        {{ucwords(ucwords($product->name))}}
                      </td>
                      <td>
                        {{substr($product->description, 0, 30)}}
                      </td>
                      <td>
                        {{$product->quantity}}
                      </td>
                      <td>
                        {{$product->price}}
                      </td>
                      <td>
                        <form action="{{route('product.destroy', $product->id_product)}}" method="POST">
                          <a href="{{route('product.edit', $product->id_product)}}" class="btn btn-success btn-sm">
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
                <ul class="pagination justify-content-end mb-0">
                  {{ $products->links() }}
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
@endsection
