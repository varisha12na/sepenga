@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#CDE8E5]">

    {{-- SUCCESS ALERT --}}
    @if(session('success'))
        <div id="successAlert" class="fixed inset-0 flex items-center justify-center bg-black/40 backdrop-blur-sm z-50">

            <div class="bg-white p-8 rounded-2xl shadow-xl text-center w-[90%] max-w-sm">

                <div class="w-16 h-16 mx-auto flex items-center justify-center bg-[#CDE8E5] text-[#4D869C] rounded-full text-2xl font-bold mb-4">
                    ✓
                </div>

                <h2 class="font-bold text-[#4D869C] text-lg">
                    Aksi Berhasil
                </h2>

                <p class="text-gray-500 text-sm">
                    {{ session('success') }}
                </p>

                <button onclick="closeAlert()"
                    class="mt-5 bg-[#4D869C] hover:bg-[#7AB2B2] text-white px-6 py-2 rounded-lg transition">
                    Lanjutkan
                </button>

            </div>
        </div>
    @endif


    {{-- NAVBAR --}}
    <div class="bg-[#4D869C] text-white shadow">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-xl font-semibold tracking-wide">
                LAPORIN
            </h1>

            <div class="flex items-center gap-6">
                <div class="text-sm text-white/90">
                    {{ Auth::user()->name }} • {{ Auth::user()->kelas }}
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="bg-white text-[#4D869C] px-4 py-2 rounded-lg text-sm">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- CONTENT --}}
    <div class="max-w-7xl mx-auto px-6 py-10">

        {{-- HEADER --}}
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-2xl font-bold text-[#4D869C]">
                    Dashboard Siswa
                </h2>
                <p class="text-gray-600 text-sm">
                    Pantau dan kirim aspirasi sekolah dengan mudah
                </p>
            </div>

            <a href="/siswa/aspirasi/create"
               class="bg-[#7AB2B2] hover:bg-[#4D869C] text-white px-6 py-3 rounded-xl shadow-md transition">
                + Kirim Aspirasi
            </a>
        </div>

        {{-- HISTORI --}}
        <div class="bg-white rounded-2xl shadow p-8">

            <h2 class="text-xl font-bold text-[#4D869C] mb-6">
                Histori Aspirasi
            </h2>

            @forelse($aspirasi as $a)

            <div class="py-5 border-b hover:bg-[#EEF7FF] px-4 rounded-lg transition">

                <div class="flex items-start gap-4">

                    {{-- FOTO --}}
                    @if($a->foto)
                        <img src="{{ asset('storage/' . $a->foto) }}"
                             class="w-20 h-20 object-cover rounded-xl shadow">
                    @else
                        <div class="w-20 h-20 bg-gray-200 rounded-xl flex items-center justify-center text-xs text-gray-400">
                            No Image
                        </div>
                    @endif

                    {{-- ISI --}}
                    <div class="flex-1">

                        <div class="flex justify-between items-start">

                            <div>
                                <p class="font-semibold text-[#4D869C]">
                                    {{ $a->kategori->nama_kategori }}
                                </p>

                                <p class="text-xs text-gray-400">
                                    {{ $a->created_at->format('d M Y') }}
                                </p>
                            </div>

                            <span class="px-3 py-1 rounded-full text-xs font-medium
                                @if($a->status == 'proses')
                                    bg-[#7AB2B2]/20 text-[#4D869C]
                                @elseif($a->status == 'selesai')
                                    bg-[#CDE8E5] text-green-700
                                @else
                                    bg-gray-200 text-gray-600
                                @endif">
                                {{ ucfirst($a->status) }}
                            </span>

                        </div>

                        <p class="text-sm text-gray-600 mt-2">
                            {{ $a->keterangan }}
                        </p>

                        <div class="flex gap-2 mt-4">

                            @if($a->status == 'menunggu')
                                <form action="/siswa/aspirasi/{{ $a->id }}" method="POST"
                                    onsubmit="return confirm('Yakin mau hapus?')">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-xs">
                                        Hapus
                                    </button>
                                </form>
                            @endif

                        </div>

                    </div>

                </div>

            </div>

            @empty
                <p class="text-gray-400 text-center py-10">
                    Belum ada aspirasi
                </p>
            @endforelse

        </div>

    </div>

</div>

<script>
function closeAlert() {
    let alert = document.getElementById('successAlert');
    if (alert) {
        alert.style.opacity = "0";
        setTimeout(() => alert.remove(), 300);
    }
}
setTimeout(closeAlert, 3000);
</script>

@endsection
