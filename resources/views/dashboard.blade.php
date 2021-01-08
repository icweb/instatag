<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div>
        <div class="px-4 py-5 sm:px-6">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <div class="mt-1 max-w-2xl text-sm text-gray-500">
                        @foreach($groups as $group)
                            <div class="flex items-center">
                                <input type="checkbox" data-tags="{{ implode(',', $group->hashtags()->select('hashtag')->get()->pluck('hashtag')->toArray()) }}" id="Check{{ $group->id }}" class="group-check h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" onclick="Dashboard.generateTags()">
                                <label class="ml-2 block text-sm text-gray-900" for="Check{{ $group->id }}">
                                    {{ $group->title }}
                                </label>
                            </div>
                        @endforeach
                        <br>
                        <div class="border-t border-gray-200">
                            <br>
                            <div class="flex items-center">
                                <input checked type="checkbox" id="CheckForIncludingBullets" class="bullet-check h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" onclick="Dashboard.generateTags()">
                                <label class="ml-2 block text-sm text-gray-900" for="CheckForIncludingBullets">Include Bullets & Caption</label>
                            </div>
                            <div class="flex items-center">
                                <input checked type="checkbox" id="CheckForPriorityInclusion" class="priority-inclusion-check h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" onclick="Dashboard.generateTags()">
                                <label class="ml-2 block text-sm text-gray-900" for="CheckForPriorityInclusion">Remove Tags Over 30</label>
                            </div>
                            <br>
                            <hr>
                            <br>
                            <label for="">Total Tags: <b id="tag-count" class="text-red-500">0</b></label>
                            <br>
                            <div class="break-words">
                                <br>
                                <span id="removedTags" class="text-red-600 overflow-wrap"></span>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="mt-1 max-w-2xl text-sm text-gray-500">
                        <button class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" type="button" onclick="Dashboard.copyToClipboard()">Copy</button>
                        <br><br>
                        <textarea name="results" id="results" cols="30" rows="10" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" readonly></textarea>
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
    <script type="text/javascript">
        const Dashboard = {

            compiledTags: [],
            removedTags: [],

            compileTags(){

                // Get all the hidden fields from the DOM
                const hiddenTags = document.getElementsByClassName('hidden-tag');

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
                        checked: document.getElementById(hiddenTags[a].getAttribute('data-group')).checked
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
                document.getElementById('removedTags').innerHTML = '';

                // See if we need to cut off tags after 30
                if(document.getElementById('CheckForPriorityInclusion').checked && checkedTags.length > 30)
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
                    document.getElementById('removedTags').innerHTML = '<b>Removed Tags:</b><br> ' + Dashboard.removedTags.join(',');

                    // Update the "Total Tags" count
                    document.getElementById('tag-count').innerHTML = 30;
                    document.getElementById('tag-count').setAttribute('class', 'text-green-500');
                }
                else if(checkedTags.length > 30 || checkedTags.length < 1)
                {
                    document.getElementById('tag-count').innerHTML = checkedTags.length;
                    document.getElementById('tag-count').setAttribute('class', 'text-red-500');
                }
                else if(checkedTags.length <= 30 && checkedTags.length > 1)
                {
                    document.getElementById('tag-count').innerHTML = checkedTags.length;
                    document.getElementById('tag-count').setAttribute('class', 'text-green-500');
                }
                else
                {
                    document.getElementById('tag-count').innerHTML = checkedTags.length;
                    document.getElementById('tag-count').setAttribute('class', 'text-blue-500');
                }

                // Add bullets
                if(document.getElementById('CheckForIncludingBullets').checked)
                {
                    plaintextResults = 'Caption\n•\n' +
                        '•\n' +
                        '•\n' +
                        '•\n' +
                        '•\n' + plaintextResults;
                }

                // Store the results to the text area
                document.getElementById('results').value = plaintextResults

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
</x-app-layout>
