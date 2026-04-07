@extends('layouts.app')

@section('content')

<div class="bg-[#EEF7FF] min-h-screen">


{{-- NAVBAR --}}
<nav class="bg-white shadow-sm">

    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <h1 class="text-xl font-bold text-[#4D869C] tracking-wide">
            LAPORIN
        </h1>

    </div>

</nav>



{{-- HERO --}}
<section class="min-h-screen flex items-center">

    <div class="max-w-7xl mx-auto px-6 w-full">

        <div class="grid md:grid-cols-2 gap-12 items-center">

            {{-- LEFT --}}
            <div class="space-y-6">

                <h1 class="text-4xl md:text-5xl font-bold text-[#4D869C] leading-tight">
                    Pengaduan
                    <br>
                    Sarana Sekolah
                </h1>

                <p class="text-gray-600 text-lg">
                    <span class="font-semibold text-[#4D869C]">LAPORIN</span>
                    membantu siswa menyampaikan aspirasi dan laporan
                    fasilitas sekolah dengan cepat, transparan,
                    dan mudah dipantau.
                </p>

                <div class="flex gap-4 pt-4">

                    <a href="#fitur"
                       class="border border-[#4D869C] text-[#4D869C] px-7 py-3 rounded-xl hover:bg-[#CDE8E5] transition">
                        Pelajari
                    </a>

                </div>

            </div>

            {{-- RIGHT --}}
            <div class="flex justify-center">

                <div class="bg-[#CDE8E5] w-72 h-72 rounded-3xl shadow-xl flex items-center justify-center">

                    <img src="{{ asset('storage/images/logo.png') }}">

                </div>

            </div>

        </div>

    </div>

</section>

{{-- FITUR --}}
<section id="fitur" class="bg-[#CDE8E5] py-20">

    <div class="max-w-7xl mx-auto px-6 text-center">

        <h2 class="text-3xl font-bold text-[#4D869C] mb-14">
            Kenapa Menggunakan LAPORIN?
        </h2>


        <div class="grid md:grid-cols-3 gap-8">


            {{-- CARD --}}
            <div class="bg-white p-8 rounded-2xl shadow hover:shadow-xl transition">

                <div class="text-4xl mb-4">
                    ⚡
                </div>

                <h3 class="font-semibold text-lg text-[#4D869C] mb-2">
                    Cepat & Mudah
                </h3>

                <p class="text-gray-600 text-sm">
                    Kirim laporan fasilitas sekolah hanya dalam beberapa langkah sederhana.
                </p>

            </div>



            {{-- CARD --}}
            <div class="bg-white p-8 rounded-2xl shadow hover:shadow-xl transition">

                <div class="text-4xl mb-4">
                    📊
                </div>

                <h3 class="font-semibold text-lg text-[#4D869C] mb-2">
                    Transparan
                </h3>

                <p class="text-gray-600 text-sm">
                    Pantau status laporan yang telah dikirim secara real-time.
                </p>

            </div>



            {{-- CARD --}}
            <div class="bg-white p-8 rounded-2xl shadow hover:shadow-xl transition">

                <div class="text-4xl mb-4">
                    🔒
                </div>

                <h3 class="font-semibold text-lg text-[#4D869C] mb-2">
                    Aman
                </h3>

                <p class="text-gray-600 text-sm">
                    Data pelapor dijaga dengan sistem keamanan yang baik.
                </p>

            </div>


        </div>

    </div>

</section>



{{-- BUTTON --}}
<section class="py-20 text-center bg-[#EEF7FF]">

    <h2 class="text-3xl font-bold text-[#4D869C] mb-6">
        Mulai Laporkan Sekarang
    </h2>

    <p class="text-gray-600 mb-8">
        Sampaikan aspirasi dan bantu meningkatkan fasilitas sekolah.
    </p>

    <a href="{{ url('/login') }}"
       class="bg-[#4D869C] hover:bg-[#7AB2B2] text-white px-8 py-3 rounded-xl shadow transition">
        Login Yuk?
    </a>

</section>



{{-- FOOTER --}}
<footer class="bg-[#4D869C] text-white py-6 text-center">

    <p class="text-sm">
        © {{ date('Y') }} LAPORIN — Sistem Pengaduan Sarana Sekolah
    </p>

</footer>


</div>

@endsection
