@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials.alerts')
            <div class="card">
                <div class="card-header">
                    Edit Hashtag
                    <form action="{{ route('hashtags.destroy', ['hashtag' => $hashtag]) }}" method="POST" style="display:inline;margin-left: 5px;">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm float-right"><i class="fad fa-trash"></i> Delete</button>
                    </form>
                </div>
                <div class="card-body">
                    <form action="{{ route('hashtags.update', ['hashtag' => $hashtag]) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="title">Hashtag</label>
                            <input type="text" class="form-control" id="hashtag" name="hashtag" value="{{ old('hashtag', $hashtag->hashtag) }}">
                        </div>
                        <div class="form-group">
                            <label for="title">Priority</label>
                            <input type="text" class="form-control" id="priority" name="priority" value="{{ old('priority', $hashtag->priority) }}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
