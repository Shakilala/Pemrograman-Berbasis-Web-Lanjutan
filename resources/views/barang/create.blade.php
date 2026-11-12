
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>

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

        h2 {
            color: #1e293b;
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

        .kembali {
            color: #2563eb;
            text-decoration: none;
        }

        .error {
            color: red;
            font-size: 13px;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Tambah Data Barang</h2>

    <a href="{{ route('barang.index') }}" class="kembali">
        ← Kembali
    </a>

    @if($errors->any())
        <div class="error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('barang.store') }}" method="POST">
        @csrf

        <label>Nama Barang</label>
        <input type="text" name="nama_barang"
               value="{{ old('nama_barang') }}" required>

        <label>Kategori</label>
        <input type="text" name="kategori"
               value="{{ old('kategori') }}">

        <label>Satuan</label>
        <input type="text" name="satuan"
               value="{{ old('satuan') }}">

        <label>Harga</label>
        <input type="number" name="harga"
               value="{{ old('harga', 0) }}" min="0" required>

        <label>Stok</label>
        <input type="number" name="stok"
               value="{{ old('stok', 0) }}" min="0" required>

        <button type="submit">Simpan Barang</button>

    </form>

</div>

</body>
</html>
