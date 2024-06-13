@extends('layouts/main')
@section('title', $key)


@section('konten')
    <div class="card-body">
        <a href="/animes/add-form" class="btn btn-primary mb-4"><i class="bi bi-plus-circle-dotted"></i> Tambah Anime</a>
        @if (session('alert'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ session('alert') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Genre</th>
                    <th>Year</th>
                    <th>Thumbnail</th>
                    <th>Menu</th>
                </tr>
            </thead>
            <tbody>


                @foreach ($an as $idx => $n)
                    <tr>
                        <td>{{ $idx + 1 }}</td>
                        <td>{{ $n->title }}</td>
                        <td>{{ $n->genre }}</td>
                        <td>{{ $n->year }}</td>
                        <td>
                            @if (Storage::exists('public/' . $n->thumbnail))
                                <img src="{{ asset('/storage/' . $n->thumbnail) }}" alt="{{ $n->thumbnail }}" height="75" width="100">
                            @else
                                <img src="{{ asset('/storage/thumbnail/no-image.png') }}" alt="no-image" height="75" width="100">
                            @endif
                        </td>
                        <td>
                            <a href="/delete/{{ $n->id }}" class="btn btn-success"><i
                                    class="bi bi-trash-fill">Delete</i></a>

                            <a href="/anime/edit-form/{{ $n->id }}" class="btn btn-success"><i
                                    class="bi bi-vector-pen">Edit</i></a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <p>Ini adalah laman Animes</p>
    <p>
        Lorem ipsum ...
    </p>
@endsection
{{-- / . sama saja untuk memanggil --}}
