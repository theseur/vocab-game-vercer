<x-app-layout>

    
    <form class="forms" action= "{{route('datummeghatarozas')}}" method="POST" >
        @csrf <!-- {{ csrf_field() }} -->

    <select name="osztaly">
        @foreach($datas2 as $data1)
            <option value = "{{$data1->osztaly}}">
                {{$data1->osztaly}}
            </option>
        @endforeach
    </select>
    <br><br>
    <label for="datum">A dolgozat napja :</label>
    <input type="datetime-local" id="datum" name="datum">
    <br><br>
    <div class="gombok_2">
        <input class="btn btn-success" type="submit" value="Submit">
         </div>
    </form>
    
</x-app-layout>