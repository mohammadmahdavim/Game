@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h2>Testimonials</h2>
            <a href="{{ route('panel.testimonials.create') }}" class="btn btn-success mb-3">Add New Testimonial</a>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered table-hover">
                <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Testimonial</th>
                    <th>Position</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($testimonials as $index => $testimonial)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $testimonial->name }}</td>
                        <td>{{ Str::limit($testimonial->testimonial, 50) }}</td>
                        <td>{{ $testimonial->position }}</td>
                        <td>{{ $testimonial->is_active ? 'Yes' : 'No' }}</td>
                        <td>
                            <a href="{{ route('panel.testimonials.edit', $testimonial) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('panel.testimonials.destroy', $testimonial) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this Testimonial?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection
