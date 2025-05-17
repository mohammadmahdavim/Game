@extends('layout.site')
<style>
    .service-icon-img {
        width: 42px;
        height: 42px;
        object-fit: contain;
        border-radius: 6px;
    }

    .service-card {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        padding: 30px 20px;
        background: #fff;
        border-radius: 10px;
        transition: all 0.3s ease;
        text-decoration: none;
        color: inherit;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        height: 100%;
    }

    .service-card:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        transform: translateY(-5px);
        color: #007bff;
    }

    .service-icon i {
        color: #007bff;
        transition: color 0.3s;
    }

    .service-card:hover .service-icon i {
        color: #0056b3;
    }
</style>

@section('content')
    <!-- Page Title -->
    <section class="page-title-wrap" data-rjs="2">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-title" data-animate="fadeInUp" data-delay="1.2">
                        <h2>Portfolio</h2>
                        <ul class="list-unstyled m-0 d-flex">
                            <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
                            <li><a href="#">Portfolio</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Page Title -->


    @php
        $count = count($portfolios);
        $columns =  3;
        $colClass = 'col-lg-' . (12 / $columns) . ' col-sm-6';
    @endphp



    <section class="pt-120 pb-90">
        <div class="container">
            <div class="row">
                @foreach($portfolios as $service)
                    <div class="{{ $colClass }} my-3">
                        <a href="/portfolio/{{$service->id}}" class="single-service text-center service-card"
                           data-animate="fadeInUp" data-delay=".1">
                            <div class="service-icon mb-3">
                                <img style="width: 330!important;height: 330!important;"
                                     @if($service->image)
                                         src="{{ asset($service->image)}}"
                                     @else src="site/img/products/product3.jpg"
                                     @endif data-rjs="2" alt="">
                            </div>

                            <h4>{{ $service->title }}</h4>
                            <p>{{ $service->short_description }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
