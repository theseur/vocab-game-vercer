<x-app-layout>
   
    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">    
            <?php
            /*{{$current}} 
          <br>
          {{$currentTime}} 
          <br>
          {{$now}}
          <br>
          {{$dateTimeNew}} 

          <br>
          {{$dateTimeNewToString}} 

            */?>
         @foreach($szavak as $szo)
         {{$szo}}
         <br>
         @endforeach
         <table>   
         @foreach($datas2 as $data)
         <tr>
            <td class="td_1"> {{$data->datum}} </td>
            <td class="td_2"> {{$data->osztaly}} </td>
        
         </tr>
         @endforeach
         </table>   
    </x-nav-link>

 
    

</x-app-layout>