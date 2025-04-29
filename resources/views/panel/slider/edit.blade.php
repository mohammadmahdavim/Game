@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            @include('include.errors')

            <h3>Edit Slider</h3>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('panel.slider.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $slider->title) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="5" required>{{ old('description', $slider->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Image (1920x630)</label>
                    <input type="file" name="image" class="form-control">
                    @if($slider->image)
                        <img src="{{ asset($slider->image) }}" class="mt-2 img-fluid" style="max-height:150px;">
                    @endif
                </div>

                <button class="btn btn-success">Update Slider</button>
            </form>
        </div>
    </div>
@endsection
