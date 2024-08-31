<x-app-layout>

    <x-nav-link :href="route('diakhozzadascsv')" :active="request()->routeIs('diakhozzadascsv')">
        Diák hozzáadása excel táblából
    </x-nav-link>

    <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('store-formdiak')}}" enctype="multipart/form-data">
        @csrf
         <div class="form-group">
           <label for="nev">Név</label>
           <input type="text" id="name" name="name" class="form-control" required="">
         </div>
         <div class="form-group">
            <label for="nev">Jelszó</label>
            <input type="text" id="password" name="password" class="form-control" required="">
          </div>
          <div class="form-group">
            <label for="nev">Osztály</label>
            <input type="text" id="osztaly" name="osztaly" class="form-control" required="">
          </div>
        
         <button type="submit" class="btn btn-primary">Submit</button>
       </form>
</x-app-layout>