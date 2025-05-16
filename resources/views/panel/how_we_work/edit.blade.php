@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            @include('include.errors')

            <h2>Edit How We Work</h2>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form method="POST" enctype="multipart/form-data" action="{{ route('panel.how_we_work.update') }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" id="editor" class="form-control">{{ old('description', $howWeWork->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Image(466*436)</label>
                    <input type="file" name="image" class="form-control">
                    @if($howWeWork->image)
                        <img src="{{ asset($howWeWork->image) }}" width="100" class="mt-2">
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update How We Work</button>
            </form>
        </div>
    </div>
@endsection
