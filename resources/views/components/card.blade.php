<style>
    .octagon {
      width: 50px;
      height: 50px;
      background: rgb(151, 182, 105);
      position: relative;
    }
    .octagon:before {
      content: "";
      width: 50px;
      height: 0;
      position: absolute;
      top: 0;
      left: 0;
      border-bottom: 15px solid rgb(151, 182, 105);
      border-left: 15px solid #eee;
      border-right: 15px solid #eee;
    }
    .octagon:after {
      content: "";
      width: 50px;
      height: 0;
      position: absolute;
      bottom: 0;
      left: 0;
      border-top: 15px solid rgb(151, 182, 105);
      border-left: 15px solid #eee;
      border-right: 15px solid #eee;
    }
    </style>

<div class="container bg-white max-w-xl rounded-2xl my-2 px-10 py-8 shadow-lg hover:shadow-2xl transition duration-500 mx-auto">
    <div class="mt-4">
        <h1 class="text-lg text-gray-700 font-semibold hover:underline cursor-pointer"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h1>
        <p class="mt-4 text-md text-gray-600">{!! $post->body !!}</p>
        <div class="flex justify-between items-center">
            <div class="mt-4 flex items-center space-x-4 py-6">
                <div class="">
                    <img class="w-12 h-12 rounded-full" src="#" alt="" />
                </div>
                <div class="text-sm font-semibold">{{$post->user->name}} • <span class="font-normal"> {{$post->created_at}}</span></div>
            </div>
            <div class="octagon p-6  h-4 w-4 flex items-center justify-center text-2xl text-white mt-4 shadow-lg cursor-pointer">+</div>
        </div>
    </div>
</div>
