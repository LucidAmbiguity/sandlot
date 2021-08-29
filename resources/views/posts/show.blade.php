<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <x-post>
            <x-card :post="$post"/>


                @if (Auth::user()->id === $post->user_id)
                    <div class="container " >
                        <a class="btn btn-primary " href="/posts/{{$post->id}}/edit" role="button">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="float-right">
                            @csrf
                            @method('delete')
                            <x-button class="ml-4 btn btn-danger"> {{ __('Delete') }}</x-button>
                        </form>

                    </div>
                @endif


            <div class="container pt-5 ">
                <a class="btn btn-success " href="/posts" role="button">POSTS</a>
            </div>
    </x-post>

</x-app-layout>
