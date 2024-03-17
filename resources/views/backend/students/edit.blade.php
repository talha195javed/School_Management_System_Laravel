@extends('layouts.app')

@section('content')
    <div class="roles">

        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">Edit Student</h2>
            </div>
            <div class="flex flex-wrap items-center">
                <a href="{{ route('student.index') }}" class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded">
                    <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="long-arrow-alt-left" class="svg-inline--fa fa-long-arrow-alt-left fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"></path></svg>
                    <span class="ml-2 text-xs font-semibold">Back</span>
                </a>
            </div>
        </div><br>
        <div style="display: flex">
            <div class="mb-4">
                <a href="{{ route('fee.creates', ['student_id' => $student->id]) }}" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 rounded">
                    Add Fee Details
                </a>
            </div>
            <div class="mb-6" style="padding-left: 5px">
                <a href="{{ route('stationary.creates', ['student_id' => $student->id]) }}" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 rounded">
                    Add Stationary Details
                </a>
            </div>
        </div>
        <div class="table w-full mt-8 bg-white rounded">
            <form action="{{ route('student.update',$student->id) }}" method="POST" style="background-color: lightgrey" enctype="multipart/form-data">
                @csrf
                @method('PUT')

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
                        @error('gender')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <input name="shift" type="hidden" value="{{ $student->shift }}">

                <div class="md:flex" style="padding-left: 9% !important; padding-bottom: 2% ">
                    <div>
                        <label class="block text-red-500 font-bold">
                            Update Profile Picture :
                        </label>
                    </div>
                    <div>
                        <input name="profile_picture"
                               class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                               type="file">
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
                            @error('admission_id')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
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
                            @error('admission_date')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
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
                            @error('name')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
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
                            @error('father_name')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
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
                                <select name="class_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                    <option value="">--Select Class--</option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}"
                                            {{ ($class->id === $student->class_id) ? 'selected' : '' }}
                                        >
                                            {{ $class->class_name }}
                                        </option>
                                    @endforeach
                                </select>
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
                            @error('dateofbirth')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
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
                            @error('cnic')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
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
                            @error('father_cnic')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
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
                            @error('guardian_name')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
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
                            @error('religion')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
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
                            @error('phone')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
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
                            @error('mobile')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
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
                            @error('father_profession')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
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
                            @error('driver_number')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
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
                            @error('email')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
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
                                @error('password')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
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
                            @error('roll_number')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
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
                            @error('gender')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
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
                            @error('current_address')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="md:w-1/2 md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-red-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                Permanent Address
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <div style="display: flex">
                                <input id="permanent_address_checkbox"
                                       class="mr-2 leading-tight"
                                       type="checkbox">
                                <label for="permanent_address_checkbox" class="block text-red-500 font-bold">
                                    Same as Current Address
                                </label>
                            </div>
                            <input name="permanent_address"
                                   id="permanent_address"
                                   class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                   type="text" value="{{ $student->permanent_address }}">
                            @error('permanent_address')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
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
                            @error('fee_decided')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
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
                            @error('stationary_decided')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
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
                        @error('result')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
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
                        @error('certificate')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="md:flex md:items-center">
                    <div class="md:w-1/3"></div>
                    <div class="md:w-2/3">
                        <button class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                            Update Student
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="roles">
            <h1 style="text-align: center; font-weight: bolder; font-size: 25px">Fee Details</h1>
            <table id="fee">
                <thead>
                <tr>
                    <th>Fee Month</th>
                    <th>Fee Submitted</th>
                    <th>Submission Date</th>
                    <th>Action</th>
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
                        <td>{{ $feeSubmittedDetail->created_at->format('d-m-Y') }}</td>
                        <td>
                            <a href="{{ route('fee.edit', $feeSubmittedDetail->id) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('fee.destroy', $feeSubmittedDetail->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
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
@endsection

@push('scripts')
    <script>
        $(function() {
            $( "#datepicker-se" ).datepicker({ dateFormat: 'yy-mm-dd' });
        })
    </script>
    <script>
        document.getElementById('permanent_address_checkbox').addEventListener('change', function() {
            if (this.checked) {
                document.getElementById('permanent_address').value = document.querySelector('[name="current_address"]').value;

            } else {
                document.getElementById('permanent_address').value = '';
            }
        });
    </script>
@endpush
