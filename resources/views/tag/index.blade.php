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
            <a href="{{ route('tag.create') }}" class="btn btn-info float-right">Tambah Tags</a>
            <h4 class="m-0 font-weight-bold text-primary">Data Tags
				
			</h4>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                          <tr>
							<th>No</th>
							<th>Nama Tag</th>
							<th>Action</th>
                          </tr>
                      </thead>
					  <tbody>
						@foreach ($tag as $result => $hasil)
						<tr>
							<td>{{ $result + $tag->firstitem() }}</td>
							<td>{{ $hasil->name }}</td>
							<td>
								<form action="{{ route('tag.destroy', $hasil->id )}}" method="POST">
									@csrf
									@method('delete')
								<a href="{{ route('tag.edit', $hasil->id ) }}" class="btn btn-primary btn-sm">Edit</a>
								<button type="submit" class="btn btn-danger btn-sm">Delete</button>
								</form>
							</td>
						</tr>
						@endforeach
			
					</tbody>
                  </table>
				  {{ $tag->links() }}
              </div>
          </div>
      </div>
@endsection