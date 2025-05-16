@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            @include('include.errors')

            <h2>Edit Intro</h2>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form method="POST" enctype="multipart/form-data" action="{{ route('panel.intro.update') }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" id="editor" class="form-control">{{ old('description', $intro->description) }}</textarea>
                </div>


                <button type="submit" class="btn btn-primary">Update Intro</button>
            </form>
        </div>
    </div>
@endsection
