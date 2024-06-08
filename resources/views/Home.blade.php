@extends('layouts/main')
@section('title', $key)


@section('konten')
    <div>
        @if (session('alert'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ session('alert') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <p>Ini adalah laman Home</p>
        <p>
            Lorem ipsum ...
        </p>
    @endsection
    {{-- / . sama saja untuk memanggil --}}
