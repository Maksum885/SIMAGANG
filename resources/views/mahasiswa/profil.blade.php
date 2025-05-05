@extends('layouts.app') <!-- atau layouts yang kamu pakai -->

@section('content')
<div class="px-10 py-8">
    <h1 class="text-2xl font-bold mb-4">Profil Saya</h1>
    <div class="bg-white p-6 rounded shadow">
        <p><strong>Nama:</strong> {{ Auth::user()->name }}</p>
        <p><strong>NIM:</strong> {{ Auth::user()->nim }}</p>
        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
    </div>
</div>
@endsection