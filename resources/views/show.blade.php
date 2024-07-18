@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">{{ $article->judul }}</h1>
        <div class="bg-white rounded-lg shadow-lg p-6">
            <img src="{{ asset('storage/' . $article->gambar) }}" alt="{{ $article->judul }}"
                class="w-full h-auto rounded-lg mb-4">
            <p class="text-gray-700 mb-4">{{ $article->artikel }}</p>
            <p class="text-sm text-gray-500">Kategori: {{ $article->kategori }}</p>
            <p class="text-sm text-gray-500">Penulis: {{ $article->user->name }}</p>
            <p class="text-sm text-gray-500">Dibuat: {{ $article->created_at->format('d M Y H:i') }}</p>
        </div>

        <div class="flex space-x-4 mb-6 mx-auto mt-6">
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md transition duration-300 ease-in-out">
                Share on Facebook
            </a>
            <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ $article->judul }}"
                class="bg-black hover:bg-blue-500 text-white px-4 py-2 rounded-md transition duration-300 ease-in-out">
                Share on Twitter
            </a>
            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ url()->current() }}"
                class="bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded-md transition duration-300 ease-in-out">
                Share on LinkedIn
            </a>
        </div>

        <div class="bg-gray-100 rounded-lg p-4 mt-5">
            <h2 class="text-xl font-semibold mb-4">Komentar</h2>
            @forelse ($article->comments as $comment)
                <div class="bg-white shadow-md rounded-lg p-4 mb-4">
                    <p class="text-gray-800">{{ $comment->body }}</p>
                    <p class="text-gray-600 text-sm mt-2">Ditulis oleh {{ $comment->user->name }} pada
                        {{ $comment->created_at->format('d M Y H:i') }}</p>
                </div>
            @empty
                <p class="text-gray-600">Belum ada komentar untuk artikel ini.</p>
            @endforelse

            <form action="{{ route('comments.store', $article->id) }}" method="POST" class="mt-6">
                @csrf
                <textarea name="body" rows="3"
                    class="w-full border-gray-300 rounded-md p-2 focus:outline-none focus:border-gray-400"
                    placeholder="Tulis komentar Anda"></textarea>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md mt-2">Kirim
                    Komentar</button>
            </form>
        </div>
    </div>
@endsection
