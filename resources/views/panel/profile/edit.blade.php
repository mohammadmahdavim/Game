@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">


            <div class="container mt-5">
                <h3>Update Profile</h3>
                @include('include.errors')
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form method="POST" action="{{ route('panel.profile.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control"
                               value="{{ old('username', $user->username) }}" required>
                    </div>

                    <div class="mb-3">
                        <label>New Password (optional)</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Confirm New Password</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>

                    <button class="btn btn-success">Update Profile</button>
                </form>
            </div>
        </div>
    </div>
@endsection
