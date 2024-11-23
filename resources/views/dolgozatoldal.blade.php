<x-app-layout>
  
  <form class="forms" action= "{{route('diaklistosztalyonkent')}}" method="POST" >
    @csrf <!-- {{ csrf_field() }} -->

<select name="nev">
    @foreach($datas2 as $data1)
        <option value = "{{$data1->nev}}">
            {{$data1->nev}}
        </option>
    @endforeach
</select>

<div class="gombok_2">
    <input class="btn btn-success" type="submit" value="Submit">
     </div>
</form>

</x-app-layout>