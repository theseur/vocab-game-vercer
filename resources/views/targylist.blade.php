<x-app-layout>

    @isset($status)

     <p> Módosítottuk.</p>

    @endisset
    <table>    
        <tr>
            <th class="th_1">nev</th>
            <th class="th_2">szulo</th>
            <th class="th_4">kepnev</th>
            <th class="th_4">deactivate</th>
        </tr>
        @if(count($datas) > 0)
            <div class="tablazat">
            @foreach($datas as $data)
                <tr>
                <td class="td_1"> {{$data->nev}} </td>
                <td class="td_2"> {{$data->szulo}} </td>
                <td class="td_3"> {{$data->kepnev}} </td>
                <td class="td_3"> {{$data->deactivate}} </td>
                <td><a href="{{route('tantargyszerk', [$data->id ])}}" class="btn btn-success"> Szerkesztés </a>
                </td>
        

                </tr>
                @endforeach
            </div>
        @endif
    </table>
</x-app-layout>