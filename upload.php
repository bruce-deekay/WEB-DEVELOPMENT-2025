<?php ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>File Upload</h1>

    <form action="process_upload.php" method="POST" enctype = "multipart/form-data">
        <label for="file">Select File</label>
        <input type="file" name = "uploaded_file" id = "file">
        <button type="submit">Upload</button>                            
    </form>
</body>
</html>