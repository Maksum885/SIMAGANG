@extends('layouts.dashboard-industri')

@section('content')

<div class="text-md">
    <h1 class="text-2xl underline font-bold mb-5">Form Penilaian PKL</h1>

    {{-- Alert Messages --}}
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-2 py-2 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-2 py-2 rounded mb-4">
        {{ session('error') }}
    </div>
    @endif

    <div class="bg-white p-6 rounded shadow w-full">
        <form action="{{ route('industri.penilaian.store') }}" method="POST">
            @csrf
            {{-- Dropdown Pilih Siswa --}}
            <div class="mb-4">
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
                            <th class="p-3 border-r border-gray-400 text-left">Aspek Penilaian</th>
                            <th class="p-3 border-gray-400 text-center">Nilai</th>
                            <th class="p-3 border-l border-gray-400 text-left">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody id="tbody-teknis">
                        <!-- Dinamis dari JS -->
                    </tbody>
                </table>
            </section>

            {{-- Panel Aspek Non-Teknis --}}
            <section id="panel-nonteknis" class="mb-6 hidden">
                <table class="w-full border border-gray-400 rounded">
                    <thead class="bg-gray-300">
                        <tr>
                            <th class="p-3 border-r border-gray-400 text-left">Aspek Penilaian</th>
                            <th class="p-3 border-gray-400 text-center">Nilai</th>
                            <th class="p-3 border-l border-gray-400 text-left">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white">
                            <td class="p-3 w-[600px] border-r border-gray-400">Mampu menerapkan etika berkomunikasi secara lisan dan tulisan, berintegritas (jujur, disiplin, komitmen, tanggung jawab) dengan etos kerja yang baik.</td>
                            <td class="p-3 border-gray-400">
                                <input type="number" name="nonteknis_nilai[0]" min="1" max="100" required
                                    class="w-full border border-gray-400 rounded px-2 py-1 input-nilai-nonteknis"
                                    oninput="updateGrade(this, 'nonteknis_ket_0')">
                            </td>
                            <td class="p-3 border-l border-gray-400">
                                <input type="text" name="nonteknis_keterangan[0]" id="nonteknis_ket_0" readonly
                                    class="w-full border border-gray-300 bg-gray-100 px-2 py-1">
                            </td>
                        </tr>

                        <tr class="bg-white">
                            <td class="p-3 w-[600px] border-r border-gray-400">Mampu bekerja secara mandiri dan/atau bekerja didalam tim serta kepedulian sosial.</td>
                            <td class="p-3 border-gray-400">
                                <input type="number" name="nonteknis_nilai[1]" min="1" max="100" required
                                    class="w-full border border-gray-400 rounded px-2 py-1 input-nilai-nonteknis"
                                    oninput="updateGrade(this, 'nonteknis_ket_1')">
                            </td>
                            <td class="p-3 border-l border-gray-400">
                                <input type="text" name="nonteknis_keterangan[1]" id="nonteknis_ket_1" readonly
                                    class="w-full border border-gray-300 bg-gray-100 px-2 py-1">
                            </td>
                        </tr>

                        <tr class="bg-white">
                            <td class="p-3 w-[600px] border-r border-gray-400">Mampu menaati norma, budaya kerja, K3LH di tempat kerja.</td>
                            <td class="p-3 border-gray-400">
                                <input type="number" name="nonteknis_nilai[2]" min="1" max="100" required
                                    class="w-full border border-gray-400 rounded px-2 py-1 input-nilai-nonteknis"
                                    oninput="updateGrade(this, 'nonteknis_ket_2')">
                            </td>
                            <td class="p-3 border-l border-gray-400">
                                <input type="text" name="nonteknis_keterangan[2]" id="nonteknis_ket_2" readonly
                                    class="w-full border border-gray-300 bg-gray-100 px-2 py-1">
                            </td>
                        </tr>

                        <tr class="bg-white">
                            <td class="p-3 w-[600px] border-r border-gray-400">Mampu melaksanakan Prosedur Operasional Standar(POS) yang berlaku di dunia kerja.</td>
                            <td class="p-3 border-gray-400">
                                <input type="number" name="nonteknis_nilai[3]" min="1" max="100" required
                                    class="w-full border border-gray-400 rounded px-2 py-1 input-nilai-nonteknis"
                                    oninput="updateGrade(this, 'nonteknis_ket_3')">
                            </td>
                            <td class="p-3 border-l border-gray-400">
                                <input type="text" name="nonteknis_keterangan[3]" id="nonteknis_ket_3" readonly
                                    class="w-full border border-gray-300 bg-gray-100 px-2 py-1">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>

            {{-- Submit --}}
            <div class="flex justify-between items-center mt-6">
                <div>
                    <ul>
                        <p class="font-bold">Kriteria Penilaian :</p>
                        <li class="text-sm text-left mt-1">86-100 (Sangat Baik)</li>
                        <li class="text-sm text-left mt-1">70-85 (Baik)</li>
                        <li class="text-sm text-left mt-1">1-69 (Kurang)</li>
                    </ul>
                </div>
                <div>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded  cursor-pointer">
                        Simpan Penilaian
                    </button>
                </div>
            </div>
        </form>
    </div>

    {{-- Riwayat Penilaian --}}
    @if(isset($penilaian_existing) && $penilaian_existing->count() > 0)
    <div class="bg-white p-6 rounded shadow w-full mt-8">
        <h2 class="text-lg font-bold mb-4">Riwayat Penilaian</h2>
        <div class="overflow-x-auto">
            <table class="w-full border border-gray-300 rounded">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 border-b text-left">Siswa</th>
                        <th class="p-3 border-b text-center">Tanggal</th>
                        <th class="p-3 border-b text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penilaian_existing as $p)
                    <tr class="hover:bg-gray-50">
                        <td class="p-3 border-b">{{ $p->siswa->user->nama_lengkap }}</td>
                        <td class="p-3 border-b text-center text-sm">{{ $p->created_at->format('d/m/Y') }}</td>
                        <td class="p-3 border-b text-center space-x-1">
                            <button onclick="showDetail({{ $p->id }})"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-1 rounded text-sm cursor-pointer">Lihat Detail</button>
                            <button onclick="bukaModalHapus({{ $p->id }})" class="bg-red-500 hover:bg-red-600 text-white px-4 py-1 rounded text-sm cursor-pointer">
                                Hapus
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

    {{-- Modal Detail Penilaian --}}
    <div id="modalDetail" class="fixed inset-0 flex items-center justify-center hidden">
        <div class="bg-blue-100 w-11/12 md:w-2/3 p-6 rounded-lg shadow-lg max-h-[90vh] overflow-y-auto">
            <h2 class="text-xl font-bold underline mb-4">Detail Penilaian</h2>
            <div id="detailContent"></div>
            <div class="text-right mt-4">
                <button onclick="closeModal()"
                    class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 cursor-pointer rounded">Tutup</button>
            </div>
        </div>
    </div>
    {{-- Modal Konfirmasi Hapus --}}
    <div id="modalHapus" class="hidden fixed inset-0  flex items-center justify-center z-50">
        <div class="bg-white w-1/3 p-5 border-2 rounded-lg shadow-lg relative text-md">
            <h2 class="text-xl font-bold mb-3 text-center underline">Konfirmasi Hapus Penilaian</h2>
            <p class="text-center mb-5">Apakah Anda yakin ingin menghapus penilaian ini? Tindakan ini tidak bisa dibatalkan.</p>
            <form id="formHapus" method="POST">
                @csrf
                @method('DELETE')
                <div class="flex justify-center space-x-4">
                    <button type="button" onclick="tutupModalHapus()" class="px-2 py-1 border rounded-lg hover:bg-gray-50 cursor-pointer">
                        Batal
                    </button>
                    <button type="submit" class="px-2 py-1 bg-red-600 text-white rounded-lg hover:bg-red-700 cursor-pointer">
                        Hapus
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>

<script>
    const siswaJurusan = {
        @foreach($siswa as $s)
        "{{ $s->id }}": "{{ $s->jurusan }}",
        @endforeach
    };

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

    function getGrade(val) {
        val = parseInt(val) || 0;
        if (val >= 85) return 'Sangat Baik';
        if (val >= 70) return 'Baik';
        return 'Kurang';
    }

    function updateGrade(input, targetId) {
        document.getElementById(targetId).value = getGrade(input.value);
    }

    document.getElementById('siswa_id').addEventListener('change', function() {
        const id = this.value;
        const jur = siswaJurusan[id];
        fetch(`/industri/template-aspek-teknis/${jur}`)
            .then(r => r.json())
            .then(res => {
                if (!res.success) return alert(res.message);
                const elems = res.data.elemen.split('\n');
                let html = '';
                elems.forEach((e, i) => {
                    html += `
                <tr class="${i % 2 === 0 ? 'bg-white' : 'bg-gray-50'}">
                    <td class="p-3 border-r border-gray-400">${e}</td>
                    <td class="p-3 border-gray-400">
                        <input type="number" name="teknis_nilai[${i}]" min="1" max="100" required
                            class="w-full border px-2 py-1 input-nilai-teknis"
                            oninput="updateGrade(this, 'keterangan-${i}')">
                    </td>
                    <td class="p-3 border-l border-gray-400">
                        <input type="text" name="teknis_keterangan[${i}]" readonly
                            class="w-full bg-gray-100 px-2 py-1 text-center" id="keterangan-${i}">
                    </td>
                </tr>`;
                });
                document.getElementById('tbody-teknis').innerHTML = html;
            });
    });

    function showDetail(id) {
        fetch(`/industri/penilaian/${id}`)
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    let html = '';

                    // Aspek Teknis - Table
                    html += `<h3 class="text-lg font-semibold mb-2">Aspek Teknis</h3>`;
                    if (data.teknis.length > 0) {
                        html += `<table class="min-w-full border border-gray-300 mb-4 text-sm">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border px-4 py-2 w-[600px]">Aspek Penilaian</th>
                                <th class="border px-4 py-2">Nilai</th>
                                <th class="border px-4 py-2">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>`;
                        data.teknis.forEach((item) => {
                            html += `<tr>
                            <td class="border px-4 py-2">${item.nama}</td>
                            <td class="border px-4 py-2">${item.nilai}</td>
                            <td class="border px-4 py-2">${item.keterangan}</td>
                        </tr>`;
                        });
                        html += `</tbody></table>`;
                    } else {
                        html += `<p class="text-gray-500 mb-4">Tidak ada data aspek teknis.</p>`;
                    }

                    // Deskripsi aspek non-teknis
                    const aspekNonTeknisLabels = [
                        "Mampu menerapkan etika berkomunikasi secara lisan dan tulisan, berintegritas (jujur, disiplin, komitmen, tanggung jawab) dengan etos kerja yang baik.",
                        "Mampu bekerja secara mandiri dan/atau bekerja di dalam tim serta kepedulian sosial.",
                        "Mampu menaati norma, budaya kerja, K3LH di tempat kerja.",
                        "Mampu melaksanakan Prosedur Operasional Standar (POS) yang berlaku di dunia kerja."
                    ];

                    // Aspek Non-Teknis - Table
                    html += `<h3 class="text-lg font-semibold mb-2">Aspek Non-Teknis</h3>`;
                    if (data.nonteknis.length > 0) {
                        html += `<table class="min-w-full border border-gray-300 text-sm">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border px-4 py-2 w-[600px]">Aspek Penilaian</th>
                                <th class="border px-4 py-2">Nilai</th>
                                <th class="border px-4 py-2">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>`;
                        data.nonteknis.forEach((item, index) => {
                            const label = aspekNonTeknisLabels[index] || `Aspek Non Teknis ${index + 1}`;
                            html += `<tr>
                            <td class="border px-4 py-2">${label}</td>
                            <td class="border px-4 py-2">${item.nilai}</td>
                            <td class="border px-4 py-2">${item.keterangan}</td>
                        </tr>`;
                        });
                        html += `</tbody></table>`;
                    } else {
                        html += `<p class="text-gray-500">Tidak ada data aspek non-teknis.</p>`;
                    }

                    document.getElementById('detailContent').innerHTML = html;
                    document.getElementById('modalDetail').classList.remove('hidden');
                } else {
                    alert(data.message || 'Gagal memuat detail.');
                }
            })
            .catch(err => {
                console.error(err);
                alert('Terjadi kesalahan saat mengambil data.');
            });
    }


    function closeModal() {
        document.getElementById('modalDetail').classList.add('hidden');
    }

    function bukaModalHapus(id) {
        const form = document.getElementById('formHapus');
        form.action = `/industri/penilaian/${id}`; // pastikan sesuai route destroy
        document.getElementById('modalHapus').classList.remove('hidden');
    }

    function tutupModalHapus() {
        document.getElementById('modalHapus').classList.add('hidden');
    }
</script>
@endsection