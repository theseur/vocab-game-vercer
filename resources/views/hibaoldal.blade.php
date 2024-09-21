<x-app-layout>
   
    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
        Hiba történt

       {{$datas}} 
    </x-nav-link>

 
   

</x-app-layout>