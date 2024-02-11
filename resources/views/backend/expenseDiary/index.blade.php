@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-gray-700 uppercase font-bold"> Income and Expenses</h2>
        <div class="row mb-4">
            <div class="col text-right">
                <a href="{{ route('dayBook.create') }}" class="btn btn-primary">
                    <svg class="w-4 h-4 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
                    <span class="ml-2">Add New Details</span>
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Income Record</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-gray-300">
                        <tr>
                            <th>Description</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($incomes as $income)
                            <tr>
                                <td>{{ $income->description }}</td>
                                <td>{{ $income->amount }}</td>
                                <td>
                                    <a href="{{ route('dayBook.edit', $income->id) }}" class="btn btn-sm btn-warning">
                                        <svg class="w-4 h-4 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-square" class="svg-inline--fa fa-pen-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M238.1 177.9L102.4 313.6l-6.3 57.1c-.8 7.6 5.6 14.1 13.3 13.3l57.1-6.3L302.2 242c2.3-2.3 2.3-6.1 0-8.5L246.7 178c-2.5-2.4-6.3-2.4-8.6-.1zM345 165.1L314.9 135c-9.4-9.4-24.6-9.4-33.9 0l-23.1 23.1c-2.3 2.3-2.3 6.1 0 8.5l55.5 55.5c2.3 2.3 6.1 2.3 8.5 0L345 199c9.3-9.3 9.3-24.5 0-33.9z"></path></svg>
                                    </a>
                                    <form action="{{ route('dayBook.destroy', $income->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger ml-1">
                                            <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" class="svg-inline--fa fa-trash fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path></svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td>Total:</td>
                            <td>{{ $incomes->sum('amount') }}</td>
                            <td></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Expenses Record</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-gray-300">
                        <tr>
                            <th>Description</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($expenses as $expense)
                            <tr>
                                <td>{{ $expense->description }}</td>
                                <td>{{ $expense->amount }}</td>
                                <td>
                                    <a href="{{ route('dayBook.edit', $expense->id) }}" class="btn btn-sm btn-warning">
                                        <svg class="w-4 h-4 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-square" class="svg-inline--fa fa-pen-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M238.1 177.9L102.4 313.6l-6.3 57.1c-.8 7.6 5.6 14.1 13.3 13.3l57.1-6.3L302.2 242c2.3-2.3 2.3-6.1 0-8.5L246.7 178c-2.5-2.4-6.3-2.4-8.6-.1zM345 165.1L314.9 135c-9.4-9.4-24.6-9.4-33.9 0l-23.1 23.1c-2.3 2.3-2.3 6.1 0 8.5l55.5 55.5c2.3 2.3 6.1 2.3 8.5 0L345 199c9.3-9.3 9.3-24.5 0-33.9z"></path></svg>
                                    </a>
                                    <form action="{{ route('dayBook.destroy', $expense->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger ml-1">
                                            <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" class="svg-inline--fa fa-trash fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path></svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td>Total:</td>
                            <td>{{ $expenses->sum('amount') }}</td>
                            <td></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Fee Record</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-gray-300">
                        <tr>
                            <th></th>
                            <th>Amount Collected</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Total</td>
                                <td>{{ $fees }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Stationary Record</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-gray-300">
                        <tr>
                            <th></th>
                            <th>Amount Collected</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Total</td>
                            <td>{{ $stationary }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
