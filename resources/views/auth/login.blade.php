@extends('layout.app')

@section('title', 'Login | RFID')
@section('content')
    @if ($errors->any() || session('failed'))
        <div class="fixed z-10 top-4 right-4">
            <div class="flex items-start w-full gap-4 px-4 py-3 text-sm text-red-600 border border-red-100 rounded bg-red-100/50"
                role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="1.5" role="graphics-symbol" aria-labelledby="title-09 desc-09">
                    <title id="title-09">Icon title</title>
                    <desc id="desc-09">A more detailed description of the icon</desc>
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div>
                    <h3 class="mb-2 font-semibold">Login failed!</h3>
                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    @if (session('failed'))
                        <p>{{ session('failed') }}</p>
                    @endif
                </div>
            </div>
        </div>
    @endif

    <div class="h-screen flex justify-center items-center bg-gray-100 p-5 md:p-0">
        <div class="w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md @if ($errors->any() || session('failed'))
            ring-2 ring-red-600 shadow-red-400 shadow-xl            
        @endif">
            <div class="px-6 py-4">
                <h3 class="mt-3 text-xl font-medium text-center text-gray-600">Selamat Datang</h3>

                <p class="mt-1 text-center text-gray-500">Masukkan Email dan Password anda</p>

                <form action="{{ route('login.submit') }}" method="POST">
                    @csrf
                    <div class="w-full mt-4">
                        <input
                            class="block w-full px-4 py-2 mt-2 text-black placeholder-gray-500 bg-white border rounded-lg ring-1 ring-gray-100 focus:border-blue-400 focus:ring-opacity-40 focus:outline-none focus:ring focus:ring-blue-300"
                            type="email" placeholder="Email" name="email" required />
                    </div>

                    <div class="w-full mt-4">
                        <input
                            class="block w-full px-4 py-2 mt-2 text-black placeholder-gray-500 bg-white border rounded-lg ring-1 ring-gray-100 focus:border-blue-400 focus:ring-opacity-40 focus:outline-none focus:ring focus:ring-blue-300"
                            type="password" placeholder="Password" name="password" required />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        {{-- <a href="#" class="text-sm text-black hover:text-gray-500">Forget
                            Password?</a> --}}

                        <button
                            class="px-6 py-2 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50 cursor-pointer">
                            Sign In
                        </button>
                    </div>
                </form>
            </div>
            {{-- <hr class="text-gray-500">
            <div class="flex items-center justify-center py-4 text-center bg-gray-50">
                <span class="text-sm text-black">Don't have an account? </span>

                <a href="#"
                    class="mx-2 text-sm font-bold text-blue-500 dark:text-blue-400 hover:underline">Register</a>
            </div> --}}
        </div>
    </div>
@endsection
