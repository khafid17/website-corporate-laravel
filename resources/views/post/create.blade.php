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
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Berita</h6>
        </div>
    <div class="card-body">
  <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
      <label>Judul</label>
      <input type="text" class="form-control" name="judul">
  </div>
  <div class="form-group">
      <label>Kategori</label>
      <select class="form-control" name="category_id">
      	<option value="" holder>Pilih Kategori</option>
      	@foreach($category as $result)
      	<option value="{{ $result->id }}">{{  $result->name }}</option>
      	@endforeach
      </select>
  </div>
  <div class="form-group">
      <label>Pilih Tags</label>
      <select class="form-control select2" multiple="" name="tags[]">
          @foreach($tags as $tag)
          <option value="{{ $tag->id }}">{{ $tag->name }}</option> 
          @endforeach
      </select>
  </div>
  <div class="form-group">
      <label>Konten</label>
      <textarea class="form-control" name="content" id="editor1" cols="30" rows="10"></textarea>
      {{-- <textarea class="form-control select" name="content" id="body" cols="30"  rows="10"></textarea> --}}
  </div>
  <div class="form-group">
      <label>Thumbnail</label>
      <input type="file" name="gambar" class="form-control">
  </div>

  <div class="form-group">
      <button class="btn btn-primary btn-block">Simpan Post</button>
  </div>

  </form>
        </div>
    </div>
</div>
{{-- <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script> --}}
<script src="//cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script >
//   CKEDITOR.replace( 'content' );

</script>

@endsection