<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixel Cryptographer</title>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-color: #212529;
            --primary-color: #92cd41;
            --secondary-color: #f7d51d;
            --text-color: #ffffff;
            --border-color: #ffffff;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
            font-family: 'Press Start 2P', cursive;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            line-height: 1.6;
            image-rendering: pixelated;
        }

        .container {
            width: 90%;
            max-width: 600px;
            padding: 30px;
            background-color: #313539;
            /* Border Pixel Style */
            border: 4px solid var(--border-color);
            box-shadow:
                -8px 0 0 0 var(--bg-color),
                8px 0 0 0 var(--bg-color),
                0 -8px 0 0 var(--bg-color),
                0 8px 0 0 var(--bg-color),
                -12px 0 0 0 var(--border-color),
                12px 0 0 0 var(--border-color),
                0 -12px 0 0 var(--border-color),
                0 12px 0 0 var(--border-color);
        }

        h1 {
            font-size: 18px;
            text-align: center;
            color: var(--primary-color);
            margin-bottom: 30px;
            text-transform: uppercase;
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            display: block;
            font-size: 10px;
            margin-bottom: 10px;
            color: var(--secondary-color);
        }

        textarea,
        input,
        select {
            width: 100%;
            background: #000;
            border: 4px solid #555;
            color: var(--primary-color);
            padding: 15px;
            font-family: 'Press Start 2P', cursive;
            font-size: 12px;
            box-sizing: border-box;
            outline: none;
        }

        textarea:focus,
        input:focus {
            border-color: var(--primary-color);
        }

        button {
            width: 100%;
            padding: 15px;
            background-color: var(--primary-color);
            border: none;
            font-family: 'Press Start 2P', cursive;
            font-size: 14px;
            cursor: pointer;
            color: #000;
            box-shadow: inset -4px -4px 0px 0px #4e8306;
            margin-top: 10px;
        }

        button:active {
            box-shadow: inset 4px 4px 0px 0px #4e8306;
            transform: translateY(2px);
        }

        .result-box {
            margin-top: 30px;
            padding: 20px;
            background: #1a1d21;
            border: 4px dashed var(--secondary-color);
        }

        .result-title {
            color: var(--secondary-color);
            font-size: 10px;
            margin-bottom: 10px;
        }

        .result-text {
            word-wrap: break-word;
            font-size: 14px;
            color: #fff;
            background: transparent;
        }

        /* Scanline Effect */
        body::before {
            content: " ";
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            background: linear-gradient(rgba(18, 16, 16, 0) 50%, rgba(0, 0, 0, 0.25) 50%), linear-gradient(90deg, rgba(255, 0, 0, 0.06), rgba(0, 255, 0, 0.02), rgba(0, 0, 255, 0.06));
            z-index: 2;
            background-size: 100% 4px, 3px 100%;
            pointer-events: none;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>[ Modulo 26 Converter ]</h1>

        <form action="{{ route('converter') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>> MASUKKAN PESAN:</label>
                <textarea name="text" rows="3" placeholder="Tulis pesan..." required>{{ $oldText ?? '' }}</textarea>
            </div>

            <div style="display: flex; gap: 20px;">
                <div class="form-group" style="flex: 1;">
                    <label>> KUNCI (N):</label>
                    <input type="number" name="key" value="{{ $oldKey ?? 1 }}" min="1" max="25"
                        required>
                </div>

                <div class="form-group" style="flex: 1;">
                    <label>> OPERASI:</label>
                    <select name="action">
                        <option value="encrypt" {{ isset($oldAction) && $oldAction == 'encrypt' ? 'selected' : '' }}>
                            ENKRIPSI</option>
                        <option value="decrypt" {{ isset($oldAction) && $oldAction == 'decrypt' ? 'selected' : '' }}>
                            DEKRIPSI</option>
                    </select>
                </div>
            </div>

            <button type="submit">EKSEKUSI_</button>
        </form>

        @if (isset($result))
            <div class="result-box">
                <div class="result-title">OUTPUT_HASIL:</div>
                <div class="result-text">{{ $result }}</div>
            </div>
        @endif
    </div>

</body>

</html>
