<x-app-layout>
   
    
    
            
    <x-nav-link :href="route('temakorlist')" :active="request()->routeIs('temakorlist')">
                Témakör szerkesztése
    </x-nav-link>

    

    <x-nav-link :href="route('indextemakor')" :active="request()->routeIs('indextemakor')">
      Témakör hozzáadása
    </x-nav-link>
   
    {{$status}}

</x-app-layout>
   