@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-gray-700 uppercase font-bold">Attendance - {{ $class->class_name }}</h1>
            </div>
        </div>

        <div class="mt-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="card-title">Attendance Records</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Student Name</th>
                                <th>Attendance</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($attendances as $attendance)
                                <tr>
                                    <td>{{ $attendance->attendence_date }}</td>
                                    <td>
                                        <a href="{{ route('student.edit', $attendance->student->user->id) }}">
                                            {{ $attendance->student->user->name }}
                                        </a>
                                    </td>
                                    <td style="color: black">
                                        @if ($attendance->attendence_status)
                                            <span>Present</span>
                                        @else
                                            <span>Absent</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
