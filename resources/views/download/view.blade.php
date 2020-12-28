@extends('layouts.admin')

@section('main-content')

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <a href="{{'/files/create'}}" class="btn btn-info float-right">Tambah Dokumen</a>
            <h4 class="m-0 font-weight-bold text-primary">Download Dokumen</h4>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                          <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Discription</th>
                            <th>Download</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($file as $key=>$data)
                        <tr>
                            <td>{{ $key + $file->firstitem() }}</td>
                            <td>{{$data->title}}</td>
                            <td>{{$data->description}}</td>
                            <td><a href="{{url('storage/'.$data->file)}}">Download</a></td>
                        </tr>
                        @endforeach
                      </tbody>
                  </table>
                  {{ $file->links() }}
              </div>
          </div>
      </div>
        
    @endsection


