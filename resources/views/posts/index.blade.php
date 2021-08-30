<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>




    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="px-4  shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    {{-- Start Of Post List --}}
                                    <!-- component -->
                                    <div class="flex flex-col items-center">
                                        <h2 class="mt-2">Posts</h2>
                                        @if (count($posts)>0)
                                            @foreach ($posts as $post)
                                                <x-card :post="$post"/>
                                            @endforeach
                                        @else
                                            <p>No Posts Found</p>
                                        @endif
                                    </div>
                                </div>

                                {{-- End Of Post List --}}

                                <div class="mt-4">
                                {{ $posts->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-15  border-t border-gray-500 mt-5">
                        <p>
                            <a class="btn btn-primary btn-lg" href="posts/create" role="button">
                                <x-button class="ml-3 mt-2">
                                    {{ __('Create') }}
                                </x-button>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
