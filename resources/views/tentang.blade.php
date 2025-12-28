@extends('layouts.app')
@section('title', 'Tentang Kami')

@section('content')

{{-- ABOUT SECTION --}}
<section class="bg-gray-100 py-20">
    <div class="max-w-6xl mx-auto px-4">

        {{-- TITLE --}}
        <div class="text-center mb-12">
            <p class="text-gray-500">Tentang</p>
            <h1 class="text-2xl md:text-3xl font-bold tracking-wide">
                REFLOREO ITERUM
            </h1>
        </div>

        {{-- CARD --}}
        <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

                {{-- IMAGE --}}
                <div>
                    <img src="{{ asset('images/tentang2.jpeg') }}"
                         alt="Refloreo Iterum"
                         class="rounded-xl w-full object-cover">
                </div>

                {{-- CONTENT --}}
                <div>
                    {{-- Badge --}}
                    <span class="inline-block bg-gray-800 text-white text-sm px-5 py-2 rounded-full mb-5">
                        Pondasi untuk Masa Depan yang Lebih Hijau
                    </span>

                    {{-- Description --}}
                    <p class="text-gray-600 leading-relaxed mb-6">
                        Kami adalah perusahaan pembibitan tanaman yang berlokasi di
                        <strong>Desa Petir,Kecamatan Kalibagor, Kabupaten Banyumas, Jawa Tengah</strong>, berdiri sejak tahun 2015.
                        Kami fokus menyediakan bibit unggulan yang cocok dengan iklim
                        Indonesia dan mendukung penghijauan berkelanjutan.
                    </p>

                    {{-- Checklist --}}
                    <ul class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-gray-700 text-sm">
                        @foreach ([
                            'Buah-buahan',
                            'Kayu-kayuan',
                            'Tanaman Hias',
                            'Reboisasi'
                        ] as $item)
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-green-600 mt-0.5"
                                 xmlns="http://www.w3.org/2000/svg"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M5 13l4 4L19 7" />
                            </svg>
                            <span>{{ $item }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>

    </div>
</section>

@endsection
