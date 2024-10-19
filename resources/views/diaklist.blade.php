<x-app-layout>

    @isset($status)

     <p> Módosítottuk.</p>

    @endisset
    <form class="forms" action= "{{route('diaklistosztalyonkent')}}" method="POST" >
        @csrf <!-- {{ csrf_field() }} -->

    <select name="osztaly">
        @foreach($datas2 as $data1)
            <option value = "{{$data1->osztaly}}">
                {{$data1->osztaly}}
            </option>
        @endforeach
    </select>

    <div class="gombok_2">
        <input class="btn btn-success" type="submit" value="Submit">
         </div>
    </form>

    <a href="{{ url('page') }}">Kattintson ide a törölt diákok listájához</a>
</x-app-layout>