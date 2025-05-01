@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h2>Contact Us Messages</h2>

            <form method="GET" class="mb-3">
                <label>Filter by seen:</label>
                <select name="seen" onchange="this.form.submit()" class="form-select w-auto d-inline-block ms-2">
                    <option value="">All</option>
                    <option value="0" {{ request('seen') === '0' ? 'selected' : '' }}>Unseen</option>
                    <option value="1" {{ request('seen') === '1' ? 'selected' : '' }}>Seen</option>
                </select>
            </form>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Company</th>
                    <th>Email</th>
                    <th>Description</th>
                    <th>Seen</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($contacts as $contact)
                    <tr>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->company ?? '-' }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($contact->description, 50) }}</td>
                        <td>
                            @if($contact->seen)
                                <span class="badge bg-success">Seen</span>
                            @else
                                <span class="badge bg-warning text-dark">Unseen</span>
                            @endif
                        </td>
                        <td>
                            @if(!$contact->seen)
                                <form method="POST" action="{{ route('panel.contact_us.seen', $contact) }}" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn btn-sm btn-info">Mark as Seen</button>
                                </form>
                            @endif

                            <form method="POST" action="{{ route('panel.contact_us.destroy', $contact) }}" class="d-inline" onsubmit="return confirm('Delete this message?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No messages found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            {{ $contacts->appends(['seen' => request('seen')])->links("pagination::bootstrap-4") }}

        </div>
    </div>

@endsection
