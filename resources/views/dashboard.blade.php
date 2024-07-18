@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold">Dashboard Artikel</h1>
            <a href="{{ route('artikel') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Tambah Artikel</a>
        </div>

        <div class="mb-6">
            <form method="GET" action="{{ route('dashboard') }}">
                <input type="text" name="search" placeholder="Cari artikel..." class="px-4 py-2 w-full border rounded-lg">
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($articles as $article)
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <div class="mb-4">
                        <img src="{{ asset('storage/' . $article->gambar) }}" alt="{{ $article->judul }}" class="w-full h-48 object-cover rounded-lg">
                    </div>
                    <h2 class="text-xl font-bold mb-2">{{ $article->judul }}</h2>
                    <p class="text-gray-500 mb-2">{{ $article->kategori }}</p>
                    <p class="text-gray-700 mb-4">{{ Str::limit($article->artikel, 100) }}</p>
                    <a href="{{ route('show', $article->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Lihat Selengkapnya</a>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $articles->links() }}
        </div>
    </div>
@endsection
