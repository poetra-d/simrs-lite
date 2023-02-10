@extends('layouts.app-master')

@section('content')
<div class="bg-light p-4 rounded">
    <h2>Update pasien</h2>
    <div class="lead">
        Edit pasien.
    </div>

    <div class="container mt-4">

        <form method="POST" action="{{ route('posts.update', $post->id_pasien) }}">
            @method('patch')
            @csrf
            
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal Pendaftaran</label>
                <input value="{{ $post->tanggal }}" type="date" class="form-control" name="tanggal" required>
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Nomor Antrian</label>
                <input disabled value="{{ $post->no_antrian }}" type="text" class="form-control" name="no_antrian"
                    required>
            </div>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Pasien</label>
                <input value="{{ $post->nama_pasien }}" type="text" class="form-control" name="nama_pasien"
                    placeholder="Nama Pasien" required>

                @if ($errors->has('nama_pasien'))
                <span class="text-danger text-left">{{ $errors->first('nama_pasien') }}</span>
                @endif
            </div>

            <select class="form-select mb-3" id="poli_id" name="poli_id">
                <option selected value="{{ $post->poli_id }}">{{ $post->poli_id }}</option>
                @foreach ($polikliniks as $poliklinik)
                <option value="{{ $poliklinik->id }}">{{ $poliklinik->nama_poli }}</option>
                @endforeach
            </select>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input value="{{ $post->alamat_pasien }}" type="text" class="form-control" name="alamat_pasien"
                    placeholder="Alamat" required>

                @if ($errors->has('alamat'))
                <span class="text-danger text-left">{{ $errors->first('alamat') }}</span>
                @endif
            </div>

            <div class="mb-3">
                <label for="no_telp" class="form-label">No Telp</label>
                <input value="{{ $post->no_telp_pasien }}" type="text" class="form-control" name="no_telp_pasien"
                    placeholder="No Telp" required>

                @if ($errors->has('no_telp'))
                <span class="text-danger text-left">{{ $errors->first('no_telp') }}</span>
                @endif
            </div>


            <button type="submit" class="btn btn-primary">Save changes</button>
            <a href="{{ route('posts.index') }}" class="btn btn-default">Back</a>
        </form>
    </div>

</div>
@endsection