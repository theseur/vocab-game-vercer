<x-app-layout>
   
    {{$status}}
    <br>
    <br>

  <form class="forms" action= "{{route('dolgozattemakorok')}}" method="POST" >
    @csrf <!-- {{ csrf_field() }} -->

<select name="id">
    @foreach($datas2 as $data1)
        <option value = "{{$data1->id}}">
            {{$data1->nev}}
        </option>
    @endforeach
</select>

<div class="gombok_2">
    <input class="btn btn-success" type="submit" value="Submit">
     </div>
</form>

</x-app-layout>