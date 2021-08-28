<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ROLE Assignment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    individual role view <strong>{{$role->name}}</strong>
                    <div class="my-4">
                        <ul>
                        @forelse ($users as $user)
                            <li class="mr-1 bg-gray-100 even:bg-gray-300 flex items-center text-left">
                                <a href="#" class="flex-1">{{$user->name}}</a>
                                <span class="flex-1 ">{{$user->email}}</span>

                                <x-delete-button class="flex-1 text-right" :id="$role->id" :disabled="auth()->user()->cannot('manage-roles')" :user="$user->id"  route="assignRole"/>


                            </li>

                        @empty
                            <li class="mr-1 bg-gray-100"> This Role is Not Assigned </li>
                        @endforelse
                        </ul>
                    </div>
                    @can('manage-roles')

                    <form action="{{route('assignRole.update',$role->name)}} " method="post" class="my-4">
                        @csrf
                        @method('put')
                        <div class="mb-4 text-gray-900">
                            <label for="user">Choose a user:</label>

                            <select name="user" id="user">

                                @forelse ($usersNot as $user)
                                    <option value="{{$user->id}}"><span class="font-bold">{{$user->name}}</span> {{$user->email}}</option>
                                @empty
                                    <option value="empty"><span class="font-bold">Empty</option>
                                @endforelse
                            </select>

                            <x-button class="ml-4"> {{ __('Assign') }}</x-button>
                        </div>
                        <div >

                        </div>
                    </form>
                    @endcan

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
