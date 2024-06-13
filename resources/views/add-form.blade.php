@extends('layouts/main')

@section('title', $key=$key."-Anime")

@section('konten')

    <div class="card-body">

        <form action="/save" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" placeholder="Title Anime" required>
            </div>

            <div class="form-group">
                <label>Genre</label>
                <select name="genre" class="form-control" required>
                    <option value="" disabled selected>-Pilih Genre-</option>
                    <option value="Action">Action</option>
                    <option value="Romance">Romance</option>
                    <option value="Comedy">Comedy</option>
                    <option value="Horror">Horror</option>
                    <option value="Thriller">Thriller</option>
                </select>
            </div>

            <div class="form-group">
                <label>Year</label>
                <input type="number" min="1900" max="2100" name="year" class="form-control" placeholder="Year of Anime" required>
            </div>

            <div class="form-group">
                <label>Thumbnail</label>
                <input type="file" min="1900" max="2100" name="thumbnail" class="form-control-file"
                    accept="image/*" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </div>

        </form>

    </div>

@endsection
