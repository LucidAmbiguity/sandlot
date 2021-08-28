<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Permission '.$permission->name.' Only Direct ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <p class="bg-blue-200">User has <strong>{{$permission->name}}</strong> permission</p>
                        <div class="my-4">
                            <ul>
                            @forelse ($usersHas as $user)
                                <li class="mr-1 bg-gray-100 even:bg-gray-300 flex justify-between items-center">
                                    <a href="#">{{$user->name}}</a>
                                    <span>{{$user->email}}</span>
                                    <x-removeRoleUser-button class="flex-1 text-right" :disabled="'true'" :id="$permission->id" :user="$user->id" route="givePermissionToUser"/>
                                </li>

                            @empty
                                <li class="mr-1 bg-gray-100"> This Permission is Not Assigned </li>
                            @endforelse
                            </ul>
                        </div>
                        <div>
                        <p class="bg-blue-200">User has <strong>{{$permission->name}}</strong> permission From Direct Assignment</p>
                        <div class="my-4">
                            <ul>
                            @forelse ($usersDirect as $user)
                                <li class="mr-1 bg-gray-100 even:bg-gray-300 flex justify-between items-center">
                                    <a href="#">{{$user->name}}</a>
                                    <span>{{$user->email}}</span>
                                    <x-removeRoleUser-button class="flex-1 text-right" :disabled="auth()->user()->cannot('manage-permissions')" :id="$permission->id" :user="$user->id" route="givePermissionToUser"/>
                                </li>

                            @empty
                                <li class="mr-1 bg-gray-100"> This Permission is Not Assigned </li>
                            @endforelse
                            </ul>
                        </div>
                        <div>
                        <p class="bg-blue-200">User has <strong>{{$permission->name}}</strong> permission From a Role</p>
                        <div class="my-4">
                            <ul>
                            @forelse ($usersRole as $user)
                                <li class="mr-1 bg-gray-100 even:bg-gray-300 flex justify-between items-center">
                                    <a href="#">{{$user->name}}</a>
                                    <span>{{$user->email}}</span>
                                    <x-removeRoleUser-button class="flex-1 text-right" :disabled="'true'" :id="$permission->id" :user="$user->id" route="givePermissionToUser"/>
                                </li>

                            @empty
                                <li class="mr-1 bg-gray-100"> This Permission is Not Assigned </li>
                            @endforelse
                            </ul>
                        </div>
                        <div>
                        <p class="bg-blue-200">Role has <strong>{{$permission->name}}</strong> permission </p>
                        <div class="my-4">
                            <ul>
                            @forelse ($rolesHas as $role)
                                <li class="mr-1 bg-gray-100 even:bg-gray-300 flex justify-between items-center">
                                    <a href="#">{{$role->name}}</a>

                                    <x-removeRoleRole-button class="flex-1 text-right" :disabled="auth()->user()->cannot('manage-permissions')" :id="$permission->id" :role="$role->id" route="givePermissionToRole"/>
                                </li>

                            @empty
                                <li class="mr-1 bg-gray-100"> This Permission is Not Assigned </li>
                            @endforelse
                            </ul>
                        </div>

                    </div>
                    <div class="bg-blue-200">
                            @can('manage-permissions')
                               <div>
                                    <form action="{{route('givePermissionToUser.store')}} " method="post" class="my-4">
                                    @csrf
                                    <input type="hidden" name="permissionId" value="{{ $permission->id }}">

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
                               </div>
                               <div>
                                    <form action="{{route('givePermissionToRole.store')}} " method="post" class="my-4">
                                    @csrf
                                        <input type="hidden" name="permissionId" value="{{ $permission->id }}">
                                    <div class="mb-4 text-gray-900">
                                        <label for="role">Choose a role:</label>

                                        <select name="role" id="role">

                                            @forelse ($rolesNot as $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                            @empty
                                                <option value="empty"><span class="font-bold">Empty</option>
                                            @endforelse
                                        </select>

                                        <x-button class="ml-4"> {{ __('Assign') }}</x-button>
                                    </div>
                                    <div >

                                    </div>
                                </form>
                               </div>
                            @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
