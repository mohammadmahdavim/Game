@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            @include('include.errors')

            <h2>{{ isset($testimonial) ? 'Edit' : 'Create' }} Testimonial</h2>

            <form method="POST" enctype="multipart/form-data" action="{{ isset($testimonial) ? route('panel.testimonials.update', $testimonial) : route('panel.testimonials.store') }}">
                @csrf
                @if(isset($testimonial)) @method('PUT') @endif

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $testimonial->name ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Testimonial</label>
                    <textarea name="testimonial" class="form-control">{{ old('testimonial', $testimonial->testimonial ?? '') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Position</label>
                    <input type="text" name="position" class="form-control" value="{{ old('position', $testimonial->position ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Image(100*100)</label>
                    <input type="file" name="image" class="form-control">
                    @if(isset($testimonial) && $testimonial->image)
                        <img src="{{ asset($testimonial->image) }}" width="100" class="mt-2">
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label">Active</label>
                    <select name="is_active" class="form-select">
                        <option value="1" {{ old('is_active', $testimonial->is_active ?? 1) == 1 ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ old('is_active', $testimonial->is_active ?? 1) == 0 ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">{{ isset($testimonial) ? 'Update' : 'Create' }} Testimonial</button>
                <a href="{{ route('panel.testimonials.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
