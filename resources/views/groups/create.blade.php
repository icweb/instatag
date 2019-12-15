@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials.alerts')
            <div class="card">
                <div class="card-header">Create Group</div>
                <div class="card-body">
                    <form action="{{ route('groups.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Group Name</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', '') }}">
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
