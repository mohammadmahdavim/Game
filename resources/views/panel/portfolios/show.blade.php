@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h3>{{ $portfolio->title }}</h3>
            </div>
            <div class="card-body">
                <p><strong>Short Description:</strong> {{ $portfolio->short_description }}</p>
                <p><strong>Description:</strong> {!! $portfolio->description !!} }</p>
                @if($portfolio->link)
                    <p><strong>Link:</strong> <a href="{{ $portfolio->link }}" target="_blank">{{ $portfolio->link }}</a></p>
                @endif
                @if($portfolio->image)
                    <img src="{{ asset($portfolio->image) }}">
                @endif
                <br>
                <a href="{{ route('panel.portfolios.index') }}" class="btn btn-secondary mt-3">← Back</a>
            </div>
        </div>
    </div>
@endsection
