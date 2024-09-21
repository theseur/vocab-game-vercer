<x-app-layout>
   
    
    <x-nav-link :href="route('targylist')" :active="request()->routeIs('targylist')">
        Tantárgy lista
    </x-nav-link>


    <x-nav-link :href="route('indexTargy')" :active="request()->routeIs('indexTargy')">
        Tantárgy hozzáadása
    </x-nav-link>
    {{$status}}
   
</x-app-layout>
   
   

        

          

           
        

