<x-app-layout>

    @isset($status)

     <p> Módosítottuk.</p>

    @endisset
    <table>    
        <tr>
            <th class="th_1">név</th>
            <th class="th_2">pont</th>
          
        </tr>
        @if(count($results) > 0)
            <div class="tablazat">
            @foreach($results as $data)
                <tr>
                <td class="td_1"> {{$data->name}} </td>
                <td class="td_2"> {{$data->pontszam}} </td>
              
                </tr>
                @endforeach
            </div>
           
            <form class="forms" action= "{{route('eredmKiIratas')}}" method="POST" >
                        @csrf <!-- {{ csrf_field() }} -->
                <input type="hidden" id="osztaly" name="osztaly" value="{{$results[0]->osztaly}}">
                   <input type="hidden" id="datum" name="datum" value="{{$results[0]->datum}}">
                    <select name="filetype" id="filetype">
                <option value="txt">txt</option>
                <option value="csv">csv</option>
               
                </select>
                   
                    <div class="gombok_2">
                        <input class="btn btn-success" type="submit" value="Submit">
                        </div>
        @endif
    </table>
</x-app-layout>