<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = htmlspecialchars($_POST['title']);
    $uploadDir = 'uploads/';
    $uploadFile = $uploadDir . basename($_FILES['photo']['name']);

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadFile)) {
        echo "<p>Datei erfolgreich hochgeladen: $uploadFile</p>";
        echo "<p>Titel: $title</p>";

    } else {
        echo "<p>Fehler beim Hochladen der Datei.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foto-Upload</title>
</head>
<body>
    <h1>Foto hochladen</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="title">Titel:</label>
        <input type="text" id="title" name="title" required>
        <br><br>
        <label for="photo">Foto ausw<C3><A4>hlen:</label>
        <input type="file" id="photo" name="photo" accept="image/*" required>
        <br><br>
        <button type="submit">Hochladen</button>
    </form>
</body>
</html>
