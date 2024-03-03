@extends('layouts.app')

@section('content')
    <div class="roles">

        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">Edit Fee Details for this Student</h2>
            </div>
        </div>

        <div class="table w-full mt-8 bg-white rounded">
            <form action="{{ route('fee.store') }}" method="POST">
                @csrf
                <input type="hidden" name="student_id" value="{{ $studentId }}">

                <div class="mb-4">
                    <label for="month" class="block text-gray-700 font-bold mb-2">Month:</label>
                    <input type="month" name="month" id="month" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter month" required>
                </div>

                <div class="mb-4">
                    <label for="fee_submitted" class="block text-gray-700 font-bold mb-2">Fee Submitted:</label>
                    <input type="number" name="fee_submitted" id="fee_submitted" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter fee submitted" required>
                </div>

                <button type="submit" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 rounded">Add Fee Details</button>

            </form>

        </div>

    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            $( "#datepicker-sc" ).datepicker({ dateFormat: 'yy-mm-dd' });
        })
    </script>
@endpush
