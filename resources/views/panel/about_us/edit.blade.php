@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            @include('include.errors')

            <h2>Edit About Us</h2>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form method="POST" enctype="multipart/form-data" action="{{ route('panel.about_us.update') }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control">{{ old('description', $aboutUs->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Image(466*436)</label>
                    <input type="file" name="image" class="form-control">
                    @if($aboutUs->image)
                        <img src="{{ asset($aboutUs->image) }}" width="100" class="mt-2">
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update About Us</button>
            </form>
        </div>
    </div>
@endsection
