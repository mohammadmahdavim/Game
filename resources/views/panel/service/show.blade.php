@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">{{ $service->title }}</h4>
            </div>

            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label fw-bold">Little Description:</label>
                    <p class="form-control-plaintext">{{ $service->little_description }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Description:</label>
                    <p class="form-control-plaintext">{!! $service->description !!}</p>
                </div>

                @if($service->icon)
                    <div class="mb-3">
                        <label class="form-label fw-bold">Icon:</label><br>
                        <img src="{{ asset($service->icon) }}" alt="Icon" style="height: 40px;">
                    </div>
                @endif

                <a href="{{ route('panel.services.index') }}" class="btn btn-secondary mt-3">
                    ← Back to list
                </a>
            </div>
        </div>

    </div>
@endsection
