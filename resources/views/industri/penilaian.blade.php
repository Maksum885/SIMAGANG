@extends('layouts.dashboard-industri')

@section('content')
<div class="p-5 text-2xl">
    <h1 class="text-4xl underline font-bold mb-6">Form Penilaian PKL oleh Pembimbing Industri</h1>
    <div class="bg-white p-6 rounded shadow w-full">
        <form>
            {{-- Dropdown Pilih Siswa --}}
            <div class="mb-6">
                <label for="siswa_id" class="block font-semibold mb-3">Pilih Siswa</label>
                <select name="siswa_id" id="siswa_id" required
                    class="w-full border border-gray-300 rounded px-3 py-2">
                    <option value="" disabled selected>-- Pilih Siswa --</option>
                    <option value="1">Ahmad Fauzi - 1234567890</option>
                    <option value="2">Siti Nurhaliza - 0987654321</option>
                    <option value="3">Budi Santoso - 1122334455</option>
                </select>
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
                                <input
                                    type="number"
                                    name="teknis_nilai[0]"
                                    min="1" max="10" required
                                    class="w-full border border-gray-400 rounded px-2 py-1 input-nilai-teknis"
                                    oninput="hitungTotal('teknis')">
                            </td>
                            <td class="p-3 border-l border-gray-400">
                                <input
                                    type="text"
                                    name="teknis_komentar[0]"
                                    placeholder="Komentar opsional"
                                    class="w-full border border-gray-400 rounded px-2 py-1">
                            </td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="p-3 border-r border-gray-400">Keterampilan Teknik</td>
                            <td class="p-3 border-gray-400">
                                <input
                                    type="number"
                                    name="teknis_nilai[1]"
                                    min="1" max="10" required
                                    class="w-full border border-gray-400 rounded px-2 py-1 input-nilai-teknis"
                                    oninput="hitungTotal('teknis')">
                            </td>
                            <td class="p-3 border-l border-gray-400">
                                <input
                                    type="text"
                                    name="teknis_komentar[1]"
                                    placeholder="Komentar opsional"
                                    class="w-full border border-gray-400 rounded px-2 py-1">
                            </td>
                        </tr>
                        <tr class="bg-white">
                            <td class="p-3 border-r border-gray-400">Keselamatan Kerja</td>
                            <td class="p-3 border-gray-400">
                                <input
                                    type="number"
                                    name="teknis_nilai[2]"
                                    min="1" max="10" required
                                    class="w-full border border-gray-400 rounded px-2 py-1 input-nilai-teknis"
                                    oninput="hitungTotal('teknis')">
                            </td>
                            <td class="p-3 border-l border-gray-400">
                                <input
                                    type="text"
                                    name="teknis_komentar[2]"
                                    placeholder="Komentar opsional"
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
                                <input
                                    type="number"
                                    name="nonteknis_nilai[0]"
                                    min="1" max="10" required
                                    class="w-full border border-gray-400 rounded px-2 py-1 input-nilai-nonteknis"
                                    oninput="hitungTotal('nonteknis')">
                            </td>
                            <td class="p-3 border-l border-gray-400">
                                <input
                                    type="text"
                                    name="nonteknis_komentar[0]"
                                    placeholder="Komentar opsional"
                                    class="w-full border border-gray-400 rounded px-2 py-1">
                            </td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="p-3 border-r border-gray-400">Kerjasama</td>
                            <td class="p-3 border-gray-400">
                                <input
                                    type="number"
                                    name="nonteknis_nilai[1]"
                                    min="1" max="10" required
                                    class="w-full border border-gray-400 rounded px-2 py-1 input-nilai-nonteknis"
                                    oninput="hitungTotal('nonteknis')">
                            </td>
                            <td class="p-3 border-l border-gray-400">
                                <input
                                    type="text"
                                    name="nonteknis_komentar[1]"
                                    placeholder="Komentar opsional"
                                    class="w-full border border-gray-400 rounded px-2 py-1">
                            </td>
                        </tr>
                        <tr class="bg-white">
                            <td class="p-3 border-r border-gray-400">Inisiatif</td>
                            <td class="p-3 border-gray-400">
                                <input
                                    type="number"
                                    name="nonteknis_nilai[2]"
                                    min="1" max="10" required
                                    class="w-full border border-gray-400 rounded px-2 py-1 input-nilai-nonteknis"
                                    oninput="hitungTotal('nonteknis')">
                            </td>
                            <td class="p-3 border-l border-gray-400">
                                <input
                                    type="text"
                                    name="nonteknis_komentar[2]"
                                    placeholder="Komentar opsional"
                                    class="w-full border border-gray-400 rounded px-2 py-1">
                            </td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td class="p-3 border-r border-gray-400">Tanggung Jawab</td>
                            <td class="p-3 border-gray-400">
                                <input
                                    type="number"
                                    name="nonteknis_nilai[3]"
                                    min="1" max="10" required
                                    class="w-full border border-gray-400 rounded px-2 py-1 input-nilai-nonteknis"
                                    oninput="hitungTotal('nonteknis')">
                            </td>
                            <td class="p-3 border-l border-gray-400">
                                <input
                                    type="text"
                                    name="nonteknis_komentar[3]"
                                    placeholder="Komentar opsional"
                                    class="w-full border border-gray-400 rounded px-2 py-1">
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="text-right font-semibold mt-2">
                    Total Nilai Aspek Non-Teknis: <span id="total-nonteknis">0</span>
                </div>
            </section>

            {{-- Submit --}}
            <div class="text-right">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded">
                    Simpan Penilaian
                </button>
            </div>
        </form>
    </div>
</div>

<script>
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
</script>

@endsection