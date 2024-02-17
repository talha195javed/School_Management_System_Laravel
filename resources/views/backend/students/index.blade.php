@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="text-gray-700 uppercase font-bold">Students</h2>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('student.create') }}" class="btn btn-outline-primary">
                    <i class="fas fa-plus"></i>
                    <span class="ml-2">Student</span>
                </a>
            </div>
        </div>
        <input type="text" id="searchInput" placeholder="Search..." class="form-control mt-4">
        <table class="mt-4 table table-bordered table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Class</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody id="tableBody">
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->user->name }}</td>
                    <td>{{ $student->user->email }}</td>
                    <td>{{ $student->class->class_name ?? '' }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>
                        <a href="{{ route('student.show', $student->id) }}" class="btn btn-sm btn-outline-primary" title="Assign Subject">
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('student.edit', $student->id) }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('student.destroy', $student->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $students->links() }}
        </div>

        @include('backend.modals.delete',['name' => 'student'])
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const tableBody = document.getElementById('tableBody');

            searchInput.addEventListener('input', function() {
                const searchQuery = this.value.toLowerCase();
                const rows = tableBody.querySelectorAll('tr');

                rows.forEach(row => {
                    const columns = row.querySelectorAll('td');
                    let found = false;

                    columns.forEach(column => {
                        const text = column.textContent.toLowerCase();
                        if (text.includes(searchQuery)) {
                            found = true;
                        }
                    });

                    if (found) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });
    </script>
@endpush
