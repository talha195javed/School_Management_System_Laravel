@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="text-gray-700 uppercase font-bold">Classes</h2>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('classes.create') }}" class="btn btn-outline-primary">
                    <i class="fas fa-plus"></i>
                    <span class="ml-2">Class</span>
                </a>
            </div>
        </div>
        <div class="mt-4">
            <input type="text" id="searchInput" onkeyup="searchTable()" class="form-control" placeholder="Search for Class Name">
        </div>
        <table class="table mt-4" id="classesTable">
            <thead>
            <tr>
                <th>ID#</th>
                <th>Name</th>
                <th>Students</th>
                <th>Subject Code</th>
                <th>Teacher</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($classes as $class)
                <tr>
                    <td>{{ $class->id }}</td>
                    <td>{{ $class->class_name }}</td>
                    <td>
                        <span class="badge bg-primary">{{ $class->students_count }}</span>
                    </td>
                    <td>
                        @foreach ($class->subjects as $subject)
                            <span class="badge bg-secondary">{{ $subject->subject_code }}</span>
                        @endforeach
                    </td>
                    <td>{{ $class->teacher->user->name ?? '' }}</td>
                    <td>
                        <a href="{{ route('classes.attends_view', $class->id) }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('classes.attends', $class->id) }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </a>
                        <a href="{{ route('classes.edit', $class->id) }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('classes.destroy', $class->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                        <a href="{{ route('class.assign.subject', $class->id) }}" class="btn btn-sm btn-outline-info" title="Assign Subject">
                            <i class="fas fa-align-right"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $classes->links() }}
        </div>
    </div>

    <script>
        function searchTable() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("classesTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1]; // Column index for 'Name' column
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

@endsection
