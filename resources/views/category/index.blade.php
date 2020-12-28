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
		<a href="{{ route('category.create') }}" class="btn btn-info float-right">Tambah Kategori</a>
		<h4 class="m-0 font-weight-bold text-primary">Kategori</h4>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Kategori</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($category as $result => $hasil)
				<tr>
					<td>{{ $result + $category->firstitem() }}</td>
					<td>{{ $hasil->name }}</td>
					<td>
				<form action="{{ route('category.destroy', $hasil->id )}}" method="POST">
				@csrf
				@method('delete')
					<a href="{{ route('category.edit', $hasil->id ) }}" class="btn btn-primary btn-sm">Edit</a>
					<button type="submit" class="btn btn-danger btn-sm">Delete</button>
				</form>
					</td>
					</tr>
				@endforeach
			</tbody>
			</table>
			{{ $category->links() }}
		</div>
	</div>
</div>
@endsection