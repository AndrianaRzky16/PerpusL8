@extends('layouts.app')

@section('content')
    <div class="grid-padding text-center">
        <div class="mb-5">
            <h4 class="d-inline">Data Rayon</h4>

            <button type="button" class="btn btn-sm btn-primary rounded-pill" data-toggle="modal" data-target="#exampleModal">
                Tambah
            </button>
        </div>

        <table class="table table-stripped rounded-pill">
            <thead style="background-color:#0ec8f8;" class="text-light">
                <th class="p-4">NO</th>
                <th class="p-4">Rayon</th>
                <th class="p-4">Action</th>
            </thead>

            <tbody>

                @php
                    $no = 0;
                @endphp

                @forelse ($rayons as $rayon)
                    <tr class="justify-item-center">
                        <td class="p-4">{{ ++$no }}</td>
                        <td class="p-4">{{ $rayon->rayon }}</td>
                        <td class="p-4">
                            <form action="{{ route('perpusku.rayons.destroy', $rayon) }}" method="POST"  onsubmit="return confirm('Yakin Ingin Dihapus : {{ $rayon->title }}'); false">
                                @csrf
                                @method('delete')

                                <a href="{{ route('perpusku.rayons.edit', $rayon) }}" class="btn btn-warning btn-sm mb-2"><i class="bi bi-pencil-square"></i></a>
                                <button class="btn btn-danger btn-sm" type="submit"><i class="bi bi-trash3"></i></button>
                            </form>
                        </td>
                    </tr>

                    @empty
                        <tr>
                            <td class="bg-danger text-light" colspan="8">Belum ada rayon</td>
                        </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade rounded" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: lightblue">
            <h5 class="modal-title text-secondary text-light" id="exampleModalLabel">Tambahkan rayon</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('perpusku.rayons.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">rayon</label>
                        <input type="text" class="form-control mb-4" placeholder="rayon" name="rayon" value="{{ old('rayon') }}">
                        @error('rayon')
                            <div class="text-danger text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
        </div>
    </div>
@endsection
