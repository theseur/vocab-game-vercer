<x-app-layout>
<form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('store-form')}}">
    @csrf
     <div class="form-group">
       <label for="name">Név</label>
       <input type="text" id="name" name="name" class="form-control" required="">
     </div>
     <div class="form-group">
      <label for="email">E-mail</label>
      <input type="text" id="email" name="email" class="form-control" required="">
    </div>
     <div class="form-group">
       <label for="password">Jelszó</label>
       <input type="text" id="password" name="password" class="password" required=""></textarea>
     </div>
     <button type="submit" class="btn btn-primary">Submit</button>
   </form>

  </x-app-layout>