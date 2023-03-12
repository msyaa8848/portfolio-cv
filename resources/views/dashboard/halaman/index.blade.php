@extends('dashboard.layout')

@section('konten')
    <p class="card-title">HALAMAN CRUD</p>
    <div class="pb-3"><a href="{{ route('halaman.create') }}" class="btn btn-primary">Add Halaman</a></div>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="col-1">Bil</th>
                    <th>Tajuk</th>
                    <th class="col-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->tajuk }}</td>
                        <td>
                            <a href='{{ route('halaman.edit', $item->id) }}' class="btn btn-sm btn-warning">Edit</a>
                            <form onsubmit="return confirm('Anda pasti untuk padam ini?')"
                                action="{{ route('halaman.destroy', $item->id) }}" class="d-inline" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit" name='submit'>Del</button>
                            </form>
                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection