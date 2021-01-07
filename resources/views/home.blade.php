@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card mb-2">
                <div class="card-body">
                    @foreach($groups as $group)
                        <label for="Check{{ $group->id }}">
                            <input type="checkbox" data-tags="{{ implode(',', $group->hashtags()->select('hashtag')->get()->pluck('hashtag')->toArray()) }}" id="Check{{ $group->id }}" class="group-check" onclick="Dashboard.generateTags()"> {{ $group->title }}
                        </label><br>
                    @endforeach
                        <hr>
                        <label for="CheckForIncludingBullets">
                            <input checked type="checkbox" id="CheckForIncludingBullets" class="bullet-check" onclick="Dashboard.generateTags()"> Include Bullets & Caption
                        </label><br>
                        <label for="CheckForPriorityInclusion">
                            <input checked type="checkbox" id="CheckForPriorityInclusion" class="priority-inclusion-check" onclick="Dashboard.generateTags()"> Remove Tags Over 30
                        </label><br>
                        <div id="removedTags" class="text-danger"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <button class="btn btn-sm btn-success float-right" type="button" onclick="Dashboard.copyToClipboard()">Copy</button>
                    <label for="">Total Tags: <b id="tag-count" class="text-danger">0</b></label>
                    <br><br>
                    <textarea name="results" id="results" cols="30" rows="20" class="form-control" readonly></textarea>
                </div>
            </div>
        </div>
    </div>
</div>
@foreach($groups as $group)
    @foreach($group->hashtags as $hashtag)
        <input type="hidden" class="hidden-tag" data-group="Check{{ $group->id }}" data-tag="{{ $hashtag->hashtag }}" data-priority="{{ $hashtag->priority }}">
    @endforeach
@endforeach
@endsection

@section('footer')
    <script type="text/javascript">
        const Dashboard = {

            compiledTags: [],
            removedTags: [],

            compileTags(){

                // Get all the hidden fields from the DOM
                const hiddenTags = $('.hidden-tag');

                // Clear out tags each time they are compiled
                Dashboard.compiledTags = [];
                Dashboard.removedTags = [];

                // Loop through each field and store to local
                for(let a = 0; a < hiddenTags.length; a++)
                {
                    Dashboard.compiledTags.push({
                        group: hiddenTags[a].getAttribute('data-group'),
                        tag: hiddenTags[a].getAttribute('data-tag'),
                        priority: hiddenTags[a].getAttribute('data-priority'),
                        checked: $('#' + hiddenTags[a].getAttribute('data-group')).is(':checked')
                    });
                }
            },

            generateTags(){

                Dashboard.compileTags();

                // Get only the tags that are checked
                const checkedTags = Dashboard.compiledTags.filter((tag) => {
                    return tag.checked;
                });

                // The results to be pasted into the Textarea
                let plaintextResults = '';

                // Loop through all checked tags
                for(let b = 0; b < checkedTags.length; b++)
                {
                    // Add the result to the textarea
                    plaintextResults += '#' + checkedTags[b].tag + ' ';
                }

                // Empty out "Removed Tags" section
                $('#removedTags').html('');

                // See if we need to cut off tags after 30
                if($('.priority-inclusion-check').is(':checked') && checkedTags.length > 30)
                {
                    // Store the tags in a new variable, sorted by their priority
                    let checkedTagsSortedByPriority = checkedTags.sort((a, b) => ((+a.priority) < (+b.priority)) ? 1 : -1);

                    // Remove the tags
                    for(let c = checkedTagsSortedByPriority.length - 1; c >= 30; c--)
                    {
                        Dashboard.removedTags.push('#' + checkedTagsSortedByPriority[c].tag);
                        plaintextResults = plaintextResults.replace('#' + checkedTagsSortedByPriority[c].tag, '').replace('  ', ' ');
                    }

                    // Populate the tags that were removed
                    $('#removedTags').html('<hr><b>Removed Tags:</b><br> ' + Dashboard.removedTags.join(','));

                    // Update the "Total Tags" count
                    $('#tag-count').attr('class', 'text-success').html(30);
                }
                else if(checkedTags.length > 30 || checkedTags.length < 1)
                {
                    $('#tag-count').attr('class', 'text-danger').html(checkedTags.length);
                }
                else if(checkedTags.length <= 30 && checkedTags.length > 1)
                {
                    $('#tag-count').attr('class', 'text-success').html(checkedTags.length);
                }
                else
                {
                    $('#tag-count').attr('class', 'text-primary').html(checkedTags.length);
                }

                // Add bullets
                if($('.bullet-check').is(':checked'))
                {
                    plaintextResults = 'Caption\n•\n' +
                        '•\n' +
                        '•\n' +
                        '•\n' +
                        '•\n' + plaintextResults;
                }

                // Store the results to the text area
                $('#results').val(plaintextResults);

            },

            copyToClipboard(){

                /* Get the text field */
                var copyText = document.getElementById("results");

                /* Select the text field */
                copyText.select();
                copyText.setSelectionRange(0, 99999); /* For mobile devices */

                /* Copy the text inside the text field */
                document.execCommand("copy");

            }

        };
    </script>
@stop
