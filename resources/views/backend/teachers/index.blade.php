@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="text-gray-700 uppercase font-bold">Teachers</h2>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('teacher.create') }}" class="btn btn-outline-primary">
                    <i class="fas fa-plus"></i>
                    <span class="ml-2">Teacher</span>
                </a>
            </div>
        </div>
        <div class="mt-4 bg-white rounded border-b-4 border-gray-300">
            <div class="row bg-gray-300 text-gray-600 text-sm font-semibold py-3">
                <div class="col-md-2">Name</div>
                <div class="col-md-3">Email</div>
                <div class="col-md-3">Subject Code</div>
                <div class="col-md-2">Phone</div>
                <div class="col-md-2 text-right">Action</div>
            </div>
            @foreach ($teachers as $teacher)
                <div class="row border-t border-l-4 border-r-4 border-gray-300 text-gray-700 py-3">
                    <div class="col-md-2">{{ $teacher->user->name }}</div>
                    <div class="col-md-3">{{ $teacher->user->email }}</div>
                    <div class="col-md-3">
                        @foreach ($teacher->subjects as $subject)
                            <span class="badge bg-secondary">{{ $subject->subject_code }}</span>
                        @endforeach
                    </div>
                    <div class="col-md-2">{{ $teacher->phone }}</div>
                    <div class="col-md-2 text-right">
                        <a href="{{ route('teacher.edit', $teacher->id) }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('teacher.destroy', $teacher->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-4">
            {{ $teachers->links() }}
        </div>

        @include('backend.modals.delete',['name' => 'teacher'])
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            $( ".deletebtn" ).on( "click", function(event) {
                event.preventDefault();
                $( "#deletemodal" ).toggleClass( "hidden" );
                var url = $(this).attr('data-url');
                $(".remove-record").attr("action", url);
            })

            $( "#deletemodelclose" ).on( "click", function(event) {
                event.preventDefault();
                $( "#deletemodal" ).toggleClass( "hidden" );
            })
        })
    </script>
@endpush

