
<x-app-layout>
<head><link rel="stylesheet" href="{{ URL::asset('css/dashboard.css')}}"></head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <hr>
        
    <div class="container bg-white">
            <div  class=" ml-14 menu bg-white overflow-hidden shadow-xl">
             <aside>
            <nav>
            <ul>
            <a href="{{url('/generateqr')}}">Create QR Code for a Room</a>
            <li>show all students</li>
            <li>search students</li>
            </ul>
            </nav>
            </aside>
            <!--    <x-jet-welcome /> -->
            </div>
            <div class="result"></div>
        </div>  
   
</x-app-layout>

<a href="{{ URL::asset('css/dashboard.css')}}">tyy</a>