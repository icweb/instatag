@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials.alerts')
            <div class="card">
                <div class="card-header">Create Hashtag</div>
                <div class="card-body">
                    <form action="{{ route('hashtags.store') }}" method="POST">
                        @csrf
                        <input type="hidden" id="group" name="group" value="{{ $group->id }}">
                        <div class="form-group">
                            <label for="groupName">Group Name</label>
                            <input type="text" class="form-control" id="groupName" value="{{ $group->title }}" disabled readonly>
                        </div>
                        <div class="form-group">
                            <label for="hashtag">Hashtag</label>
                            <input type="text" class="form-control" id="hashtag" name="hashtag" value="{{ old('title', '') }}">
                        </div>
                        <div class="form-group">
                            <label for="title">Priority</label>
                            <input type="text" class="form-control" id="priority" name="priority" value="{{ old('priority') }}">
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
