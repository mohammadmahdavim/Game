@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h3>{{ $faq->question }}</h3>
            </div>
            <div class="card-body">
                <p><strong>Answer:</strong> {{ $faq->answer }}</p>
                <p><strong>Order:</strong> {{ $faq->order }}</p>
                <p><strong>Status:</strong> {{ $faq->is_active ? 'Active' : 'Inactive' }}</p>
                <a href="{{ route('panel.faqs.index') }}" class="btn btn-secondary mt-3">← Back</a>
            </div>
        </div>    </div>
@endsection
