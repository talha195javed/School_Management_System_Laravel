@extends('layouts.app')

@section('content')
    <div class="roles">

        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">Create Student</h2>
            </div>
            <div class="flex flex-wrap items-center">
                <a href="{{ route('student.index') }}"
                   class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded">

                    <span class="ml-2 text-xs font-semibold">Back</span>
                </a>
            </div>
        </div>

        <div class="table w-full mt-8 bg-white rounded">
            <form action="{{ route('student.store') }}" method="POST"
                  enctype="multipart/form-data" style="background-color: lightgrey">
                @csrf
                <input name="shift" type="hidden" value="{{ $shift_type }}">

                <input name="status" type="hidden" value="1">
                <div class="md:flex" style="padding-left: 9% !important; padding-bottom: 2% ">
                    <div>
                        <label class="block text-red-500 font-bold">
                            Picture :
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
                                   type="text" value="{{ old('admission_id') }}">
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
                                   type="date" value="{{ old('admission_date') }}">
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
                                   type="text" value="{{ old('name') }}">
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
                                   type="text" value="{{ old('father_name') }}">
                            @error('name')
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
                                <select name="class_id"
                                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="grid-state">
                                    <option value="">--Select Class--</option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->class_name }}</option>
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
                                   type="date" value="{{ old('dateofbirth') }}">
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
                                   type="text" value="{{ old('cnic') }}" maxlength="13" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
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
                                   type="text" value="{{ old('father_cnic') }}" maxlength="13" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
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
                                   type="text" value="{{ old('guardian_name') }}">
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
                                   type="text" value="{{ old('religion') }}">
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
                                   type="text" value="{{ old('phone') }}">
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
                                   type="text" value="{{ old('mobile') }}">
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
                                   type="text" value="{{ old('father_profession') }}">
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
                                   type="text" value="{{ old('driver_number') }}">
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
                                   type="email" value="{{ old('email') }}">
                            @error('email')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="md:w-1/2 md:flex md:items-center mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-red-500 font-bold md:text-right mb-1 md:mb-0 pr-4">
                                Password
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input name="password"
                                   class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500"
                                   type="password">
                            @error('password')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
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
                                   type="number" value="{{ old('roll_number') }}">
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
                                <label class="block text-red-500 font-bold">
                                    <input name="gender" class="mr-2 leading-tight" type="radio" value="male">
                                    <span class="text-sm">Male</span>
                                </label>
                                <label class="ml-4 block text-red-500 font-bold">
                                    <input name="gender" class="mr-2 leading-tight" type="radio" value="female">
                                    <span class="text-sm">Female</span>
                                </label>
                                <label class="ml-4 block text-red-500 font-bold">
                                    <input name="gender" class="mr-2 leading-tight" type="radio" value="other">
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
                                   type="text" value="{{ old('current_address') }}">
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
                                   type="text" value="{{ old('permanent_address') }}">
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
                                   type="number" step="1" value="{{ old('fee_decided') }}">
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
                                   type="number" step="1" value="{{ old('stationary_decided') }}">
                            @error('stationary_decided')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>


                <div style="padding-left: 45% !important;">
                    <div class="md:w-2/3">
                        <button
                            class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                            type="submit">
                            Create Student
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection

@push('scripts')
    <script>
        $(function () {
            $("#datepicker-sc").datepicker({dateFormat: 'yy-mm-dd'});
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
