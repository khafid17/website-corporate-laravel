@extends('master.master')
@section('name', 'post')
@section('content')

<main id="main">
    <section class="blog" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 entries">
            <article class="entry entry-single" class="blog">
              <div class="entry-img">
                <img src="{{$post->gambar}}" alt="" class="img-fluid">
                {{-- <img src="{{ asset(.'/public/uploads/posts/'.$post->gambar) }}" alt="" title=""> --}}
                {{-- <img src="{{route('image.displayImage', $post->gambar)}}" alt ="" title =""> --}}
                <img src="{{ asset( $post->gambar ) }}" class="img-fluid" >       
              </div>
              <h2 class="entry-title">
                <a>{{$post->judul}}</a>
              </h2>
            
              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a ><time datetime="2020-01-01">{{$post->created_at}}</time></a></li>
                </ul>
              </div>

              <div class="entry-content">
                <p>
                   {!!$post->content!!}
                </p>
              </div>
              <div> 

                </div>
            </article><!-- End blog entry -->
          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="">
                  <input type="text">
                  <button type="submit"><i class="icofont-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              <h3 class="sidebar-title">Categories</h3>

              <h3 class="sidebar-title">Recent Posts</h3>
     
              <h3 class="sidebar-title">Tags</h3>

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div><!-- End row -->

      </div><!-- End container -->

    </section><!-- End Blog Section -->
</main>
@endsection
