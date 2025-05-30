<header id="navbar"
    class="fixed z-20 w-full h-20 md:h-auto after:absolute after:top-full after:left-0 after:z-10 after:block after:h-px after:w-full lg:after:hidden transition-all duration-300 ease-in-out">

    <div class="relative mx-auto max-w-full px-6 lg:max-w-5xl xl:max-w-7xl 2xl:max-w-[96rem]">
        <nav aria-label="main navigation" class="flex h-[5.5rem] items-stretch justify-between font-medium text-slate-700"
            role="navigation">
            <div class="flex items-center gap-1 text-sm md:text-lg whitespace-nowrap focus:outline-none lg:flex-1">
                <img src="{{ asset('storage/image/logo-smk2klt.png') }}" alt="" class="w-12 md:w-16">
                SMKN 2 KLATEN | RFID
            </div>

            {{-- <button class="relative self-center order-10 visible block w-10 h-10 opacity-100 lg:hidden"
                   aria-expanded="false" aria-label="Toggle navigation">
                   <div class="absolute w-6 transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                       <span aria-hidden="true"
                           class="absolute block h-0.5 w-9/12 -translate-y-2 transform rounded-full bg-slate-900 transition-all duration-300"></span>
                       <span aria-hidden="true"
                           class="absolute block h-0.5 w-6 transform rounded-full bg-slate-900 transition duration-300"></span>
                       <span aria-hidden="true"
                           class="absolute block h-0.5 w-1/2 origin-top-left translate-y-2 transform rounded-full bg-slate-900 transition-all duration-300"></span>
                   </div>
               </button> --}}

            <ul role="menubar" aria-label="Select page"
                class="invisible absolute top-0 left-0 z-[-1] ml-auto h-screen w-full justify-center overflow-hidden overflow-y-auto overscroll-contain bg-white/90 px-8 pb-12 pt-28 font-medium opacity-0 transition-[opacity,visibility] duration-300 lg:visible lg:relative lg:top-0 lg:z-0 lg:flex lg:h-full lg:w-auto lg:items-stretch lg:overflow-visible lg:bg-white/0 lg:px-0 lg:py-0 lg:pt-0 lg:opacity-100">
                <li role="none" class="flex items-stretch">
                    <a role="menuitem" aria-haspopup="false"
                        class="flex items-center gap-2 transition-colors duration-300 hover:text-blue-600 focus:text-blue-600 focus:outline-none focus-visible:outline-none lg:px-4"
                        href="#about"> <span>About</span> </a>
                </li>
                <li role="none" class="flex items-stretch">
                    <a role="menuitem" aria-haspopup="false"
                        class="flex items-center gap-2 transition-colors duration-300 hover:text-blue-500 focus:text-blue-600 focus:outline-none focus-visible:outline-none lg:px-8"
                        href="#cara-absen"> <span>Cara Absen</span> </a>
                </li>
            </ul>

            <div class="flex items-center md:px-6 ml-auto lg:ml-0 lg:p-0">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ Auth::user()->is_admin ? url('/dashboard') : url('/student') }}"
                            class="inline-flex items-center justify-center h-8 px-3 text-xs sm:h-10 sm:px-5 sm:text-sm font-medium tracking-wide text-white transition duration-300 rounded whitespace-nowrap bg-blue-600 hover:bg-blue-500 hover:shadow-sm hover:shadow-blue-200 focus:bg-blue-500 focus:shadow-sm focus:shadow-blue-200 focus-visible:outline-none disabled:cursor-not-allowed disabled:border-blue-300 disabled:bg-blue-300 disabled:shadow-none">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="inline-flex items-center justify-center h-8 px-3 text-xs sm:h-10 sm:px-5 sm:text-sm font-medium tracking-wide text-white transition duration-300 rounded whitespace-nowrap bg-blue-600 hover:bg-blue-500 hover:shadow-sm hover:shadow-blue-200 focus:bg-blue-500 focus:shadow-sm focus:shadow-blue-200 focus-visible:outline-none disabled:cursor-not-allowed disabled:border-blue-300 disabled:bg-blue-300 disabled:shadow-none">
                            Log in
                        </a>
                    @endauth
                @endif
            </div>
        </nav>
    </div>
</header>
<script>
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 10) {
            navbar.classList.add('bg-white/80', 'shadow-lg', 'backdrop-blur-sm');
        } else {
            navbar.classList.remove('bg-white/80', 'shadow-lg', 'backdrop-blur-sm');
        }
    });
</script>
