@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Daftar Pertanyaan</h2>

    @foreach ($pertanyaans as $data)
    <div class="card my-3">
        <div class="card-body">
            <h5>Pertanyaan dari: {{ $data->user_name ?? 'User' }}</h5>
            <p>{{ $data->pertanyaan }}</p>

            @if ($data->jawaban)
                <div class="alert alert-success">
                    <strong>Jawaban:</strong> {{ $data->jawaban }}
                </div>
            @else
                <form action="{{ route('pertanyaan.jawab', $data->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <textarea name="jawaban" class="form-control" placeholder="Tulis jawaban..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Kirim Jawaban</button>
                </form>
            @endif
            <form action="{{ route('pertanyaan.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pertanyaan ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm mt-2">Hapus</button>
            </form>
        </div>
    </div>
@endforeach

</div>
@endsection
