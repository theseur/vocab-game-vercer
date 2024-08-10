<x-app-layout>
    <table>    
        <tr>
            <th class="th_1">name</th>
            <th class="th_2">password</th>
            <th class="th_3">osztaly</th>
            <th class="th_4">deactivate</th>
        </tr>
        @if(count($datas) > 0)
            <div class="tablazat">
            @foreach($datas as $data)
                <tr>
                <td class="td_1"> {{$data->name}} </td>
                <td class="td_2"> {{$data->password}} </td>
                <td class="td_3"> {{$data->osztaly}} </td>
                <td class="td_4"> {{$data->deactivate}} </td>
            

                </tr>
                @endforeach
            </div>
        @endif
    </table>
</x-app-layout>