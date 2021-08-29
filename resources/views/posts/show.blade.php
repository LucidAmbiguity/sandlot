@extends('layouts.app')

@section('content')

        <h1>{{$title }}  </h1>



            <h2>Posts</h2>
            @if (count($posts)>0)
                @foreach ($posts as $post)
                    <div class="card bg-secondary card-body">
                        <h3>
                             <a href="/posts/{{$post->id}}">{{$post->title}}</a>
                         </h3>
                        <small>Written on {{$post->created_at}} by {{$post->user->name}} </small>
                    </div>
                @endforeach
               <div width="100px"> {{$posts->links('pagination::bootstrap-4')}}</div>
            @else
                <p>No Posts Found</p>
            @endif





        <p>
            <a class="btn btn-primary btn-lg" href="posts/create" role="button">create</a>
            <a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p>


@endsection
