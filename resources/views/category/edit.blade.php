@extends('layouts.admin')

@section('main-content')

  @if(count($errors)>0)
  	@foreach($errors->all() as $error)
  	<div class="alert alert-danger" role="alert">
      {{ $error }}
	</div>  		
  	@endforeach
  @endif

  @if(Session::has('success'))
  	<div class="alert alert-success" role="alert">
      {{ Session('success') }}
	</div> 
  	
  @endif
  <div class="col-lg-12 order-lg-1">
    <div class="card shadow mb-4">
    <div class="card-body">
  <form action="{{ route('category.update' , $category->id ) }}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-group">
      <label>Kategori</label>
      <input type="text" class="form-control" name="name" value="{{ $category->name }}">
  </div>

  <div class="form-group">
      <button class="btn btn-primary btn-block">Update Kategori</button>
  </div>
  </div>
  </div>
</div>

  </form>


@endsection