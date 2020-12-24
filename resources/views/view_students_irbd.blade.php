<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show All Students') }}
        </h2>
    </x-slot>

    <hr>

   <x-slot name="slot">
    <div class="row ">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Students and room info</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('students.create') }}" title="Create a student record"> <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class = "table-div table-responsive" >
    <table class="table-bordered  table ">
        <tr>
            <th>No</th>
            <th>Room No.</th>
            <th>Telephone</th>
            <th>Student ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Date Taken</th>
            <th>Time </th>
            <th width="">Action</th>
        </tr>
        @foreach ($students as $student)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ "Room " . $student->roomnumber }}</td>
                <td>{{ $student->telephone }}</td>
                <td>{{ $student->studentid }}</td>
                <td>{{ $student->firstname }}</td>
                <td>{{ $student->lastname }}</td>
                <td>{{ date_format($student->created_at, 'jS M Y') }}</td>
                <td>{{ date_format($student->created_at, 'H:i') }}</td>
                <td>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST">

                        <a href="{{ route('students.show', $student->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('students.edit', $student->id) }}">
                            <i class="fas fa-edit  fa-lg">edit</i>

                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger">delete</i>

                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    </div>
    {!! $students->links() !!}

    </x-slot>
    </x-app-layout>