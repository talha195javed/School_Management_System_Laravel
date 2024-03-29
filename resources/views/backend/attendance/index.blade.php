@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="text-gray-700 uppercase font-bold">Attends of - {{ $class->class_name }} </h1>
            </div>
        </div>
        <form action="{{ route('attendance.save') }}" method="post">
            @csrf
            <table class="table mt-4">
                <thead>
                <tr>
                    <th>Class ID</th>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Attends of {{ \Carbon\Carbon::now()->toFormattedDateString() }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $class->id }}</td>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->user->name }}</td>
                        <td>
                            <input type="hidden" name="attendance[{{ $student->id }}][class_id]" value="{{ $class->id }}">
                            <input type="hidden" name="attendance[{{ $student->id }}][student_id]" value="{{ $student->id }}">
                            <input type="hidden" name="attendance[{{ $student->id }}][attendence_date]" value="{{ \Carbon\Carbon::now()->toDateString() }}">
                            <input type="checkbox" name="attendance[{{ $student->id }}][attendence_status]" value="1" onchange="toggleCheckbox(this)">
                            <label for="present">Present</label>
                            <input type="checkbox" name="attendance[{{ $student->id }}][attendence_status]" value="0" onchange="toggleCheckbox(this)">
                            <label for="absent">Absent</label>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

    <script>
        function toggleCheckbox(checkbox) {
            var checkboxes = document.getElementsByName(checkbox.name);
            checkboxes.forEach(function(currentCheckbox) {
                if (currentCheckbox !== checkbox) {
                    currentCheckbox.checked = false;
                }
            });
        }
    </script>
@endsection
