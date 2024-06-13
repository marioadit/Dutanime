@extends('layouts/main')
@section('title', $key)

@section('konten')

    <div class="card-header">

    </div>
    <div class="card-body">
        {{-- FORM ADD ANIMES DISINI --}}
        <form action="/update/{{ $ani->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" required value="{{ $ani->title }}">
            </div>
            <div class="form-froup">
                <label>Genre</label>
                <select name="genre" class="form-control" required>
                    {{-- <option value="0">--Pilih Genre--</option> --}}
                    <option {{ $ani->genre == 'Action' ? 'selected' : '' }} value="Action">Action</option>
                    <option {{ $ani->genre == 'Romance' ? 'selected' : '' }} value="Romance">Romance</option>
                    <option {{ $ani->genre == 'Comedy' ? 'selected' : '' }} value="Comedy">Comedy</option>
                    <option {{ $ani->genre == 'Horror' ? 'selected' : '' }} value="Horror">Horror</option>
                    <option {{ $ani->genre == 'Thriller' ? 'selected' : '' }} value="Thriller">Thriller</option>
                </select>
            </div>
            <div class="form-group">
                <label>Year</label>
                <input type="number" Min="1900" Max="2100" name="year" class="form-control" required
                    value="{{ $ani->year }}" readonly>
            </div>
            <div class="form-group">
                <label>Thumbnail Before:</label>
                <p></p>
                {{-- <label>Thumbnail</label> --}}
                @if (Storage::exists('public/' . $ani->thumbnail))
                    <img src="{{ asset('/storage/' . $ani->thumbnail) }}" alt="{{ $ani->thumbnail }}" height="80"
                        width="80">
                @else
                    <img src="{{ asset('/storage/thumbnail/no-image.png') }}" alt="no-image" height="150" width="200">
                @endif
            </div>
            <div class="form-group">
                <label>Thumbnail Now:</label>
                <input type="file" Min="1900" Max="2100" name="thumbnail" class="form-control-file"
                    accept="image/*" required value="{{ $ani->thumbnail }}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </div>
        </form>
    </div>
@endsection
