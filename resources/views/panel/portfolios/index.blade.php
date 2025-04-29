@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h2>Portfolios</h2>
            <a href="{{ route('panel.portfolios.create') }}" class="btn btn-success mb-3">Add New</a>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered table-hover">
                <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Short Description</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($portfolios as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->short_description }}</td>
                        <td>
                            <a href="{{ route('panel.portfolios.edit', $item) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('panel.portfolios.destroy', $item) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this?')">Delete</button>
                            </form>
                            <a href="{{ route('panel.portfolios.show', $item) }}" class="btn btn-sm btn-info">Show</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>


        </div>
    </div>

@endsection
