<x-app-layout>
   
    
    
            
    <x-nav-link :href="route('tanarlist')" :active="request()->routeIs('tanarlist')">
                Témakör szerkesztése
    </x-nav-link>

    

    <x-nav-link :href="route('indexTargy')" :active="request()->routeIs('indexTargy')">
      Témakör hozzáadása
    </x-nav-link>
   
</x-app-layout>
   