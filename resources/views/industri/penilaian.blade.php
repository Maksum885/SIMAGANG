@extends('layouts.dashboard-industri')

@section('content')

<div class="p-5 text-2xl">
    <h1 class="text-4xl underline font-bold mb-6">Form Penilaian PKL oleh Pembimbing Industri</h1>

    {{-- Alert Messages --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-white p-6 rounded shadow w-full">
        <form action="{{ route('industri.penilaian.store') }}" method="POST">
            @csrf
            
            {{-- Dropdown Pilih Siswa --}}
            <div class="mb-6">
                <label for="siswa_id" class="block font-semibold mb-3">Pilih Siswa</label>
                <select name="siswa_id" id="siswa_id" required
                    class="w-full border border-gray-300 rounded px-3 py-2" onchange="loadExistingData()">
                    <option value="" disabled selected>-- Pilih Siswa --</option>
                    @foreach($siswa as $s)
                        <option value="{{ $s->id }}">{{ $s->user->nama_lengkap }} - {{ $s->nis }}</option>
                    @endforeach
                </select>
                @error('siswa_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tabs --}}
            <div class="mb-6 border-b border-gray-300 flex">
                <button type="button" id="tab-teknis" aria-selected="true"
                    onclick="switchTab('teknis')"
                    class="px-4 py-2 border-b-2 border-blue-600 text-blue-600 hover:text-blue-600 font-semibold focus:outline-none cursor-pointer">
                    Aspek Teknis
                </button>
                <button type="button" id="tab-nonteknis" aria-selected="false"
                    onclick="switchTab('nonteknis')"
                    class="px-4 py-2 border-b-2 border-transparent text-gray-600 hover:text-blue-600 focus:outline-none cursor-pointer">
                    Aspek Non-Teknis
                </button>
            </div>

            {{-- Panel Aspek Teknis --}}
            <section id="panel-teknis" class="mb-6">
                <table class="w-full border border-gray-400 rounded shadow">
                    <thead class="bg-gray-300">
                        <tr>
                            <th class="p-3 border-r border-gray-400 text-left">Elemen Teknis</th>
                            <th class="p-3 border-gray-400 text-center">Nilai (1-10)</th>
                            <th class="p-3 border-l border-gray-400 text-left">Komentar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white">
                            <td class="p-3 border-r border-gray-400">Pemahaman Alat dan Mesin</td>
                            <td class="p-3 border-gray-400">
                                <input type="number" name="teknis_nilai[0]" min="1" max="10" required
                                    class="w-full border border-gray-400 rounded px-2 py-1 input-nilai-teknis"
                                    oninput="hitungTotal('teknis')">
                                @error('teknis_nilai.0')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </td>
                            <td class="p-3 border-l border-gray-400">
                                <input type="text" name="teknis_komentar[0]" placeholder="Komentar opsional"
                                    class="w-full border border-gray-400 rounded px-2 py-1">
                            </td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="p-3 border-r border-gray-400">Keterampilan Teknik</td>
                            <td class="p-3 border-gray-400">
                                <input type="number" name="teknis_nilai[1]" min="1" max="10" required
                                    class="w-full border border-gray-400 rounded px-2 py-1 input-nilai-teknis"
                                    oninput="hitungTotal('teknis')">
                                @error('teknis_nilai.1')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </td>
                            <td class="p-3 border-l border-gray-400">
                                <input type="text" name="teknis_komentar[1]" placeholder="Komentar opsional"
                                    class="w-full border border-gray-400 rounded px-2 py-1">
                            </td>
                        </tr>
                        <tr class="bg-white">
                            <td class="p-3 border-r border-gray-400">Keselamatan Kerja</td>
                            <td class="p-3 border-gray-400">
                                <input type="number" name="teknis_nilai[2]" min="1" max="10" required
                                    class="w-full border border-gray-400 rounded px-2 py-1 input-nilai-teknis"
                                    oninput="hitungTotal('teknis')">
                                @error('teknis_nilai.2')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </td>
                            <td class="p-3 border-l border-gray-400">
                                <input type="text" name="teknis_komentar[2]" placeholder="Komentar opsional"
                                    class="w-full border border-gray-400 rounded px-2 py-1">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-right font-semibold mt-2">
                    Total Nilai Aspek Teknis: <span id="total-teknis">0</span>
                </div>
            </section>

            {{-- Panel Aspek Non-Teknis --}}
            <section id="panel-nonteknis" class="mb-6 hidden">
                <table class="w-full border border-gray-400 rounded">
                    <thead class="bg-gray-300">
                        <tr>
                            <th class="p-3 border-r border-gray-400 text-left">Elemen Non-Teknis</th>
                            <th class="p-3 border-gray-400 text-center">Nilai (1-10)</th>
                            <th class="p-3 border-l border-gray-400 text-left">Komentar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white">
                            <td class="p-3 border-r border-gray-400">Disiplin</td>
                            <td class="p-3 border-gray-400">
                                <input type="number" name="nonteknis_nilai[0]" min="1" max="10" required
                                    class="w-full border border-gray-400 rounded px-2 py-1 input-nilai-nonteknis"
                                    oninput="hitungTotal('nonteknis')">
                                @error('nonteknis_nilai.0')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </td>
                            <td class="p-3 border-l border-gray-400">
                                <input type="text" name="nonteknis_komentar[0]" placeholder="Komentar opsional"
                                    class="w-full border border-gray-400 rounded px-2 py-1">
                            </td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="p-3 border-r border-gray-400">Kerjasama</td>
                            <td class="p-3 border-gray-400">
                                <input type="number" name="nonteknis_nilai[1]" min="1" max="10" required
                                    class="w-full border border-gray-400 rounded px-2 py-1 input-nilai-nonteknis"
                                    oninput="hitungTotal('nonteknis')">
                                @error('nonteknis_nilai.1')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </td>
                            <td class="p-3 border-l border-gray-400">
                                <input type="text" name="nonteknis_komentar[1]" placeholder="Komentar opsional"
                                    class="w-full border border-gray-400 rounded px-2 py-1">
                            </td>
                        </tr>
                        <tr class="bg-white">
                            <td class="p-3 border-r border-gray-400">Inisiatif</td>
                            <td class="p-3 border-gray-400">
                                <input type="number" name="nonteknis_nilai[2]" min="1" max="10" required
                                    class="w-full border border-gray-400 rounded px-2 py-1 input-nilai-nonteknis"
                                    oninput="hitungTotal('nonteknis')">
                                @error('nonteknis_nilai.2')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </td>
                            <td class="p-3 border-l border-gray-400">
                                <input type="text" name="nonteknis_komentar[2]" placeholder="Komentar opsional"
                                    class="w-full border border-gray-400 rounded px-2 py-1">
                            </td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="p-3 border-r border-gray-400">Tanggung Jawab</td>
                            <td class="p-3 border-gray-400">
                                <input type="number" name="nonteknis_nilai[3]" min="1" max="10" required
                                    class="w-full border border-gray-400 rounded px-2 py-1 input-nilai-nonteknis"
                                    oninput="hitungTotal('nonteknis')">
                                @error('nonteknis_nilai.3')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </td>
                            <td class="p-3 border-l border-gray-400">
                                <input type="text" name="nonteknis_komentar[3]" placeholder="Komentar opsional"
                                    class="w-full border border-gray-400 rounded px-2 py-1">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-right font-semibold mt-2">
                    Total Nilai Aspek Non-Teknis: <span id="total-nonteknis">0</span>
                </div>
            </section>

            {{-- Catatan Umum --}}
            <div class="mb-6">
                <label for="catatan_umum" class="block font-semibold mb-3">Catatan Umum (Opsional)</label>
                <textarea name="catatan_umum" id="catatan_umum" rows="4" 
                    class="w-full border border-gray-300 rounded px-3 py-2" 
                    placeholder="Berikan catatan umum mengenai kinerja siswa..."></textarea>
            </div>

            {{-- Submit --}}
            <div class="text-right">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded">
                    Simpan Penilaian
                </button>
            </div>
        </form>
    </div>

    {{-- Riwayat Penilaian --}}
    @if(isset($penilaian_existing) && $penilaian_existing->count() > 0)
    <div class="bg-white p-6 rounded shadow w-full mt-8">
        <h2 class="text-2xl font-bold mb-4">Riwayat Penilaian</h2>
        <div class="overflow-x-auto">
            <table class="w-full border border-gray-300 rounded">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 border-b text-left">Siswa</th>
                        <th class="p-3 border-b text-center">Total Teknis</th>
                        <th class="p-3 border-b text-center">Total Non-Teknis</th>
                        <th class="p-3 border-b text-center">Total Keseluruhan</th>
                        <th class="p-3 border-b text-center">Grade</th>
                        <th class="p-3 border-b text-center">Tanggal</th>
                        <th class="p-3 border-b text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penilaian_existing as $p)
                    <tr class="hover:bg-gray-50">
                        <td class="p-3 border-b">{{ $p->siswa->user->nama_lengkap }}</td>
                        <td class="p-3 border-b text-center">{{ $p->total_teknis }}</td>
                        <td class="p-3 border-b text-center">{{ $p->total_nonteknis }}</td>
                        <td class="p-3 border-b text-center">{{ $p->total_keseluruhan }}</td>
                        <td class="p-3 border-b text-center">
                            <span class="px-2 py-1 rounded text-sm font-semibold
                                @if($p->grade == 'A') bg-green-100 text-green-800
                                @elseif($p->grade == 'B') bg-blue-100 text-blue-800
                                @elseif($p->grade == 'C') bg-yellow-100 text-yellow-800
                                @elseif($p->grade == 'D') bg-orange-100 text-orange-800
                                @else bg-red-100 text-red-800 @endif">
                                {{ $p->grade }}
                            </span>
                        </td>
                        <td class="p-3 border-b text-center text-sm">{{ $p->created_at->format('d/m/Y') }}</td>
                        <td class="p-3 border-b text-center">
                            <a href="{{ route('industri.penilaian.edit', $p->id) }}" 
                               class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm mr-1">
                                Edit
                            </a>
                            <form action="{{ route('industri.penilaian.destroy', $p->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        onclick="return confirm('Yakin ingin menghapus penilaian ini?')"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>

<script>
    // Data penilaian existing untuk auto-fill
    const penilaianData = @json($penilaian_existing->keyBy('siswa_id'));

    function switchTab(tab) {
        const teknis = document.getElementById('panel-teknis');
        const nonteknis = document.getElementById('panel-nonteknis');
        const tabTeknis = document.getElementById('tab-teknis');
        const tabNonTeknis = document.getElementById('tab-nonteknis');

        if (tab === 'teknis') {
            teknis.classList.remove('hidden');
            nonteknis.classList.add('hidden');
            tabTeknis.classList.add('text-blue-600', 'border-blue-600', 'font-semibold');
            tabTeknis.classList.remove('text-gray-600', 'border-transparent');
            tabNonTeknis.classList.remove('text-blue-600', 'border-blue-600', 'font-semibold');
            tabNonTeknis.classList.add('text-gray-600', 'border-transparent');
            tabTeknis.setAttribute('aria-selected', 'true');
            tabNonTeknis.setAttribute('aria-selected', 'false');
        } else {
            teknis.classList.add('hidden');
            nonteknis.classList.remove('hidden');
            tabTeknis.classList.remove('text-blue-600', 'border-blue-600', 'font-semibold');
            tabTeknis.classList.add('text-gray-600', 'border-transparent');
            tabNonTeknis.classList.add('text-blue-600', 'border-blue-600', 'font-semibold');
            tabNonTeknis.classList.remove('text-gray-600', 'border-transparent');
            tabTeknis.setAttribute('aria-selected', 'false');
            tabNonTeknis.setAttribute('aria-selected', 'true');
        }
    }

    function hitungTotal(aspek) {
        let total = 0;
        let inputs = [];

        if (aspek === 'teknis') {
            inputs = document.querySelectorAll('.input-nilai-teknis');
        } else if (aspek === 'nonteknis') {
            inputs = document.querySelectorAll('.input-nilai-nonteknis');
        }

        inputs.forEach(input => {
            let val = parseInt(input.value);
            if (!isNaN(val)) {
                total += val;
            }
        });

        document.getElementById('total-' + aspek).innerText = total;
    }

    function loadExistingData() {
        const siswaId = document.getElementById('siswa_id').value;
        
        if (siswaId && penilaianData[siswaId]) {
            const data = penilaianData[siswaId];
            
            // Fill teknis values
            const teknisInputs = document.querySelectorAll('.input-nilai-teknis');
            teknisInputs[0].value = data.teknis_pemahaman_alat || '';
            teknisInputs[1].value = data.teknis_keterampilan || '';
            teknisInputs[2].value = data.teknis_keselamatan || '';
            
            // Fill teknis comments
            const teknisKomentarInputs = document.querySelectorAll('input[name^="teknis_komentar"]');
            teknisKomentarInputs[0].value = data.teknis_pemahaman_alat_komentar || '';
            teknisKomentarInputs[1].value = data.teknis_keterampilan_komentar || '';
            teknisKomentarInputs[2].value = data.teknis_keselamatan_komentar || '';
            
            // Fill non-teknis values
            const nonTeknisInputs = document.querySelectorAll('.input-nilai-nonteknis');
            nonTeknisInputs[0].value = data.nonteknis_disiplin || '';
            nonTeknisInputs[1].value = data.nonteknis_kerjasama || '';
            nonTeknisInputs[2].value = data.nonteknis_inisiatif || '';
            nonTeknisInputs[3].value = data.nonteknis_tanggung_jawab || '';
            
            // Fill non-teknis comments
            const nonTeknisKomentarInputs = document.querySelectorAll('input[name^="nonteknis_komentar"]');
            nonTeknisKomentarInputs[0].value = data.nonteknis_disiplin_komentar || '';
            nonTeknisKomentarInputs[1].value = data.nonteknis_kerjasama_komentar || '';
            nonTeknisKomentarInputs[2].value = data.nonteknis_inisiatif_komentar || '';
            nonTeknisKomentarInputs[3].value = data.nonteknis_tanggung_jawab_komentar || '';
            
            // Fill catatan umum
            document.getElementById('catatan_umum').value = data.catatan_umum || '';
            
            // Update totals
            hitungTotal('teknis');
            hitungTotal('nonteknis');
            
            // Show notification
            alert('Data penilaian sebelumnya telah dimuat. Anda dapat mengedit dan menyimpan ulang.');
        } else {
            // Clear all fields
            document.querySelectorAll('input[type="number"], input[type="text"], textarea').forEach(input => {
                input.value = '';
            });
            hitungTotal('teknis');
            hitungTotal('nonteknis');
        }
    }
</script>

@endsection