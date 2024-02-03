<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data" action="{{ route('upload')}}">
        @csrf

        <label for="file">Choose a profile picture:</label>
        <input type="file" id="file" name="file" />

        <button type="submit">Soumettre</button>
    </form>
</body>
</html>
