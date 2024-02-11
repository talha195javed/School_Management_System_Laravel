@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col">
                <h2 class="text-gray-700 uppercase font-bold">Create Day Book</h2>
            </div>
            <div class="col-auto">
                <a href="{{ route('dayBook.index') }}" class="btn btn-secondary">
                    <svg class="w-4 h-4 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="long-arrow-alt-left" class="svg-inline--fa fa-long-arrow-alt-left fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"></path></svg>
                    <span class="ml-2">Back</span>
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('dayBook.update') }}" method="POST" class="max-w-xl mx-auto px-4 py-6">
                    @csrf

                    <input type="hidden" name="id" id="id" value="{{ $details->id }}">
                    <div class="mb-4">
                        <label class="form-label">Type</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" id="expense" value="2" {{ ($details->type == '2') ? 'checked' : '' }}>
                            <label class="form-check-label" for="expense">
                                Expense
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" id="income" value="1" {{ ($details->type == '1') ? 'checked' : '' }}>
                            <label class="form-check-label" for="income">
                                Income
                            </label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" name="description" id="description" class="form-control" placeholder="Enter Description" value="{{ $details->description }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" name="amount" id="amount" class="form-control" placeholder="Enter Amount" value="{{ $details->amount }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Edit Details</button>
                </form>
            </div>
        </div>
    </div>
@endsection
