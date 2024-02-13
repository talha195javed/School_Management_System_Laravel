<div class="sidebar hidden sm:block w-0 sm:w-1/6 bg-gray-200 h-screen shadow fixed top-0 left-0 bottom-0 z-40 overflow-y-auto">
    <div class="mb-6 mt-20 px-6">
        <ul class="list-none">
            <li>
                <a href="{{ route('home') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700"><i class="fas fa-tachometer-alt mr-2"></i><span class="text-sm font-semibold">Dashboard</span></a>
            </li>
            @role('Admin')
            <li>
                <a href="{{ route('classes.index') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700"><i class="fas fa-chalkboard-teacher mr-2"></i><span class="text-sm font-semibold">Classes</span></a>
            </li>
{{--            <li>--}}
{{--                <a href="{{ route('subject.index') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700"><i class="fas fa-book mr-2"></i><span class="text-sm font-semibold">Subjects</span></a>--}}
{{--            </li>--}}
            <li>
                <a href="{{ route('teacher.index') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700"><i class="fas fa-user-tie mr-2"></i><span class="text-sm font-semibold">Teachers</span></a>
            </li>
{{--            <li>--}}
{{--                <a href="{{ route('parents.index') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700"><i class="fas fa-user-friends mr-2"></i><span class="text-sm font-semibold">Parents</span></a>--}}
{{--            </li>--}}
            <li>
                <a href="{{ route('dayBook.index') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700"><i class="fas fa-book mr-2"></i><span class="text-sm font-semibold">Day Book</span></a>
            </li>
            <li>
                <span class="flex items-center text-gray-600 py-2 hover:text-blue-700 cursor-pointer toggle-options" id="toggleOptions">
                    <i class="fas fa-user-graduate mr-2"></i>
                    <span class="text-sm font-semibold">Students</span>
                    <i class="fas fa-chevron-down ml-auto"></i>
                </span>
                <ul class="pl-4 hidden" id="optionsList">
                    <li>
                        <a href="{{ route('student.index', ['shift' => 'school', 'status' => 1]) }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
                            <i class="fas fa-school mr-2"></i>
                            <span class="text-sm font-semibold">School Students</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('student.index', ['shift' => 'academy', 'status' => 1]) }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
                            <i class="fas fa-university mr-2"></i>
                            <span class="text-sm font-semibold">Academy Students</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('student.index', ['shift' => 'school', 'status' => 0]) }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
                            <i class="fas fa-school mr-2"></i>
                            <span class="text-sm font-semibold">Inactive School Students</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('student.index', ['shift' => 'academy', 'status' => 0]) }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700">
                            <i class="fas fa-university mr-2"></i>
                            <span class="text-sm font-semibold">Inactive Academy Students</span>
                        </a>
                    </li>
                </ul>
            </li>
{{--            <li>--}}
{{--                <a href="{{ route('attendance.index') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700"><i class="far fa-calendar-check mr-2"></i><span class="text-sm font-semibold">Attendance</span></a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="{{ route('assignrole.index') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700"><i class="fas fa-user-lock mr-2"></i><span class="text-sm font-semibold">Assign Role</span></a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="{{ route('roles-permissions') }}" class="flex items-center text-gray-600 py-2 hover:text-blue-700"><i class="fas fa-users-cog mr-2"></i><span class="text-sm font-semibold">Roles &amp; Permissions</span></a>--}}
{{--            </li>--}}
            @endrole
        </ul>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggleOptions = document.getElementById("toggleOptions");
        const optionsList = document.getElementById("optionsList");

        toggleOptions.addEventListener("click", function () {
            optionsList.classList.toggle("hidden");
        });
    });
</script>
