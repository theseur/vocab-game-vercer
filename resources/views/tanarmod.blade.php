<x-app-layout>

    <h1 class="own_h1">Tantárgy módosítása</h1>
    <form class="forms" action= "{{route('tanarmod',[$tanar->id])}}" method="POST" >
      @csrf <!-- {{ csrf_field() }} -->
  <label class="own_label_1" for="id">Tanár id:</label><br>
  <input type="number" id="id" name="id" value="{{$tanar->id}}">
  <br><br>
  <label class="own_label_1" for="nev">Tanár neve:</label><br>
  <input type="text" id="name" name="name" value="{{$tanar->name}}"><br><br>
  <label class="own_label_1" for="password">Jelszó:</label><br>
  <input type="text" id="password" name="password" value=""><br><br>
  <label class="own_label_1" for="deactivate">Deactivate</label>
  <input type="checkbox" name="deactivate" value="1" {{  ($tanar->deactivate== 1 ? ' checked' : '') }}><br>
  <div class="gombok_2">
  <input class="btn btn-success" type="submit" value="Submit">
</div>

</x-app-layout>