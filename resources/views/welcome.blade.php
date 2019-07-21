<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.3.0/milligram.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>

    <title>Document</title>
</head>
<body>
<textarea id="editor" name="name" rows="8" cols="40"></textarea>
<input id="filename" type="text" placeholder="input file name" >
<a class="button" id="download" href="#" download="text.md" onclick="handleDownload()">Download</a>

<script>
    var simplemde = new SimpleMDE({
        element: document.getElementById("editor")
    });
</script>
</body>
</html>