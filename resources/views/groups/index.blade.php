<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage') }}
        </h2>
    </x-slot>
    <div class="px-4 py-5 sm:px-6">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Manage Groups
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    <br>
                    <a href="{{ route('groups.create') }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"><i class="far fa-plus"></i> New Group</a>
                </p>
            </div>
            <div class="border-t border-gray-200">
                @foreach($groups as $group)
                    <dl>
                        <div class="bg-{{ $loop->iteration % 2 == 0 ? 'white' : 'gray' }}-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                <a href="{{ route('groups.show', $group) }}" class="font-bold text-indigo-600 hover:text-indigo-500">
                                    {{ $group->title }}
                                </a>
                            </dt>
                        </div>
                    </dl>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
