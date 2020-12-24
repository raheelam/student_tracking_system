
<x-app-layout>
<head><link rel="stylesheet" href="{{ URL::asset('css/dashboard.css')}}"></head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <hr>
        
    <x-slot name="slot">
       
   <h1>Welcome to student attendance tracking system {{Auth::user()->username}}</h1>
    </x-slot> 
   
</x-app-layout>

