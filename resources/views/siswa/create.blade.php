@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-[#EDECE] py-10 px-4">

    {{-- SUCCESS ALERT CENTER --}}
    @if(session('success'))
        <div id="successAlert"
             class="fixed inset-0 flex items-center justify-center z-50">

            <div class="absolute inset-0 bg-black/40 backdrop-blur-sm"></div>

            <div class="relative bg-white rounded-2xl shadow-2xl px-8 py-8 w-[90%] max-w-md text-center">

                <div class="mx-auto mb-4 w-16 h-16 flex items-center justify-center bg-green-100 text-green-600 rounded-full text-2xl font-bold">
                    ✓
                </div>

                <h2 class="text-xl font-semibold text-green-700">
                    Aspirasi Berhasil Dikirim 🎉
                </h2>

                <p class="text-gray-500 mt-2">
                    Terima kasih sudah menyampaikan aspirasi kamu.
                </p>

                <button onclick="closeAlert()"
                    class="mt-6 bg-[#296374] hover:bg-[#0C2C55] text-white px-6 py-2 rounded-xl transition">
                    Lanjutkan
                </button>

            </div>
        </div>
    @endif


    <div class="max-w-xl mx-auto bg-white p-8 rounded-2xl shadow-lg">

        <h1 class="text-2xl font-bold mb-6 text-[#0C2C55] text-center">
            Kirim Aspirasi
        </h1>

        <form action="{{ route('aspirasi.store') }}"
              method="POST"
              enctype="multipart/form-data"
              class="space-y-5">
            @csrf

            {{-- KATEGORI --}}
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-2">
                    Kategori
                </label>

                <select name="kategori_id"
                    required
                    class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-[#296374] focus:outline-none">

                    <option value="">-- Pilih Kategori --</option>

                    @foreach($kategoris as $k)
                        <option value="{{ $k->id }}">
                            {{ $k->nama_kategori }}
                        </option>
                    @endforeach

                </select>
            </div>

            {{-- FOTO --}}
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-2">
                    Upload Foto (Opsional)
                </label>
                <input type="file" name="foto"
                    class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:outline-none">
            </div>

            {{-- LOKASI --}}
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-2">
                    Lokasi
                </label>
                <input type="text" name="lokasi"
                    placeholder="Contoh: Ruang 12"
                    required
                    class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-[#296374] focus:outline-none">
            </div>

            {{-- KETERANGAN --}}
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-2">
                    Keterangan
                </label>
                <textarea name="keterangan" rows="4"
                    placeholder="Tuliskan detail aspirasi..."
                    required
                    class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-[#296374] focus:outline-none"></textarea>
            </div>

            {{-- BUTTON --}}
            <div>
                <button type="submit"
                    class="w-full bg-[#7AB2B2] hover:bg-[#4D869C] text-white font-semibold py-3 rounded-xl transition duration-200 shadow-md">
                    Kirim Aspirasi
                </button>
            </div>

        </form>

    </div>

</div>


{{-- SCRIPT AUTO CLOSE ALERT --}}
<script>
function closeAlert() {
    let alert = document.getElementById('successAlert');
    if(alert){
        alert.style.opacity = "0";
        setTimeout(() => alert.remove(), 300);
    }
}

setTimeout(function(){
    closeAlert();
}, 3000);
</script>

@endsection
