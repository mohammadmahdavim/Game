@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h1>Services</h1>

            <a href="{{ route('panel.services.create') }}" class="btn btn-success mb-3">Add New</a>

            <table class="table table-bordered table-hover">
                <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Little Description</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($services as $index => $service)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $service->title }}</td>
                        <td>{{ $service->little_description }}</td>
                        <td>
                            <a href="{{ route('panel.services.show', $service) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('panel.services.edit', $service) }}" class="btn btn-sm btn-primary">Edit</a>

                            <form action="{{ route('panel.services.destroy', $service) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection
