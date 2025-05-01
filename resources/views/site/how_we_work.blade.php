@extends('layout.site')
@section('content')
    <!-- Page Title -->
    <section class="page-title-wrap" data-rjs="2">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-title" data-animate="fadeInUp" data-delay="1.2">
                        <h2>How We Wrok</h2>
                        <ul class="list-unstyled m-0 d-flex">
                            <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
                            <li><a href="#">How We Wrok</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Page Title -->


    <section class="pt-120 pb-55">
        <div class="container">
            <div class="row align-items-center pb-80">
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="text-center" data-animate="fadeInUp" data-delay=".1">
                        <img src="{{ asset($how->image) }}" width="425" height="237" alt="" data-rjs="2">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="number-one-content" data-animate="fadeInUp" data-delay=".5">
                        <h2 class="mb-3">How We Wrok</h2>
                        <p>
                            {{$how->description}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
