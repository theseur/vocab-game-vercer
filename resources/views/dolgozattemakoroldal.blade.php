<x-app-layout>
  
    @foreach($datas as $data1)
    {{$data1->nev}}
    @endforeach
    <form class="forms" action= "{{route('osztalylist')}}" method="POST" >
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