<x-app-layout>
   
            <x-nav-link :href="route('tanarokoldala')" :active="request()->routeIs('tanarokoldala')">
                Diák hozzáadása
            </x-nav-link>

            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                Nyolcadikosok törlése
            </x-nav-link>

            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                Osztályok előre léptetése
            </x-nav-link>
           
        
</x-app-layout>