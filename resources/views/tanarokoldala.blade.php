<x-app-layout>
   
    
    
            
            <x-nav-link :href="route('tanarlist')" :active="request()->routeIs('tanarlist')">
                        Tanárok névsorának szerkesztése
            </x-nav-link>

            <x-nav-link :href="route('tanarhozzaadas')" :active="request()->routeIs('tanarhozzaadas')">
                Tanár hozzáadása
            </x-nav-link>
            {{$status}}
      
</x-app-layout>