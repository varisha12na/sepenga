@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#EEF7FF] flex">

    {{-- LEFT SIDE --}}
    <div class="hidden md:flex w-1/2 bg-[#CDE8E5] items-center justify-center">

        <div class="text-center max-w-md px-8 space-y-3">

            <img src="{{ asset('storage/images/logo.png') }}" class="mx-auto w-56">

            <h1 class="text-4xl font-bold text-[#4D869C] mb-2">
                LAPORIN
            </h1>

            <p class="text-gray-600 leading-relaxed">
                Pengaduan sarana sekolah yang membantu siswa
                menyampaikan laporan dengan cepat, transparan,
                dan mudah dipantau.
            </p>

        </div>

    </div>


    {{-- RIGHT SIDE LOGIN --}}
    <div class="flex w-full md:w-1/2 items-center justify-center px-6">

        <div class="bg-white w-full max-w-md p-8 rounded-3xl shadow-xl">

            {{-- ERROR --}}
            @if(session('error'))
                <div class="bg-red-100 text-red-600 px-4 py-2 rounded-lg mb-5 text-sm">
                    {{ session('error') }}
                </div>
            @endif


            <h2 id="formTitle"
                class="text-2xl font-bold text-center text-[#4D869C] mb-8">
                Login Siswa
            </h2>


            <form method="POST" action="/login">
                @csrf

                <input type="hidden" name="role" id="roleInput" value="siswa">


                {{-- USERNAME --}}
                <div class="mb-5">

                    <label class="text-sm text-gray-600">
                        Username
                    </label>

                    <div class="flex items-center border rounded-xl mt-1 px-3 py-2 focus-within:ring-2 focus-within:ring-[#7AB2B2]">

                        <span class="mr-2 text-gray-400">👤</span>

                        <input
                            type="text"
                            name="username"
                            value="{{ old('username') }}"
                            required
                            class="w-full outline-none"
                        >

                    </div>

                    @error('username')
                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- PASSWORD --}}
                <div class="mb-6">

                    <label class="text-sm text-gray-600">
                        Password
                    </label>

                    <div class="flex items-center border rounded-xl mt-1 px-3 py-2 focus-within:ring-2 focus-within:ring-[#7AB2B2]">

                        <span class="mr-2 text-gray-400">🔒</span>

                        <input
                            type="password"
                            name="password"
                            required
                            class="w-full outline-none"
                        >

                    </div>

                    @error('password')
                        <p class="text-red-500 text-xs mt-1">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- BUTTON --}}
                <button
                    id="loginButton"
                    class="w-full bg-[#4D869C] hover:bg-[#7AB2B2] text-white py-3 rounded-xl font-semibold transition"
                >
                    Login Siswa
                </button>

            </form>


            {{-- TOGGLE ROLE --}}
            <div class="mt-6 text-center">

                <button
                    onclick="toggleLogin(event)"
                    class="text-sm text-[#4D869C] hover:underline"
                >
                    Login sebagai Admin
                </button>

            </div>

        </div>

    </div>

</div>


<script>

function toggleLogin(e){

    const title = document.getElementById('formTitle')
    const roleInput = document.getElementById('roleInput')
    const loginButton = document.getElementById('loginButton')
    const toggleBtn = e.target

    if(roleInput.value === 'siswa'){

        title.innerText = 'Login Admin'
        roleInput.value = 'admin'

        loginButton.innerText = 'Login Admin'
        loginButton.classList.remove('bg-[#4D869C]')
        loginButton.classList.add('bg-[#7AB2B2]')

        toggleBtn.innerText = 'Login sebagai Siswa'

    }else{

        title.innerText = 'Login Siswa'
        roleInput.value = 'siswa'

        loginButton.innerText = 'Login Siswa'
        loginButton.classList.remove('bg-[#7AB2B2]')
        loginButton.classList.add('bg-[#4D869C]')

        toggleBtn.innerText = 'Login sebagai Admin'

    }

}

</script>

@endsection
