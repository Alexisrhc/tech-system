@extends('layouts.appAdmin')

@section('content')
	<input type="text" value="">
	<div class="row">
        <div class="col">
        <div class="card shadow">
          <div class="card-header border-0">
            <h3 class="mb-0">{{ucwords('actividad de: ') }} {{ ucwords($activitys[0]->nameUser) }} {{ ucwords($activitys[0]->lastnameUser) }}</h3>
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                  <tr>
                    <th scope="col">{{ucwords('item')}}</th>
                    <th scope="col">{{ucwords('actividad')}}</th>
                    <th scope="col">{{ucwords('fecha')}}</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($activitys as $key => $activity)
                    <tr>
                      <td>
                        {{$key +1}}
                      </td>
                      <td>
                        {{$activity->activity}}
                      </td>
                      <td>
                        {{substr($activity->created_at, 0, 25)}}
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-center mb-0">
                  {{ $activitys->links() }}
                </ul>
              </nav>
            </div>
          </div>
        </div>
    </div>
@endsection