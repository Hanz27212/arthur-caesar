<!DOCTYPE html>
<html>

<head>
    <title>Laravel Modulo 26 Converter</title>
</head>

<body>
    <h1>Converter Enkripsi & Dekripsi (Modulo 26)</h1>

    <form action="/process" method="POST">
        @csrf
        <div>
            <label>Input Teks:</label><br>
            <textarea name="text" rows="4" required>{{ $text ?? '' }}</textarea>
        </div>

        <br>

        <div>
            <label>Jumlah Pergeseran (Key):</label>
            <input type="number" name="shift" value="{{ $shift ?? 3 }}" required>
        </div>

        <br>

        <div>
            <button type="submit" name="type" value="encrypt">Enkripsi</button>
            <button type="submit" name="type" value="decrypt">Dekripsi</button>
        </div>
    </form>

    @if (isset($result))
        <hr>
        <h3>Hasil ({{ ucfirst($type) }}):</h3>
        <div style="background: #f0f0f0; padding: 10px; border: 1px solid #ccc;">
            <strong>{{ $result }}</strong>
        </div>
    @endif

</body>

</html>
