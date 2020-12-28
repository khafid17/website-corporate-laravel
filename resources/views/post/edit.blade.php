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
  <form action="{{ route('post.update', $post->id ) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="form-group">
      <label>Judul</label>
      <input type="text" class="form-control" name="judul" value="{{ $post->judul }}">
  </div>
  <div class="form-group">
      <label>Kategori</label>
      <select class="form-control" name="category_id">
      	<option value="" holder>Pilih Kategori</option>
      	@foreach($category as $result)
      	<option value="{{ $result->id }}"
      	@if($result->id == $post->category_id)
      		selected
      	@endif
      		>{{  $result->name }}</option>
      	@endforeach
      </select>
  </div>
  <div class="form-group">
      <label>Pilih Tags</label>
      <select class="form-control select2" multiple="" name="tags[]">
          @foreach($tags as $tag)
          <option value="{{ $tag->id }}"
          @foreach($post->tags as $value)
          	@if($tag->id == $value->id)
          	selected
          	@endif
          @endforeach       	
          	>{{ $tag->name }}</option> 
          @endforeach
      </select>
  </div>
  <div class="form-group">
      <label>Konten</label>
      <textarea class="form-control" name="content" id="editor1">{{ $post->content }}</textarea>
  </div>
  <div class="form-group">
      <label>Thumbnail</label>
      <input type="file" name="gambar" class="form-control">
  </div>

  <div class="form-group">
      <button class="btn btn-primary btn-block">Update Kategori</button>
  </div>
  </div>
  </div>
</div>

  </form>

@endsection