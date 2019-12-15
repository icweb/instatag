@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card mb-2">
                <div class="card-body">
                    @foreach($groups as $group)
                        <label for="Check{{ $group->id }}">
                            <input type="checkbox" data-tags="{{ implode(',', $group->hashtags()->select('hashtag')->get()->pluck('hashtag')->toArray()) }}" id="Check{{ $group->id }}" class="group-check" onclick="Dashboard.generateResults()"> {{ $group->title }}
                        </label><br>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <textarea name="results" id="results" cols="30" rows="50" class="form-control"></textarea>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    <script type="text/javascript">
        const Dashboard = {

            generateResults: function() {

                let results = '';
                const checked = $('.group-check:checked');

                for(let x = 0; x < checked.length; x++)
                {
                    const checkedValue = checked[x].getAttribute('data-tags').split(',');

                    for(let y = 0;  y < checkedValue.length; y++)
                    {
                        results += ('#' + checkedValue[y] + ' ');
                    }
                }

                $('#results').val(results);
            }

        };
    </script>
@stop
