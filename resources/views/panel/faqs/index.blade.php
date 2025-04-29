@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h2>FAQs</h2>
            <a href="{{ route('panel.faqs.create') }}" class="btn btn-success mb-3">Add New FAQ</a>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered table-hover">
                <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Order</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($faqs as $index => $faq)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $faq->question }}</td>
                        <td>{{ Str::limit($faq->answer, 50) }}</td>
                        <td>{{ $faq->order }}</td>
                        <td>{{ $faq->is_active ? 'Yes' : 'No' }}</td>
                        <td>
                            <a href="{{ route('panel.faqs.edit', $faq) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('panel.faqs.destroy', $faq) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this FAQ?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection
