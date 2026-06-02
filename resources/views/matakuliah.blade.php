@extends('layouts.app')

@section('title', 'Mata Kuliah')

@section('content')
    <h1>Daftar Mata Kuliah</h1>
    <ul>
        @foreach ($matakuliah as $mk)
            <li>{{ $mk }}</li>
        @endforeach
    </ul>
@endsection
{{--
<!DOCTYPE html>
<html>

<head>
    <title>Daftar Mata Kuliah</title>
</head>

<body>
    <h1>Daftar Mata Kuliah</h1>

    <ul>
        @foreach ($matakuliah as $mk)
            <li>{{ $mk }}</li>
        @endforeach
    </ul>
</body>

</html> --}}
