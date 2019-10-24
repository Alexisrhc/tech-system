@extends('layouts.appAdmin')

@section('content')
    <div class="row">
        <div class="col-md-12 text-right">
        	<a href="{{ route('store.create') }}" class="btn btn-sm btn-primary">
        		{{ucwords('agregar tienda')}}
            <img src="{{ asset('assets/img/svg/store_white.svg') }}" width="18px" class="ml-2 mr-2">
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
                <h3 class="col-sm-12 col-md-9">Lista De tiendas</h3>
                <div class="col-sm-10 col-md-3">
                  <form  method="GET" action="{{ route('store') }}">
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
                    <th scope="col">{{ucwords('nombre')}}</th>
                    <th scope="col">{{ucwords('telefono')}}</th>
                    <th scope="col">{{ucwords('dirección')}}</th>
                    <th>Acción</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($stores as $store)
                    <tr>
                      <td>
                        {{$store->name}}
                      </td>
                      <td>
                        {{$store->phone}}
                      </td>
                      <td>
                        {{substr(ucwords($store->address), 0, 25)}}
                      </td>
                      <td>
                        <form action="{{route('store.destroy', $store->id_store)}}" method="POST">
                        <a href="{{route('store.edit', $store->id_store)}}" class="btn btn-primary btn-sm">
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
                  {{ $stores->links() }}
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('script')
<script type="module">
  import { common } from './js/common.js';
  $(document).on('click', () => {
    searchBills()
  })
  async function searchBills () {
    let url = {
      url: 'bill',
      data: {
        valueSearch: $('#type_document').val()+$('#bill_search').val()
      }
    }
   let data = await common.getData(url)
   let header = ['id_product','serial_product', 'model', 'name', 'price','quantity', 'add'];
   $('#table_bills').html(common.dynamicTable(header, data))
  }
</script>
@endsection