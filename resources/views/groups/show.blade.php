@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('groups.index') }}">Groups</a> > {{ $group->title }}
                    <div class="float-right">
                        <a href="{{ route('groups.edit', $group) }}" class="btn btn-warning btn-sm">
                            <i class="fad fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('groups.destroy', $group) }}" method="POST" style="display:inline;margin-left: 5px;">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fad fa-trash"></i> Delete</button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table mb-0">
                        <tbody>
                        @foreach($group->hashtags as $hashtag)
                            <tr>
                                <td><i class="far fa-hashtag"></i> {{ $hashtag->hashtag }}</td>
                                <td class="text-right">
                                    <a href="{{ route('hashtags.edit', $hashtag) }}">Edit</a>
                                </td>
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
