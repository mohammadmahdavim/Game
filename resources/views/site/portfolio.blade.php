@extends('layout.site')



@section('content')

    <!-- Page Title -->
    <section class="page-title-wrap" data-rjs="2">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-title" data-animate="fadeInUp" data-delay="1.2">
                        <h2>{{ $portfolio->title }}</h2>
                        <ul class="list-unstyled m-0 d-flex">
                            <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
                            <li><a href="/portfolios">All portfolios</a></li>
                            <li style="color: black">{{ $portfolio->title }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Page Title -->

    <!-- Single Service -->
    <section class="pt-120 pb-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="portfolio-single text-center">
                        <div>
                            <img
                                style="width: 75%; height: auto; object-fit: cover; max-height: 600px;"
                                @if($portfolio->image)
                                    src="{{ asset($portfolio->image)}}"
                                @else
                                    src="site/img/products/product3.jpg"
                                @endif
                                data-rjs="2"
                                alt="">
                        </div>
                        <br>
                        @if($portfolio->link && $portfolio->link_title)
                            <p>
                                <a href="{{ $portfolio->link }}" target="_blank" class="portfolio-link">
                                    <i class="fa fa-external-link"></i> {{ $portfolio->link_title }}
                                </a>
                            </p>
                        @endif
                        <h2>{{ $portfolio->title }}</h2>

                        <p>{{ $portfolio->little_description }}</p>
                        <p>{!! $portfolio->description !!}</p>

                        <a href="/portfolios" class="back-btn" style="color: #60c2a4 !important;">
                            Back to all portfolios
                        </a>

                    </div>
                </div>

            </div>
        </div>

<br>
    </section>
    <!-- End of Single Service -->

@endsection
