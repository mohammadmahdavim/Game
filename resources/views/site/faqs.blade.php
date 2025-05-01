@extends('layout.site')
@section('content')
    <!-- Page Title -->
    <section class="page-title-wrap" data-rjs="2">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-title" data-animate="fadeInUp" data-delay="1.2">
                        <h2>FAQS</h2>
                        <ul class="list-unstyled m-0 d-flex">
                            <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
                            <li><a href="#">FAQS</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Page Title -->

    <!-- Services -->
    <section class="pt-120 pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="faq pb-50" data-animate="fadeInUp" data-delay=".1">
                        <div class="section-title">
                            <h2>Frequently Asked Questions</h2>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some</p>
                        </div>
                        <div class="accordion" id="accordionFaq">
                            @foreach($faqs as $faq)
                                <div class="single-faq">
                                    <div class="faq-title d-flex align-items-center">
                                        <h3 class="h5" data-toggle="collapse" data-target="#collapse{{$faq->id}}"
                                            aria-expanded="false" aria-controls="collapse{{$faq->id}}">{{$faq->question}}</h3>
                                    </div>
                                    <div id="collapse{{$faq->id}}" class="collapse" data-parent="#accordionFaq">
                                        <div class="faq-answer">
                                            <p><span>Ans: </span>{{$faq->answer}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Services -->

@endsection
