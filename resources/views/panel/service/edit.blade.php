@extends('layout.main')

@section('content')
    <div class="card">
        <div class="card-body">
            @include('include.errors')

            <h1>{{ isset($service) ? 'Edit' : 'Create' }} Service</h1>
            <form method="POST" enctype="multipart/form-data"
                  action="{{ isset($service) ? route('panel.services.update', $service) : route('panel.services.store') }}">
                @csrf
                @if(isset($service))
                    @method('PUT')
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <label>Title:</label>
                        <input class="form-control" type="text" name="title"
                               value="{{ old('title', $service->title ?? '') }}"><br>
                    </div>
                    <div class="col-md-12">
                        <label>Little Description:</label>
                        <input class="form-control" type="text" name="little_description"
                               value="{{ old('little_description', $service->little_description ?? '') }}"><br>

                    </div>
                    <div class="col-md-12">
                        <label>Icon:</label>
                        <input class="form-control" type="file" name="icon"><br>
                    </div>
                    @if($service->icon)
                        <img src="/{{ $service->icon }}" style="width: 40px;height: 40px" alt="{{ $service->title }}">
                    @endif
                    <div class="col-md-12">
                        <label>Description:</label>
                        <textarea class="form-control" id="editor"
                                  name="description">{{ old('description', $service->description ?? '') }}</textarea><br>

                    </div>
                    {{--    <div class="col-md-12">--}}
                    {{--        <label>Icon:</label>--}}
                    {{--        <input class=form-control type="text" name="icon" value="{{ old('icon', $service->icon ?? '') }}"><br>--}}

                    {{--    </div>--}}
                </div>


                <button type="submit"
                        class="btn btn-success btn-block">{{ isset($service) ? 'Update' : 'Create' }}</button>
            </form>
        </div>
    </div>
@endsection
