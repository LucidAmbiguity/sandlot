<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <x-post>
            <x-card :post="$post"/>
            @auth
                @can('update', $post)


                {{-- @if (Auth::user()->id === $post->user_id || Auth::user()->hasPermissionTo('edit all posts')) --}}
                    <div class="container " >
                        <a class="btn btn-primary " href="{{ route('posts.edit', $post->id) }}" role="button">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="float-right">
                            @csrf
                            @method('delete')
                            <x-button class="ml-4 btn btn-danger"> {{ __('Delete') }}</x-button>
                        </form>

                    </div>
                {{-- @endif --}}
                @endcan
            @endauth
            <div class="container pt-5 ">
                <a class="btn btn-success " href="/posts" role="button">POSTS</a>
            </div>
    </x-post>

</x-app-layout>
