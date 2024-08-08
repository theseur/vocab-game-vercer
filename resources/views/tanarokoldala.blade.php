<x-app-layout>
   
    
    
            
            <x-nav-link :href="route('tanarokoldala')" :active="request()->routeIs('tanarokoldala')">
                        Tanárok névsorának szerkesztése
            </x-nav-link>

            <x-nav-link :href="route('tanarhozzaadas')" :active="request()->routeIs('tanarhozzaadas')">
                Tanár hozzáadása
            </x-nav-link>

            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                Tantárgy hozzáadása
            </x-nav-link>
           
           
   
                

                  

                   
                
      
</x-app-layout>