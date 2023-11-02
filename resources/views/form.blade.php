<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Say Hello</title>
</head>

<body>
    <form action="/form" method="post">
        <label for="name">
            <input type="text" name="nama_pengguna">
        </label>
        <input type="submit" value="Say Hello">

        {{-- name harus _token agar bisa dibaca oleh laravel --}}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
</body>

</html>
