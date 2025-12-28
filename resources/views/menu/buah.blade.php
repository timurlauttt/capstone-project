@extends('layouts.app')
@section('title', 'Redirecting')
@section('content')
    <meta http-equiv="refresh" content="0;url={{ route('menu.category', ['slug' => 'buah']) }}">
    <p class="p-8 text-center">Halaman ini telah dipindahkan. Mengarahkan ke kategori Buah...</p>
@endsection
