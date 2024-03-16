@extends('layouts.app')

@section('content')
    <style>
        /* Define your blue and red theme styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #3498db;
            color: white;
        }
        .table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .table tr:hover {
            background-color: #ddd;
        }
        .thumbnail {
            cursor: pointer;
        }
    </style>
    <div class="container" style="padding-top: 50px !important;">

        <div class="panel panel-primary">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-gray-700 uppercase font-bold">Upload Today Diary</h1>
                    </div>
                </div>

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-md-6">
                            <input type="file" name="image" class="form-control">
                        </div>
                        <input type="hidden" name="class_id" value="{{ $class->id }}" class="form-control">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success">Upload</button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>

    <h1>Diary Data</h1>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Class ID</th>
            <th>Diary Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($diaries as $entry)
            <tr>
                <td>{{ $entry->id }}</td>
                <td><img class="thumbnail" src="{{ asset('images/' . $entry->image_name) }}" alt="Image" width="100"></td>
                <td>{{ $entry->class_id }}</td>
                <td>{{ $entry->created_at->format('d-M-Y') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="container" style="padding-top: 50px">
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
    <script>
        document.querySelectorAll('.thumbnail').forEach(item => {
            item.addEventListener('click', event => {
                window.open(item.getAttribute('src'), '_blank');
            });
        });
    </script>
@endsection
