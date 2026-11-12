
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            padding: 30px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 7px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background: #2563eb;
            color: white;
            padding: 11px 18px;
            border: none;
            border-radius: 5px;
            margin-top: 20px;
            cursor: pointer;
        }

        a {
            color: #2563eb;
            text-decoration: none;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Edit Data Barang</h2>

    <a href="{{ route('barang.index') }}">← Kembali</a>

    @if($errors->any())
        <div class="error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('barang.update', $barang->id_barang) }}"
          method="POST">

        @csrf
        @method('PUT')

        <label>Kode Barang</label>
        <input type="text" value="{{ $barang->kode_barang }}" readonly>

        <label>Nama Barang</label>
        <input type="text" name="nama_barang"
               value="{{ old('nama_barang', $barang->nama_barang) }}" required>

        <label>Kategori</label>
        <input type="text" name="kategori"
               value="{{ old('kategori', $barang->kategori) }}">

        <label>Satuan</label>
        <input type="text" name="satuan"
               value="{{ old('satuan', $barang->satuan) }}">

        <label>Harga</label>
        <input type="number" name="harga"
               value="{{ old('harga', $barang->harga) }}" min="0" required>

        <label>Stok</label>
        <input type="number" name="stok"
               value="{{ old('stok', $barang->stok) }}" min="0" required>

        <button type="submit">Simpan Perubahan</button>

    </form>

</div>

</body>
</html>
