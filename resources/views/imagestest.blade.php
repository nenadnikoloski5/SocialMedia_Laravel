<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    

    <h1>yeet</h1>

    @foreach ($images as $image)
    <img src="{{$image->filepath}}" alt="">

    @endforeach
</body>
</html>