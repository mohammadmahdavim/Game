@extends('layout.site')

<style>
    .service-single {
        background: #fff;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.06);
    }

    .service-single h2 {
        font-size: 28px;
        margin-bottom: 20px;
    }

    .service-single .service-icon-img {
        width: 60px;
        height: 60px;
        object-fit: contain;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .service-single i {
        font-size: 48px;
        color: #007bff;
        margin-bottom: 20px;
    }

    .service-single p {
        font-size: 16px;
        line-height: 1.7;
        color: #444;
    }

    .back-btn {
        margin-top: 30px;
        display: inline-block;
        color: #007bff;
        text-decoration: none;
        font-weight: bold;
        transition: all 0.3s ease;
    }

    .back-btn:hover {
        text-decoration: underline;
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
                        <h2>{{ $service->title }}</h2>
                        <ul class="list-unstyled m-0 d-flex">
                            <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
                            <li><a href="/services">All services</a></li>
                            <li style="color: black">{{ $service->title }}</li>
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
                    <div class="service-single text-center">
                        <div class="service-icon">
                            @if($service->icon)
                                <img src="/{{ $service->icon }}" alt="{{ $service->title }}" class="service-icon-img">
                            @else
                                <i class="fa fa-cogs"></i>
                            @endif
                        </div>

                        <h2>{{ $service->title }}</h2>

                        <p>{{      $service->little_description }}</p>
                        <p>{!! $service->description !!}</p>

                        <a href="/services" class="back-btn"><i class="fa fa-arrow-circle-left"></i> Back to all services</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Single Service -->

@endsection
