@extends('layouts.admin')

@section('main-content')

    @if(Session::has('success'))
  	<div class="alert alert-success" role="alert">
      {{ Session('success') }}
	</div> 
	@endif
	
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <a href="{{ route('user.create') }}" class="btn btn-info float-right">Tambah User</a>
            <h4 class="m-0 font-weight-bold text-primary">Data User</h4>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                          <tr>
							<th>No</th>
							<th>Nama User</th>
							<th>Email</th>
							<th>Type</th>
							<th>Action</th>
                          </tr>
                      </thead>
					  <tbody>
						@foreach ($user as $result => $hasil)
						<tr>
							<td>{{ $result + $user->firstitem() }}</td>
							<td>{{ $hasil->name }}</td>
							<td>{{ $hasil->email }}</td>
							<td>
								@if($hasil->tipe)
									<span class="badge badge-info">Administrator</span>
									@else
									<span class="badge badge-warning">Penulis</span>
								@endif
			
							</td>
							<td>
								<form action="{{ route('user.destroy', $hasil->id )}}" method="POST">
									@csrf
									@method('delete')
								<a href="{{ route('user.edit', $hasil->id ) }}" class="btn btn-primary btn-sm">Edit</a>
								<button type="submit" class="btn btn-danger btn-sm">Delete</button>
								</form>
							</td>
						</tr>
						@endforeach
			
					</tbody>
                  </table>
				  {{ $user->links() }}
              </div>
          </div>
      </div>
        
@endsection