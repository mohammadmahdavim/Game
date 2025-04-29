@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            @include('include.errors')

            <h2>{{ isset($faq) ? 'Edit' : 'Create' }} FAQ</h2>

            <form method="POST" action="{{ isset($faq) ? route('panel.faqs.update', $faq) : route('panel.faqs.store') }}">
                @csrf
                @if(isset($faq)) @method('PUT') @endif

                <div class="mb-3">
                    <label class="form-label">Question</label>
                    <input type="text" name="question" class="form-control" value="{{ old('question', $faq->question ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Answer</label>
                    <textarea name="answer" class="form-control">{{ old('answer', $faq->answer ?? '') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Order</label>
                    <input type="number" name="order" class="form-control" value="{{ old('order', $faq->order ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Active</label>
                    <select name="is_active" class="form-select">
                        <option value="1" {{ old('is_active', $faq->is_active ?? 1) == 1 ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ old('is_active', $faq->is_active ?? 1) == 0 ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">{{ isset($faq) ? 'Update' : 'Create' }} FAQ</button>
                <a href="{{ route('panel.faqs.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
