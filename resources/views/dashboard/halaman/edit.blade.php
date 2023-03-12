@extends('dashboard.layout')

@section('konten')
    <div class="pb-3"><a href="{{ route('halaman.index') }}">
        << Back</a>
    </div>
    <form action="{{ route('halaman.store') }}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
          <label for="" class="form-label">Tajuk</label>
          <input type="text"
            class="form-control" name="tajuk" id="tajuk" aria-describedby="helpId" placeholder="Tajuk" value="{{ $data->tajuk ::get('tajuk') }}">
        </div>
        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <textarea class="form-control summernote" rows="5" name="isi">{{ $data->isi }}</textarea>
          </div>
          <button class="btn btn-primary" name="submit" type="submit">Save</button>
    
    </form>
@endsection