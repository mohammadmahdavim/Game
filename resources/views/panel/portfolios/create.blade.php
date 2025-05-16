@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            @include('include.errors')

            <h2>{{ isset($portfolio) ? 'Edit' : 'Create' }} Portfolio</h2>

            <form method="POST" enctype="multipart/form-data"
                  action="{{ isset($portfolio) ? route('panel.portfolios.update', $portfolio) : route('panel.portfolios.store') }}">
                @csrf
                @if(isset($portfolio)) @method('PUT') @endif

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $portfolio->title ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Short Description</label>
                    <input type="text" name="short_description" class="form-control" value="{{ old('short_description', $portfolio->short_description ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" id="editor" class="form-control">{{ old('description', $portfolio->description ?? '') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Link_title</label>
                    <input type="text" name="link_title" class="form-control" value="{{ old('link_title', $portfolio->link_title ?? '') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Link</label>
                    <input type="url" name="link" class="form-control" value="{{ old('link', $portfolio->link ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Image(800*415)</label>
                    <input type="file" name="image" class="form-control">
                    @if(isset($portfolio) && $portfolio->image)
                        <img src="{{ asset('storage/' . $portfolio->image) }}" alt="Image" class="mt-2" height="100">
                    @endif
                </div>

                <button class="btn btn-primary">{{ isset($portfolio) ? 'Update' : 'Create' }}</button>
                <a href="{{ route('panel.portfolios.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
