<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form class="forms" action= "{{route('eredmKezdIdo')}}" method="POST" >
                        @csrf <!-- {{ csrf_field() }} -->

                    <select name="osztaly">
                        @foreach($results as $data1)
                            <option value = "{{$data1->osztaly}}">
                                {{$data1->osztaly}}
                            </option>
                        @endforeach
                    </select>
                    <br><br>
                   
                    <div class="gombok_2">
                        <input class="btn btn-success" type="submit" value="Submit">
                        </div>
    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>