
<h1 style="text-align: center">Your Diary for Current Week</h1>
<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Diary Date</th>
    </tr>
    </thead>
    <tbody>
    @foreach($diaries as $entry)
        <tr>
            <td>{{ $entry->id }}</td>
            <td><img class="thumbnail" src="{{ asset('images/' . $entry->image_name) }}" alt="Image" width="100"></td>
            <td>{{ $entry->created_at->format('d-M-Y') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">Student Details</h2>
            </div>
        </div>

        <div class="table w-full mt-8 bg-white rounded" style="background-color: lightgrey !important;" id="myDiv">
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3"></div>
                    <div class="md:w-2/3">
                        <img class="w-20 h-20 sm:w-32 sm:h-32 rounded" src="{{ asset('images/profile/' .$student->user->profile_picture) }}" alt="avatar">
                    </div>
                </div>

                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Status
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <div class="flex flex-row items-center">
                            <label class="block text-gray-500 font-bold">
                                <input name="status" class="mr-2 leading-tight" type="radio" value="1" {{ ($student->status == '1') ? 'checked' : '' }}>
                                <span class="text-sm">Active</span>
                            </label>
                            <label class="ml-4 block text-gray-500 font-bold">
                                <input name="status" class="mr-2 leading-tight" type="radio" value="0" {{ ($student->status == '0') ? 'checked' : '' }}>
                                <span class="text-sm">Inactive</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="md:flex">
                    <div class="md:w-1/2 md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-red-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                Admission #
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input name="admission_id"
                                   class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                   type="text" value="{{ $student->admission_id }}">
                        </div>
                    </div>

                    <div class="md:w-1/2 md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-red-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                Admission Date
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input name="admission_date"
                                   class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                   type="date" value="{{ $student->admission_date }}">
                        </div>
                    </div>
                </div>

                <div class="md:flex">
                    <div class="md:w-1/2 md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-red-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                Name
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input name="name"
                                   class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                   type="text" value="{{ $student->user->name }}">
                        </div>
                    </div>

                    <div class="md:w-1/2 md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-red-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                Father Name
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input name="father_name"
                                   class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                   type="text" value="{{ $student->father_name }}">
                        </div>
                    </div>
                </div>

                <div class="md:flex">
                    <div class="md:w-1/2 md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-red-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                Class of Admission
                            </label>
                        </div>
                        <div class="md:w-2/3 block text-gray-600 font-bold">
                            <div class="relative">
                                <input name="father_name"
                                       class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                       type="text" value="{{ $class->class_name }}">
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="md:w-1/2 md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-red-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                Date of Birth
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input name="dateofbirth"
                                   class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                   type="date" value="{{ $student->dateofbirth }}">
                        </div>
                    </div>
                </div>

                <div class="md:flex">
                    <div class="md:w-1/2 md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-red-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                Bay Form
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input name="cnic"
                                   class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                   type="text" value="{{ $student->cnic }}" maxlength="13" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        </div>
                    </div>

                    <div class="md:w-1/2 md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-red-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                Father CNIC
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input name="father_cnic"
                                   class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                   type="text" value="{{ $student->father_cnic }}" maxlength="13" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        </div>
                    </div>
                </div>

                <div class="md:flex">
                    <div class="md:w-1/2 md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-red-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                Guardian Name
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input name="guardian_name"
                                   class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                   type="text" value="{{ $student->guardian_name }}">
                        </div>
                    </div>

                    <div class="md:w-1/2 md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-red-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                Religion
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input name="religion"
                                   class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                   type="text" value="{{ $student->religion }}">
                        </div>
                    </div>
                </div>

                <div class="md:flex">
                    <div class="md:w-1/2 md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-red-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                Phone
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input name="phone"
                                   class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                   type="text" value="{{ $student->phone }}">
                        </div>
                    </div>

                    <div class="md:w-1/2 md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-red-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                Mobile Number
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input name="mobile"
                                   class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                   type="text" value="{{ $student->mobile }}">
                        </div>
                    </div>
                </div>

                <div class="md:flex">
                    <div class="md:w-1/2 md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-red-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                Profession of Father
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input name="father_profession"
                                   class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                   type="text" value="{{ $student->father_profession }}">
                        </div>
                    </div>

                    <div class="md:w-1/2 md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-red-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                Driver Mobile Number
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input name="driver_number"
                                   class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                   type="text" value="{{ $student->driver_number }}">
                        </div>
                    </div>
                </div>

                <div class="md:flex">
                    <div class="md:w-1/2 md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-red-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                Login ID
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input name="email"
                                   class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                   type="email" value="{{ $student->user->email }}">
                        </div>
                    </div>
                    @if(Auth::check() && Auth::user()->id == 1)
                        <div class="md:w-1/2 md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-red-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                    Update Password
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input name="password"
                                       class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                       type="text" value="{{ $student->user->password_set }}">
                            </div>
                        </div>
                    @endif
                </div>

                <div class="md:flex">
                    <div class="md:w-1/2 md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-red-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                Roll Number
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input name="roll_number"
                                   class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                   type="number" value="{{ $student->roll_number }}">
                        </div>
                    </div>

                    <div class="md:w-1/2 md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-red-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                Gender
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <div class="flex flex-row items-center">
                                <label class="block text-gray-500 font-bold">
                                    <input name="gender" class="mr-2 leading-tight" type="radio" value="male" {{ ($student->gender == 'male') ? 'checked' : '' }}>
                                    <span class="text-sm">Male</span>
                                </label>
                                <label class="ml-4 block text-gray-500 font-bold">
                                    <input name="gender" class="mr-2 leading-tight" type="radio" value="female" {{ ($student->gender == 'female') ? 'checked' : '' }}>
                                    <span class="text-sm">Female</span>
                                </label>
                                <label class="ml-4 block text-gray-500 font-bold">
                                    <input name="gender" class="mr-2 leading-tight" type="radio" value="other" {{ ($student->gender == 'other') ? 'checked' : '' }}>
                                    <span class="text-sm">Other</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="md:flex">
                    <div class="md:w-1/2 md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-red-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                Current Address
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input name="current_address"
                                   class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                   type="text" value="{{ $student->current_address }}">
                        </div>
                    </div>

                    <div class="md:w-1/2 md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-red-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                Permanent Address
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input name="permanent_address"
                                   id="permanent_address"
                                   class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                   type="text" value="{{ $student->permanent_address }}">
                        </div>
                    </div>
                </div>

                <div class="md:flex">
                    <div class="md:w-1/2 md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-red-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                Fee Decided
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input name="fee_decided"
                                   class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                   type="number" step="1" value="{{ $student->fee_decided }}">
                        </div>
                    </div>

                    <div class="md:w-1/2 md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-red-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                Stationary Charges Decided
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input name="stationary_decided"
                                   class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                   type="number" step="1" value="{{ $student->stationary_decided }}">
                        </div>
                    </div>
                </div>

                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Result Card Status
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <div class="flex flex-row items-center">
                            <label class="block text-gray-500 font-bold">
                                <input name="result_card" class="mr-2 leading-tight" type="radio" value="1" {{ ($student->result_card == '1') ? 'checked' : '' }}>
                                <span class="text-sm">Collected</span>
                            </label>
                            <label class="ml-4 block text-gray-500 font-bold">
                                <input name="result_card" class="mr-2 leading-tight" type="radio" value="0" {{ ($student->result_card == '0') ? 'checked' : '' }}>
                                <span class="text-sm">Not Collected</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                            Certificate Status
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <div class="flex flex-row items-center">
                            <label class="block text-gray-500 font-bold">
                                <input name="certificate" class="mr-2 leading-tight" type="radio" value="1" {{ ($student->certificate == '1') ? 'checked' : '' }}>
                                <span class="text-sm">Delivered</span>
                            </label>
                            <label class="block text-gray-500 font-bold">
                                <input name="certificate" class="mr-2 leading-tight" type="radio" value="1" {{ ($student->certificate == '1') ? 'checked' : '' }}>
                                <span class="text-sm">Received</span>
                            </label>
                            <label class="ml-4 block text-gray-500 font-bold">
                                <input name="certificate" class="mr-2 leading-tight" type="radio" value="0" {{ ($student->certificate == '0') ? 'checked' : '' }}>
                                <span class="text-sm">Not Received</span>
                            </label>
                        </div>
                    </div>
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
        <script>
            // Get all input elements within the div
            var inputs = document.querySelectorAll('#myDiv input, #myDiv select, #myDiv textarea');

            // Set all inputs to disabled or readonly
            inputs.forEach(function(input) {
                input.disabled = true; // Use input.readOnly = true; for read-only
            });
        </script>
