<x-app-layout>

    <h1 class="own_h1">Diák adatainak módosítása</h1>
    <form class="forms" action= "{{route('diakmod',[$diak->id])}}" method="POST" >
      @csrf <!-- {{ csrf_field() }} -->
  <label class="own_label_1" for="id">Diák id:</label><br>
  <input type="number" id="id" name="id" value="{{$diak->id}}">
  <br><br>
  <label class="own_label_1" for="nev">Diák neve:</label><br>
  <input type="text" id="name" name="name" value="{{$diak->name}}"><br><br>
  <label class="own_label_1" for="password">Jelszó:</label><br>
  <input type="text" id="password" name="password" value=""><br><br>
  <label class="own_label_1" for="osztaly">Osztály:</label><br>
  <input type="text" id="osztaly" name="osztaly" value="{{$diak->osztaly}}"><br><br>
  <label class="own_label_1" for="deactivate">Deactivate</label>
  <input type="checkbox" name="deactivate" value="1" {{  ($diak->deactivate== 1 ? ' checked' : '') }}><br>
  <div class="gombok_2">
  <input class="btn btn-success" type="submit" value="Submit">
</div>

</x-app-layout>