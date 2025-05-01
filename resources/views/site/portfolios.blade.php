@extends('layout.site')
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

    <!-- Services -->
    <section class="pt-120 pb-90">
        <div class="container">
            <div class="row">
                @foreach($portfolios  as $service)

                    <div class="col-sm-6">
                        <div class="single-product mb-55" data-animate="fadeInUp" data-delay=".1">

                            <img width="550" height="448" @if($service->image) src="{{ asset($service->image)}}"
                                 @else src="site/img/products/product3.jpg" @endif data-rjs="2" alt="">
                            <br>
                            <h4>{{$service->title}}</h4>
                            <br>
                            <span>{{$service->short_description}}</span>
                            <br>
                            <a href="#"> More <i class="fa fa-angle-right"></i></a>

                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </section>
    <!-- End of Services -->

@endsection
