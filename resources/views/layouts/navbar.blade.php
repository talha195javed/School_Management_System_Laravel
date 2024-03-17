<div class="bg-blue-700 px-4 sm:px-6 py-3 flex items-center justify-between shadow h-16 fixed top-0 left-0 right-0 z-50" style="background-color: #0a1e4b !important;">
    <div class="flex items-center text-white">
        <h2 class="m-0 text-primary"><img src="/web_img/new logo.png" alt="School Logo" class="me-3" style="height: 66px; width: 200%"></h2>
    </div>
    <div class="relative">
        @auth
            <div style="display: flex">
                <div style="padding-right: 10px" class="relative sm:hidden">
                    <div class="flex items-center cursor-pointer" id="opennavdropdown">
                        <button class="text-white text-sm font-semibold focus:outline-none" id="menuDropdown" aria-expanded="false">
                            Menu
                            <svg class="w-4 h-4 stroke-current text-gray-200 ml-1 feather feather-chevron-down" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"></polyline></svg>
                        </button>
                    </div>
                    <div class="bg-blue-700 absolute top-0 right-0 mt-12 -mr-6 shadow rounded-bl rounded-br">
                        <div class="hidden" id="navdropdown">
                            <div class="px-8 py-4 border-t border-blue-800">
                                <a href="{{ route('home') }}" class="flex items-center pb-3 text-sm text-gray-200 font-semibold">
                                    <i class="fas fa-tachometer-alt mr-2"></i>
                                    <span>Dashboard</span>
                                </a>
                                @role('Admin')
                                <a href="{{ route('classes.index') }}" class="flex items-center pb-3 text-sm text-gray-200 font-semibold">
                                    <i class="fas fa-chalkboard-teacher mr-2"></i>
                                    <span>Classes</span>
                                </a>
                                <a href="{{ route('teacher.index') }}" class="flex items-center pb-3 text-sm text-gray-200 font-semibold">
                                    <i class="fas fa-user-tie mr-2"></i>
                                    <span>Teachers</span>
                                </a>
                                <a href="{{ route('teacher.attends') }}" class="flex items-center pb-3 text-sm text-gray-200 font-semibold">
                                    <i class="fas fa-user-tie mr-2"></i>
                                    <span>Teachers Attends</span>
                                </a>
                                <a href="{{ route('dayBook.index') }}" class="flex items-center pb-3 text-sm text-gray-200 font-semibold">
                                    <i class="fas fa-book mr-2"></i>
                                    <span>Day Book</span>
                                </a>
                                <a href="{{ route('student.index', ['shift' => 'school', 'status' => 1]) }}" class="flex items-center pb-3 text-sm text-gray-200 font-semibold">
                                    <i class="fas fa-school mr-2"></i>
                                    <span>School Students</span>
                                </a>
                                <a href="{{ route('student.index', ['shift' => 'academy', 'status' => 1]) }}" class="flex items-center pb-3 text-sm text-gray-200 font-semibold">
                                    <i class="fas fa-university mr-2"></i>
                                    <span>Academy Students</span>
                                </a>
                                <a href="{{ route('student.index', ['shift' => 'school', 'status' => 0]) }}" class="flex items-center pb-3 text-sm text-gray-200 font-semibold">
                                    <i class="fas fa-school mr-2"></i>
                                    <span>Inactive School Students</span>
                                </a>
                                <a href="{{ route('student.index', ['shift' => 'academy', 'status' => 0]) }}" class="flex items-center pb-3 text-sm text-gray-200 font-semibold">
                                    <i class="fas fa-university mr-2"></i>
                                    <span>Inactive Academy Students</span>
                                </a>
                                @endrole
                            </div>
                        </div>
                    </div>
                </div>
                <div style="padding-right: 10px">
                <form action="{{ route('logout') }}" method="POST" class="pb-2">
                    @csrf
                    <button class="flex items-center text-sm text-gray-200 font-semibold focus:outline-none" type="submit">
                        <svg class="h-4 w-4 mr-2 fill-current text-gray-200" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sign-out-alt" class="svg-inline--fa fa-sign-out-alt fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z"></path></svg>
                        <span>{{ __('Logout') }}</span>
                    </button>
                </form>
                </div>
                <div>
                <a href="{{ route('profile') }}" class="flex items-center pb-3 text-sm text-gray-200 font-semibold">
                    <svg class="h-4 w-4 mr-2 fill-current text-gray-200" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-alt" class="svg-inline--fa fa-user-alt fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 288c79.5 0 144-64.5 144-144S335.5 0 256 0 112 64.5 112 144s64.5 144 144 144zm128 32h-55.1c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16H128C57.3 320 0 377.3 0 448v16c0 26.5 21.5 48 48 48h416c26.5 0 48-21.5 48-48v-16c0-70.7-57.3-128-128-128z"></path></svg>
                    <span>Profile</span>
                </a>
                </div>
                </div>
        @else
            <div class="flex items-center">
                @if (Route::has('login'))
                    <div>
                        <a class="flex items-center mr-4 text-sm text-gray-200 font-semibold" href="{{ route('login') }}">
                            <svg class="h-3 w-3 mr-1 fill-current text-gray-200" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sign-in-alt" class="svg-inline--fa fa-sign-in-alt fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M416 448h-84c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h84c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32h-84c-6.6 0-12-5.4-12-12V76c0-6.6 5.4-12 12-12h84c53 0 96 43 96 96v192c0 53-43 96-96 96zm-47-201L201 79c-15-15-41-4.5-41 17v96H24c-13.3 0-24 10.7-24 24v96c0 13.3 10.7 24 24 24h136v96c0 21.5 26 32 41 17l168-168c9.3-9.4 9.3-24.6 0-34z"></path></svg>
                            <span>Login</span>
                        </a>
                    </div>
                @endif
            </div>
        @endauth
    </div>
</div>
