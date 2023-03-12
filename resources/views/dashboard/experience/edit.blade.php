@extends('dashboard.layout')

@section('konten')
    <div class="pb-3"><a href="{{ route('experience.index') }}" class="btn btn-secondary">
            << kembali</a>
    </div>
    <form action="{{ route('experience.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="tajuk" class="form-label">Posisi</label>
            <input type="text" class="form-control form-control-sm" name="tajuk" id="tajuk" aria-describedby="helpId"
                placeholder="Posisi" value="{{ $data->tajuk }}">
        </div>
        <div class="mb-3">
            <label for="info1" class="form-label">Nama Perusahaan</label>
            <input type="text" class="form-control form-control-sm" name="info1" id="info1"
                aria-describedby="helpId" placeholder="Nama Perusahaan" value="{{ $data->info1 }}">
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col-auto">Tarikh Mulai</div>
                <div class="col-auto"><input type="date" class="form-control form-control-sm" name="tgl_mulai"
                        placeholder="dd/mm/yyy" value="{{ $data->tgl_mulai }}"></div>
                <div class="col-auto">Tarikh Akhir</div>
                <div class="col-auto"><input type="date" class="form-control form-control-sm" name="tgl_akhir"
                        placeholder="dd/mm/yyy" value="{{ $data->tgl_akhir }}"></div>
            </div>
        </div>
        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <textarea class="form-control summernote" rows="5" name="isi">{{ $data->isi }}</textarea>
        </div>
        <button class="btn btn-primary" name="Save" type="submit">Save</button>
    </form>
@endsection
