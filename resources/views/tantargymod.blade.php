<x-app-layout>

      <h1 class="own_h1">Tantárgy módosítása</h1>
      <form class="forms" action= "{{route('tantargymod',[$tantargy->id])}}" method="POST" >
        @csrf <!-- {{ csrf_field() }} -->
        <label class="own_label_1" for="id">Tantárgy id:</label><br>
        <input type="number" id="id" name="id" value="{{$tantargy->id}}">
        <br><br>
        <label class="own_label_1" for="nev">Tantárgy neve:</label><br>
        <input type="text" id="nev" name="nev" value="{{$tantargy->nev}}"><br><br>
        
        <select name="kepnev">
          @foreach($files1 as $file1)
              <option value = "{{$file1->getFilename()}}">
                  {{$file1->getFilename()}}
              </option>
          @endforeach
        </select>

        <label class="own_label_1" for="deactivate">Deactivate</label>
        <input type="checkbox" name="deactivate" value="1" {{  ($tantargy->deactivate== 1 ? ' checked' : '') }}><br>
        <div class="gombok_2">
        <input class="btn btn-success" type="submit" value="Submit">
         </div>

</x-app-layout>