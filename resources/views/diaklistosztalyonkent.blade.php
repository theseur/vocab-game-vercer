<x-app-layout>
  
    <table>    
        <tr>
            <th class="th_1">name</th>
            <th class="th_2">email</th>
            <th class="th_3">password</th>
            <th class="th_4">osztaly</th>
            <th class="th_5">deactivate</th>
        </tr>
        @if(count($datas) > 0)
            <div class="tablazat">
            @foreach($datas as $data)
                <tr>
                    <td class="td_1"> {{$data->name}} </td>
                    <td class="td_2"> {{$data->email}} </td>
                    <td class="td_3"> {{$data->password}} </td>
                    <td class="td_3"> {{$data->osztaly}} </td>
                    <td class="td_5"> {{$data->deactivate}} </td>
                <td><a href="{{route('diakszerk', [$data->id ])}}" class="btn btn-success"> Szerkesztés </a>

                </tr>
                @endforeach
            </div>
        @endif
    </table>

</x-app-layout>