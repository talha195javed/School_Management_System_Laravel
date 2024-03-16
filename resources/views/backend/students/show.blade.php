@extends('layouts.app')

@section('content')
    <div class="roles">

        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">Student Details</h2>
            </div>
            <div class="flex flex-wrap items-center">
                <a href="{{ route('student.index') }}"
                   class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded">
                    <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas"
                         data-icon="long-arrow-alt-left" class="svg-inline--fa fa-long-arrow-alt-left fa-w-14"
                         role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path fill="currentColor"
                              d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"></path>
                    </svg>
                    <span class="ml-2 text-xs font-semibold">Back</span>
                </a>
            </div>
        </div>

        <div class="mt-8 bg-white rounded">
            <div class="w-full max-w-2xl px-6 py-12">

                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3"></div>
                    <div class="md:w-2/3">
                        <img class="w-20 h-20 sm:w-32 sm:h-32 rounded"
                             src="{{ asset('images/profile/' .$student->user->profile_picture) }}" alt="avatar">
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Name :
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <span class="block text-gray-600 font-bold">{{ $student->user->name }}</span>
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Email :
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <span class="text-gray-600 font-bold">{{ $student->user->email }}</span>
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Roll Number :
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <span class="text-gray-600 font-bold">{{ $student->roll_number }}</span>
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Phone :
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <span class="text-gray-600 font-bold">{{ $student->phone }}</span>
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Gender :
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <span class="text-gray-600 font-bold">{{ $student->gender }}</span>
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Date of Birth :
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <span class="text-gray-600 font-bold">{{ $student->dateofbirth }}</span>
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Current Address :
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <span class="text-gray-600 font-bold">{{ $student->current_address }}</span>
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Permanent Address :
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <span class="text-gray-600 font-bold">{{ $student->permanent_address }}</span>
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Class :
                        </label>
                    </div>
                    <div class="md:w-2/3 block text-gray-600 font-bold">
                        <span class="text-gray-600 font-bold">{{ $student->class->class_name }}</span>
                    </div>
                </div>
{{--                <div class="md:flex md:items-center mb-6">--}}
{{--                    <div class="md:w-1/3">--}}
{{--                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">--}}
{{--                            Student Parent :--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                    <div class="md:w-2/3 block text-gray-600 font-bold">--}}
{{--                        <span class="text-gray-600 font-bold">{{ $student->parent->user->name }}</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="md:flex md:items-center mb-6">--}}
{{--                    <div class="md:w-1/3">--}}
{{--                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">--}}
{{--                            Parent Email :--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                    <div class="md:w-2/3 block text-gray-600 font-bold">--}}
{{--                        <span class="text-gray-600 font-bold">{{ $student->parent->user->email }}</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="md:flex md:items-center mb-6">--}}
{{--                    <div class="md:w-1/3">--}}
{{--                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">--}}
{{--                            Parent Phone :--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                    <div class="md:w-2/3 block text-gray-600 font-bold">--}}
{{--                        <span class="text-gray-600 font-bold">{{ $student->parent->phone }}</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="md:flex md:items-center mb-6">--}}
{{--                    <div class="md:w-1/3">--}}
{{--                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">--}}
{{--                            Parent Address :--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                    <div class="md:w-2/3 block text-gray-600 font-bold">--}}
{{--                        <span class="text-gray-600 font-bold">{{ $student->parent->current_address }}</span>--}}
{{--                    </div>--}}
{{--                </div>--}}

                {{--                <div class="w-full px-0 md:px-6 py-12">--}}
                {{--                    <div class="flex items-center bg-gray-200">--}}
                {{--                        <div class="w-1/3 text-left text-gray-600 py-2 px-4 font-semibold">Code</div>--}}
                {{--                        <div class="w-1/3 text-left text-gray-600 py-2 px-4 font-semibold">Subject</div>--}}
                {{--                        <div class="w-1/3 text-right text-gray-600 py-2 px-4 font-semibold">Teacher</div>--}}
                {{--                    </div>--}}
                {{--                    @foreach ($class->subjects as $subject)--}}
                {{--                        <div class="flex items-center justify-between border border-gray-200 mb-px">--}}
                {{--                            <div class="w-1/3 text-left text-gray-600 py-2 px-4 font-medium">{{ $subject->subject_code }}</div>--}}
                {{--                            <div class="w-1/3 text-left text-gray-600 py-2 px-4 font-medium">{{ $subject->name }}</div>--}}
                {{--                            <div class="w-1/3 text-right text-gray-600 py-2 px-4 font-medium">{{ $subject->teacher->user->name }}</div>--}}
                {{--                        </div>--}}
                {{--                    @endforeach--}}
                {{--                </div>--}}
            </div>
        </div>
        <div class="roles">
            <h1 style="text-align: center; font-weight: bolder; font-size: 25px">Fee Details</h1>
            <table id="fee">
                <thead>
                <tr>
                    <th>Fee Month</th>
                    <th>Fee Submitted</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $totalFee = 0;
                @endphp
                @foreach($feeSubmittedDetails as $feeSubmittedDetail)
                    <tr>
                        <td>{{ \Carbon\Carbon::createFromFormat('Y-m', $feeSubmittedDetail->month)->format('F Y') }}</td>
                        <td>{{ $feeSubmittedDetail->fee_submitted }}</td>
                        <td>
                            <label><input type="radio" name="status[{{ $feeSubmittedDetail->id }}]" value="paid"> Paid</label>
                            <label><input type="radio" name="status[{{ $feeSubmittedDetail->id }}]" value="unpaid"> Unpaid</label>
                        </td>
                    </tr>
                    @php
                        $totalFee += $feeSubmittedDetail->fee_submitted;
                    @endphp
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Total</th>
                    <td>{{ $totalFee }}</td>
                    <td></td>
                </tr>
                </tfoot>
            </table>
        </div>

        <div class="roles" style="padding-bottom: 10%; padding-top: 10%;">
            <h1 style="text-align: center; font-weight: bolder; font-size: 25px">Stationary Details</h1>
            <table id="fee">
                <thead>
                <tr>
                    <th>Stationary Details</th>
                    <th>Charges Submitted</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $totalCharges = 0;
                @endphp
                @foreach($stationaryCharges as $stationaryCharge)
                    <tr>
                        <td>{{ $stationaryCharge->stationary_details }}</td>
                        <td>{{ $stationaryCharge->stationary_charges }}</td>
                    </tr>
                    @php
                        $totalCharges += $stationaryCharge->stationary_charges;
                    @endphp
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Total</th>
                    <td>{{ $totalCharges }}</td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-gray-700 uppercase font-bold" style="text-align: center">Attendance</h3>
            </div>
        </div>
        <div class="accordion mt-4" id="accordionExample">
            @foreach($attendances->groupBy(function($date) { return Carbon\Carbon::parse($date->attendence_date)->format('F Y'); }) as $month => $attendance)
                <div class="card">
                    <div class="card-header" id="heading{{ $loop->iteration }}">
                        <h1 style="text-align: center" class="mb-0">
                            <button class="btn btn-link text-white" type="button" data-toggle="collapse"
                                    data-target="#collapse{{ $loop->iteration }}" aria-expanded="true"
                                    aria-controls="collapse{{ $loop->iteration }}">
                                {{ $month }}
                            </button>
                        </h1>
                    </div>

                    <div id="collapse{{ $loop->iteration }}" class="collapse {{ $loop->first ? 'show' : '' }}"
                         aria-labelledby="heading{{ $loop->iteration }}" data-parent="#accordionExample">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($attendance as $record)
                                    <tr>
                                        <td>{{ $record->attendence_date }}</td>
                                        <td>{{ $record->attendence_status ? 'Present' : 'Absent' }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endforeach
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
    <style>
        .accordion {
            width: 100%;
        }

        .accordion .card {
            margin-bottom: 10px;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .accordion .card-header {
            background-color: #3490dc; /* Blue theme */
            padding: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .accordion .card-header h2 button {
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
        }

        .accordion .card-body {
            background-color: #f8f9fa; /* Light gray background */
            padding: 15px;
        }

        .accordion .table {
            width: 100%;
            border-collapse: collapse;
        }

        .accordion .table th,
        .accordion .table td {
            padding: 8px;
            border-bottom: 1px solid #dee2e6;
        }

        .accordion .table th {
            background-color: #e9ecef; /* Lighter gray background for table header */
        }
    </style>
    <script>
        document.querySelectorAll('.thumbnail').forEach(item => {
            item.addEventListener('click', event => {
                window.open(item.getAttribute('src'), '_blank');
            });
        });
    </script>
@endsection
