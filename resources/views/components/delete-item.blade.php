 <form action="{{route($route.'.destroy' ,$id)}}" method="POST" class="mr-1 bg-gray-100 even:bg-gray-300">
     @csrf
     @method('delete')
     <div class="flex justify-between items-center">
         <a href="{{route($route.'.show',$id)}}">{{$item}}</a>
         <x-button class="ml-4"> {{ __('Delete') }}</x-button>
     </div>
 </form>
