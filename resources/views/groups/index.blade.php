@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Groups
                    <a href="{{ route('groups.create') }}" class="btn btn-success btn-sm float-right"><i class="far fa-plus"></i> New Group</a>
                </div>

                <div class="card-body">
                    <table class="table mb-0">
                        <tbody>
                            @foreach($groups as $group)
                                <tr>
                                    <td>
                                        <a href="{{ route('groups.show', $group) }}"><i class="far fa-hashtag"></i> {{ $group->title }}</a>

                                    </td>
                                    <td><i class="fad fa-tags"></i> {{ $group->hashtags()->count() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
