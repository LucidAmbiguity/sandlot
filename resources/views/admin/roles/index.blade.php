<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles Management Area.') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        @foreach ($roles as $id => $role)
                             <x-delete-item :id="$id" :item="$role" route="roles"/>
                        @endforeach
                    </div>
                    <form action="{{route('roles.store')}} " method="post" class="my-4">
                    @csrf
                        <div class="mb-4 text-gray-900">
                            <label for="role" class="sr-only">Role</label>
                             <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Role</button>
                            <input type="text" name="role" id="role" class="bg-gray-100 border-2 w-50 p-4 rounded-lg @error('role') border-red-500 @enderror" placeholder="New Role">

                            @error('role')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div >

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

