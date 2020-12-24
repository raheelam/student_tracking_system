<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

      <!--  <title>{{ config('app.name', 'Student tracking system') }}</title> -->
        <title>Student Attendance System</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        

        @livewireStyles
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL::asset('css/dashboard.css')}}">
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen  bg-white ">
            @livewire('navigation-dropdown')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-2 px-2  sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
           
            
            <div class="containerr min-h-full bg-white max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            
              <!-- <div class="menu bg-white overflow-hidden shadow-xl"> -->
            <aside class="mr-5 overflow-hidden">
            <nav class="py-5">
            <ul>
            <a class="text-reset" href="{{url('/generateqr')}}"><li> Create QR Code for a Room</li></a>
            <a class="text-decoration-none" href="{{route('students.index')}}"><li> show all students</li></a>
            <a class="text-decoration-none" href="{{url('/searchByroomDate')}}"><li> Search by roomNo.</li></a>
            <a class="text-decoration-none" href="{{url('/searchByDates')}}"><li> search by dates</li></a>
            </ul>
            </nav>
            </aside>
            <!--    <x-jet-welcome /> -->
            <!-- </div> -->
            
            

            <!-- Page Content -->
            
            <main class="result ">
            
                {{ $slot }}
            </main>
            

           
            </div> 
        </div>

       

        @stack('modals')

        @livewireScripts
    </body>
    <footer>student tracking system 2020</footer>
</html>
