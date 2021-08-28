 <form action="{{route($route.'.destroy' ,$id)}}" class="{{$class}}" method="POST">
     @csrf
     @method('delete')
    <input type="hidden" id="roleId" name="roleId" value="{{$role}}">
    @if ($disabled )
        <x-button class="ml-4" disabled> {{ __('Remove') }}</x-button>
    @else

        <x-button class="ml-4"> {{ __('Remove') }}</x-button>
    @endif

 </form>
