@extends('layouts.app-master')

@section('content')
    
    <h1 class="mb-3">Pasien</h1>

    <div class="bg-light p-4 rounded">
        <h2>List Pasien</h2>
        <div class="lead">
            Data Pasien.
            <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm float-right">Tambah Pasien</a>
        </div>
        
        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-bordered">
          <tr>
             <th width="1%">No</th>
             <th>Nama</th>
             <th>Alamat</th>
             <th>No Telepon</th>
             <th width="3%" colspan="3">Action</th>
          </tr>
            @foreach ($posts as $key => $post)
            <tr>
                <td>{{ $post->id_pasien }}</td>
                <td>{{ $post->nama_pasien }}</td>
                <td>{{ $post->alamat_pasien }}</td>
                <td>{{ $post->no_telp_pasien }}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('posts.edit', $post->id_pasien) }}">Edit</a>
                </td>
                <td>
                    {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $post->id_pasien],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </table>

        <div class="d-flex">
            {!! $posts->links() !!}
        </div>

    </div>
@endsection