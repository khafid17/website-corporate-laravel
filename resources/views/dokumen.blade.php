@extends('master.master')
@section('name', 'dokumen')
@section('content')
    <!-- ======= Our Team Section ======= -->
    <main id="main">
      <!-- ======= Team Section ======= -->
      <section class="team" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold ">Download Dokumen</h4>
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
                          @foreach ($unduh as $key=>$data)
                          <tr>
                              <td>{{ $key + $unduh->firstitem() }}</td>
                              <td>{{$data->title}}</td>
                              <td>{{$data->description}}</td>
                              <td><a href="{{url('storage/'.$data->file)}}">Download</a></td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>
                    {{ $unduh->links() }}
                </div>
                <p>
        {{-- <iframe src="{{url('storage/'.$data->file)}}" style="width: 600px; height: 500px;" frameborder="0"></iframe> --}}

                </p>
            </div>
        </div>
        {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#273036" fill-opacity="1" d="M0,32L60,26.7C120,21,240,11,360,37.3C480,64,600,128,720,160C840,192,960,192,1080,170.7C1200,149,1320,107,1380,85.3L1440,64L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>    --}}
    </section><!-- End Team Section -->    
</main>
@endsection