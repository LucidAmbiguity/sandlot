<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Management Area.') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <div>
                            <h1>Roles</h1>
                        <p class="bg-blue-200">User has <strong>{{$roles->pluck('name')}}</strong></p>
                        <div class="my-4">
                            <ul>
                            @forelse ($roles as $role)
                                <li class="mr-1 bg-gray-100 even:bg-gray-300 flex justify-between items-center">
                                  {{$role->name}}
                                    <x-removeRoleUser-button class="flex-1 text-right" :disabled="auth()->user()->cannot('manage-roles')" :id="$role->id" :user="$user->id" route="assignRole"/>
                                </li>

                            @empty
                                <li class="mr-1 bg-gray-100"> This Permission is Not Assigned </li>
                            @endforelse
                            </ul>
                        </div>




                    </div>
                    <div class="mb-4">

                        <h1>Permissions Direct</h1>
                        <div>
                            <p class="bg-blue-200">User has <strong>{{$permDirect->pluck('name')}}</strong> permission From Direct Assignment</p>
                            <div class="my-4">
                                <ul>
                                @forelse ($permDirect as $perm)
                                    <li class="mr-1 bg-gray-100 even:bg-gray-300 flex justify-between items-center">
                                        {{$perm->name}}
                                        <x-removeRoleUser-button class="flex-1 text-right" :disabled="auth()->user()->cannot('manage-permissions')" :id="$perm->id" :user="$user->id" route="givePermissionToUser"/>
                                    </li>

                                @empty
                                    <li class="mr-1 bg-gray-100"> This Permission is Not Assigned </li>
                                @endforelse
                                </ul>
                         </div>



                    </div>
                    <div class="mb-4">

                        <h1>Permissions Roles</h1>

                       <div>
                            <p class="bg-blue-200">User has <strong>{{$permRoles->pluck('name')}}</strong> permission From Role Assignment</p>
                            <div class="my-4">
                                <ul>
                                @forelse ($permRoles as $perm)
                                    <li class="mr-1 bg-gray-100 even:bg-gray-300 flex justify-between items-center">
                                        {{$perm->name}}
                                        <x-removeRoleUser-button class="flex-1 text-right" :disabled="'true'" :id="$perm->id" :user="$user->id" route="givePermissionToUser"/>
                                    </li>

                                @empty
                                    <li class="mr-1 bg-gray-100"> This Permission is Not Assigned </li>
                                @endforelse
                                </ul>
                         </div>
                    </div>
                     <div class="mb-4">

                        <h1>Permissions All</h1>

                        <div>
                            <p class="bg-blue-200">User has <strong>{{$permRoles->pluck('name')}}</strong> permissions in total</p>
                            <div class="my-4">
                                <ul>
                                @forelse ($permAll as $perm)
                                    <li class="mr-1 bg-gray-100 even:bg-gray-300 flex justify-between items-center">
                                        {{$perm->name}}
                                        <x-removeRoleUser-button class="flex-1 text-right" :disabled="'true'" :id="$perm->id" :user="$user->id" route="givePermissionToUser"/>
                                    </li>

                                @empty
                                    <li class="mr-1 bg-gray-100"> This Permission is Not Assigned </li>
                                @endforelse
                                </ul>
                            </div>
                         </div>
                    </div>


    <x-auth-card>
        <x-slot name="logo">
        </x-slot>
        <!-- Validation Errors -->


        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('users.update',$user) }}">
            @csrf
            @method('put')

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$user->name" required autofocus />
            </div>

            <!-- UserName -->
            <div class="mt-4">
                <x-label for="username" :value="__('UserName')" />

                <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" value=""  />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation"  />
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-4">
                    {{ __('Update') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>

                    </div`>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>

