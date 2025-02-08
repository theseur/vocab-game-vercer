<x-app-layout>
   
    
  Hello
    {{$status}}

    @if(count($status) > 0)
    
   van
   {{$status}}

   @else

   nincs
@endif
   
</x-app-layout>