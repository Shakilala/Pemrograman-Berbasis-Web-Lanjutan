
@extends('layouts.app')

@section('title', 'Data Barang')
@section('page-heading', 'Data Barang')

@section('content')

    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:25px;">
        <div>
            <h2 style="font-size:21px; margin-bottom:6px;">Daftar Barang</h2>
            <p style="color:#8792a5; font-size:13px;">Kelola seluruh data inventaris barang.</p>
        </div>

        <a href="{{ route('barang.create') }}" class="btn btn-primary">
            + Tambah Barang
        </a>
    </div>

    @if(session('success'))
        <div class="alert">
            ✓ {{ session('success') }}
        </div>
    @endif

    <div style="display:flex; gap:15px; margin-bottom:20px;">
        <div style="background:#f1f6ff; padding:17px 20px; border-radius:10px; flex:1;">
            <p style="font-size:12px; color:#71809a;">Total Jenis Barang</p>
            <h2 style="margin-top:7px; color:#3478d4;">{{ $barangs->count() }}</h2>
        </div>

        <div style="background:#effaf4; padding:17px 20px; border-radius:10px; flex:1;">
            <p style="font-size:12px; color:#71809a;">Total Stok</p>
            <h2 style="margin-top:7px; color:#26945a;">{{ $barangs->sum('stok') }}</h2>
        </div>
    </div>

    <div style="overflow-x:auto;">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($barangs as $barang)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <span style="color:#3478d4; font-weight:600;">
                                {{ $barang->kode_barang }}
                            </span>
                        </td>
                        <td style="font-weight:600;">{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->kategori }}</td>
                        <td>{{ $barang->satuan }}</td>
                        <td>Rp {{ number_format($barang->harga, 0, ',', '.') }}</td>
                        <td>
                            <span style="background:#eaf7ef; color:#26945a; padding:5px 10px; border-radius:20px;">
                                {{ $barang->stok }}
                            </span>
                        </td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('barang.edit', $barang->id_barang) }}" class="btn btn-edit">
                                    Edit
                                </a>

                                <form action="{{ route('barang.destroy', $barang->id_barang) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-delete">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" style="text-align:center; padding:35px; color:#8792a5;">
                            Belum ada data barang.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

@endsection
