@extends('admin.layout')
@section('content')

<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Data Kategori</h2>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash')
                    <table class="table table-bordered table-stripped">
                        <thead>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>

                            @forelse($data as $row)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{$row->name}}</td>
                                <td class="text-center">
                                    <a class="btn btn-warning btn-sm" href="{{ route('kategori.edit',Crypt::encrypt($row->id)) }}">Edit</a>
                                    <form action="{{route('kategori.destroy', Crypt::encrypt($row->id))}}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8">No record found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{$data->links()}}
                </div>
                <div class="card-footer text-right">
                    <a href="{{ route('kategori.create') }}" class="btn btn-primary">Tambah Data</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

