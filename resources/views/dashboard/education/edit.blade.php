@extends('dashboard.layout')

@section('konten')
    <div class="pb-3"><a href="{{ route('education.index') }}" class="btn btn-secondary">
            << kembali</a>
    </div>
    <form action="{{ route('education.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="tajuk" class="form-label">Universiti</label>
            <input type="text" class="form-control form-control-sm" name="tajuk" id="tajuk" aria-describedby="helpId"
                placeholder="Universiti" value="{{ $data->tajuk }}">
        </div>
        <div class="mb-3">
            <label for="info1" class="form-label">Fakulti</label>
            <input type="text" class="form-control form-control-sm" name="info1" id="info1"
                aria-describedby="helpId" placeholder="Fakulti" value="{{ $data->info1 }}">
        </div>
        <div class="mb-3">
            <label for="info2" class="form-label">Program</label>
            <input type="text" class="form-control form-control-sm" name="info2" id="info2"
                aria-describedby="helpId" placeholder="Program" value="{{ $data->info2 }}">
        </div>
        <div class="mb-3">
            <label for="info3" class="form-label">Pointer</label>
            <input type="text" class="form-control form-control-sm" name="info3" id="info3"
                aria-describedby="helpId" placeholder="Pointer" value="{{ $data->info3 }}">
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col-auto">Tarikh Mula</div>
                <div class="col-auto"><input type="date" class="form-control form-control-sm" name="tgl_mulai"
                        placeholder="dd/mm/yyy" value="{{ $data->tgl_mulai }}"></div>
                <div class="col-auto">Tarikh Akhir</div>
                <div class="col-auto"><input type="date" class="form-control form-control-sm" name="tgl_akhir"
                        placeholder="dd/mm/yyy" value="{{ $data->tgl_akhir }}"></div>
            </div>
        </div>
        <button class="btn btn-primary" name="Save" type="submit">Save</button>
    </form>
@endsection
