@extends('layouts.app')

@section('content')

    <div class="roles">

        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">Add Fee Details for this Student</h2>
            </div>
        </div>

        <div class="table w-full mt-8 bg-white rounded">
            <form action="{{ route('pay.store') }}" method="POST">
                @csrf
                <input type="hidden" name="teacher_id" value="{{ $teacherId }}">

                <div class="mb-4">
                    <label for="month" class="block text-gray-700 font-bold mb-2">Month:</label>
                    <input type="month" name="month" id="month" value="{{ now()->format('Y-m') }}" readonly class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4" hidden>
                    <label for="totaldays" class="block text-gray-700 font-bold mb-2">Total Days</label>
                    <input type="text" name="totaldays" id="totaldays" value="{{$numberOfDays}}" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" readonly>
                </div>

                <div class="mb-4">
                    <label for="total_leaves" class="block text-gray-700 font-bold mb-2">Total Leaves</label>
                    <input type="number" name="total_leaves" id="total_leaves" value="{{$attendances}}" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" readonly>
                </div>

                <div class="mb-4">
                    <label for="total_pay" class="block text-gray-700 font-bold mb-2">Total Pay</label>
                    <input type="number" name="total_pay" id="total_pay" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>

                <div class="mb-4">
                    <label for="pay_paid" class="block text-gray-700 font-bold mb-2">Pay to Paid:</label>
                    <input type="number" name="pay_paid" id="pay_paid" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required readonly>
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
<script>
    $(document).ready(function() {

        $('#total_pay').change(function() {
            var totalPay = parseFloat($(this).val());
            var totalLeaves = parseFloat($('#total_leaves').val());
            var totalDays = parseFloat($('#totaldays').val());

            var payPaid = totalPay - ((totalPay / totalDays) * totalLeaves);
            $(`#pay_paid`).val(payPaid.toFixed(2));
        });
    });
</script>
@endpush
