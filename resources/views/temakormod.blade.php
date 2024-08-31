<x-app-layout>

    <h1 class="own_h1">Témakör módosítása</h1>
    <form class="forms" action= "{{route('temakormod',[$temakor->id])}}" method="POST" >
      @csrf <!-- {{ csrf_field() }} -->
  <label class="own_label_1" for="id">Témakör id:</label><br>
  <input type="number" id="id" name="id" value="{{$temakor->id}}">
  <br><br>
  <label class="own_label_1" for="nev">Témakör neve:</label><br>
  <input type="text" id="nev" name="nev" value="{{$temakor->nev}}"><br><br>

  <select name="tantargy">
        @foreach($categories as $category)
            <option value = "{{$category->id}}">
                {{$category->nev}}
            </option>
        @endforeach
    </select>

    <select name="kepnev">
        @foreach($files1 as $file1)
            <option value = "{{$file1->getFilename()}}">
                {{$file1->getFilename()}}
            </option>
        @endforeach
      </select>

  
  <label class="own_label_1" for="deactivate">Deactivate</label>
  <input type="checkbox" name="deactivate" value="1" {{  ($temakor->deactivate== 1 ? ' checked' : '') }}><br>
  <div class="gombok_2">
  <input class="btn btn-success" type="submit" value="Submit">
</div>

</x-app-layout>