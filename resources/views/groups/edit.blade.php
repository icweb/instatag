<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Group Name') }}
        </h2>
    </x-slot>
    <div class="px-4 py-5 sm:px-6">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    <small>{{ $group->title }}</small><br>
                    <a href="{{ route('groups.index') }}" class="font-bold text-indigo-600 hover:text-indigo-500">Manage Groups</a> >
                    <a href="{{ route('groups.show', ['group' => $group]) }}" class="font-bold text-indigo-600 hover:text-indigo-500">Edit Group</a> > Edit Group Name
                </h3>
                <br>
                <hr>
                <br>
                <form action="{{ route('groups.update', $group) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="title">Group Name</label>
                        <input type="text" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md" id="title" name="title" value="{{ old('title', $group->title) }}">
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
