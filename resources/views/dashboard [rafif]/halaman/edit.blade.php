@extends('dashboard.layout')

@section('konten')
    <div class="pb-3"><a href="{{ route('halaman.index') }}" class="btn btn-secondary">
            << kembali</a>
    </div>
    <form action="{{ route('halaman.update', $data->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="tajuk" class="form-label">tajuk</label>
            <input type="text" class="form-control form-control-sm" name="tajuk" id="tajuk" aria-describedby="helpId"
                placeholder="tajuk" value="{{ $data->tajuk }}">
        </div>
        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <textarea class="form-control summernote" rows="5" name="isi">{{ $data->isi }}</textarea>
        </div>
        <button class="btn btn-primary" name="Save" type="submit">Save</button>
    </form>
@endsection
