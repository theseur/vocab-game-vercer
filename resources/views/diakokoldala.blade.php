<x-app-layout>
   

            <x-nav-link :href="route('diaklist')" :active="request()->routeIs('diaklist')">
                Diák lista
            </x-nav-link>

            <x-nav-link :href="route('indexdiak')" :active="request()->routeIs('indexdiak')">
                Diák hozzáadása
            </x-nav-link>

            <x-nav-link :href="route('diakokhozzadasacsv')" :active="request()->routeIs('diakokhozzadasacsv')">
                Diák hozzáadása csv-ből
            </x-nav-link>

            <x-nav-link :href="route('nyolcadikosoktorlese')" :active="request()->routeIs('nyolcadikosoktorlese')">
                Nyolcadikosok törlése
            </x-nav-link>

            <x-nav-link :href="route('leptetes')" :active="request()->routeIs('leptetes')">
                Osztályok előre léptetése
            </x-nav-link>
           {{$status}}
        
</x-app-layout>