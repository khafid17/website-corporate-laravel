@extends('layouts.admin')

@section('main-content')

  @if(Session::has('success'))
  <div class="alert alert-success" role="alert">
    {{ Session('success') }}
  </div> 
  @endif

  <form action="/files" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
  <div class="col-lg-12 order-lg-1">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Dokumen</h6>
        </div>
    <div class="card-body">
      <div class="form-group">
        <label>Title</label>
      <input  type="text" name="title" placeholder="title" class="form-control">
    </div>
    <div class="form-group">
      <label>Description</label>
      <input  type="text" name="description" placeholder="description" class="form-control">
    </div>
    <div class="form-group">
      <label></label>
      <input  type="file" name="file" >
    </div>
    <div class="form-group">
      <label></label>
      <input  type="submit" name="submit"  class="btn btn-primary"">
    </div>
  </form>
           

        </div>
    </div>
</div>
@endsection