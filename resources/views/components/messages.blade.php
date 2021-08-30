
@if(count($errors) > 0)
<x-post>
    @foreach($errors->all() as $error)
        <div class="bg-red-400">
            {{$error}}
        </div>
    @endforeach
    </x-post>
@endif

@if(session('success'))
<x-post>
    <div class="bg-green-400">
        {{session('success')}}
    </div>
    </x-post>
@endif

@if(session('error'))
<x-post>
    <div class="bg-red-700">
        {{session('error')}}
    </div>
    </x-post>
@endif

