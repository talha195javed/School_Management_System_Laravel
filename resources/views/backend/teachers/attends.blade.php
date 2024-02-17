@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="text-gray-700 uppercase font-bold">Attends of Teachers </h1>
            </div>
        </div>
        <form action="{{ route('teacher_attendance.save') }}" method="post">
            @csrf
            <table class="table mt-4">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Attends of {{ \Carbon\Carbon::now()->toFormattedDateString() }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->user->name }}</td>
                        <td>
                            <input type="hidden" name="attendance[{{ $teacher->id }}][teacher_id]" value="{{ $teacher->id }}">
                            <input type="hidden" name="attendance[{{ $teacher->id }}][attendence_date]" value="{{ \Carbon\Carbon::now()->toDateString() }}">
                            <input type="checkbox" name="attendance[{{ $teacher->id }}][attendence_status]" value="1" onchange="toggleCheckbox(this)">
                            <label for="present">Present</label>
                            <input type="checkbox" name="attendance[{{ $teacher->id }}][attendence_status]" value="0" onchange="toggleCheckbox(this)">
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
