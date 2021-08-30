<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <x-post>
        <div class="flex flex-col">
        <h1>Create Post </h1>

        <form action="{{ route('posts.store') }}" method="POST" class="float-right">
            @csrf
            <!-- Title -->
            <div>
                <x-label for="title" :value="__('Title')" />
                <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" placeholder="Title" required autofocus />
            </div>

            <!-- Body -->
            <div class="mt-4">
                <x-label for="article-ckeditor" :value="__('Body')" />
                <x-textarea id="article-ckeditor" class="block mt-1 w-full" type="textarea" name="body" :value="old('body')" required />
            </div>


            <x-button class="m-4 bg-blue-600"> {{ __('Submit') }}</x-button>
        </form>




</div>
<!-- Scripts -->
<script src="//cdn.ckeditor.com/4.16.1/basic/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('article-ckeditor');
        console.log('Hello');
    </script>
</x-post>
</x-app-layout>
