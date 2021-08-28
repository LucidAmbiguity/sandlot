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
                        <h1>Roles</h1>

                        @foreach ($roles as $role)
                            <form action="{{route('roles.destroy' ,$user->id)}}" method="POST" class="mr-1">
                                @csrf
                                @method('delete')
                                <div class="flex justify-between">
                                    {{$role}} <x-button class="ml-4"> {{ __('Delete') }}</x-button>
                                </div>
                            </form>
                        @endforeach
                    </div>
                    <div class="mb-4">

                        <h1>Permissions Direct</h1>

                        @foreach ($permDirect as $permission)
                            <form action="{{route('permissions.destroy' ,$user->id)}}" method="POST" class="mr-1">
                                @csrf
                                @method('delete')
                                <div class="flex justify-between">
                                    {{$permission->name}} <x-button class="ml-4"> {{ __('Delete') }}</x-button>
                                </div>
                            </form>
                        @endforeach
                    </div>
                    <div class="mb-4">

                        <h1>Permissions Roles</h1>

                        @foreach ($permRoles as $permission)
                            <form action="{{route('permissions.destroy' ,$user->id)}}" method="POST" class="mr-1">
                                @csrf
                                @method('delete')
                                <div class="flex justify-between">
                                    {{$permission->name}} <x-button class="ml-4"> {{ __('Delete') }}</x-button>
                                </div>
                            </form>
                        @endforeach
                    </div>
                     <div class="mb-4">

                        <h1>Permissions All</h1>

                        @foreach ($permAll as $permission)
                            <form action="{{route('permissions.destroy' ,$user->id)}}" method="POST" class="mr-1">
                                @csrf
                                @method('delete')
                                <div class="flex justify-between">
                                    {{$permission->name}} <x-button class="ml-4"> {{ __('Delete') }}</x-button>
                                </div>
                            </form>
                        @endforeach
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

