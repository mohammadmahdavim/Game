@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h3>{{ $testimonial->name }}</h3>
            </div>
            <div class="card-body">
                <p><strong>Testimonial:</strong> {{ $testimonial->testimonial }}</p>
                <p><strong>Position:</strong> {{ $testimonial->position }}</p>
                <p><strong>Status:</strong> {{ $testimonial->is_active ? 'Active' : 'Inactive' }}</p>
                <a href="{{ route('panel.testimonials.index') }}" class="btn btn-secondary mt-3">← Back</a>
            </div>
        </div>
    </div>
@endsection
