@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Daftar Courses</h1>

    <a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">Tambah Course Baru</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama</th>
                <th scope="col">Kategori</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->name }}</td>
                <td>{{ $course->category }}</td>
                <td>{{ $course->desc }}</td>
                <td>
                    <a href="{{ route('courses.show', $course->id) }}" class="btn btn-sm btn-info">Detail</a>
                    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kursus ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">Tidak ada data kursus.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection