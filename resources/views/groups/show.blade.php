<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $group->title }}
        </h2>
    </x-slot>
    <div class="px-4 py-5 sm:px-6">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    <small>{{ $group->title }}</small><br>
                    <a href="{{ route('groups.index') }}" class="font-bold text-indigo-600 hover:text-indigo-500">Manage Groups</a> > Edit Group
                </h3>

                <form action="{{ route('groups.destroy', $group) }}" method="POST" style="display:inline;margin-left: 5px;">
                    <p class="text-sm text-gray-500">
                    @method('DELETE')
                    @csrf
                    <div>
                        <a href="{{ route('hashtags.create', ['group' => $group]) }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            New Tag
                        </a>
                        <a href="{{ route('groups.edit', $group) }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Edit Group Name
                        </a>
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Delete Group
                        </button>
                    </div>
                    </p>
                </form>
            </div>
            <div class="border-t border-gray-200">
                @foreach($group->hashtags as $hashtag)
                    <dl>
                        <div class="bg-{{ $loop->iteration % 2 == 0 ? 'white' : 'gray' }}-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                <a href="{{ route('hashtags.edit', ['hashtag' => $hashtag]) }}" class="font-bold text-indigo-600 hover:text-indigo-500">
                                    {{ $hashtag->hashtag }}
                                </a>
                            </dt>
                        </div>
                    </dl>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
