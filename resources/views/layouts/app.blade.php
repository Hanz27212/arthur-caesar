<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
</head>

<body>

    <h1>Website Mahasiswa</h1>

    <nav>
        <a href="/">Rumah</a> |
        <a href="/tentang">Tentang</a> |
        <a href="/contact">Contact</a> |
        <a href="/biodata">Biodata</a> |
        <a href="/matakuliah">Mata Kuliah</a>
    </nav>

    <hr>

    @yield('content')

</body>

</html>
