@extends('layout.site')
@section('content')
    <!-- Page Title -->
    <section class="page-title-wrap" data-rjs="2">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-title" data-animate="fadeInUp" data-delay="1.2">
                        <h2>Services</h2>
                        <ul class="list-unstyled m-0 d-flex">
                            <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
                            <li><a href="#">All services</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Page Title -->

    <!-- Services -->
    <section class="pt-120 pb-90">
        <div class="container">
            <div class="row">
                @foreach($services as $service)
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-service text-center" data-animate="fadeInUp" data-delay=".1">
                            <h4>{{$service->title}}</h4>
                            <p>{{$service->little_description}}</p>
                            <a href="/services/{{$service->id}}"> More <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </section>
    <!-- End of Services -->

@endsection
