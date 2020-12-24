
<x-app-layout>
<head><link rel="stylesheet" href="{{ URL::asset('css/dashboard.css')}}"></head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search by Dates') }}
        </h2>
    </x-slot>

    <hr>
        
    <x-slot name="slot">
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('getStudentsByDates') }}" method="POST" >
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date 1:</strong>
                    <input type="date" name="date1" class="form-control" required placeholder="date">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date 2:</strong>
                    <input type="date" class="form-control" required  name="date2"
                        placeholder="date">
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>

    </x-slot> 
   
</x-app-layout>

