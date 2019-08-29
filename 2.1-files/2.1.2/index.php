<?php
$uploaddir = 'uploads';
$images = scandir($uploaddir);
$innerHTML = "";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {    
    if (isset($_GET['value'])) {
        if ($_GET['value'] !== 'false') {
            unlink($uploaddir . '/' . $_GET['value']);
            header("Location: index.php?value=false");
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <style>
        img {
            display: flex;
            width: 200px; 
            margin: 20px;
        }
    </style>    
</head>
<body>
    <form enctype="multipart/form-data" method="POST">
        <input name="userfile" type="file">
        <button type="submit" value="Отправить файл">Отправить</button>
    </form>
</body>
</html>

<?php

foreach ($images as $key => $value) {
    if ($key >= 2) {
        $innerHTML .= "<br><a href='index.php?value=$value'>X</a>\n<span>$value</span>\n<img src='$uploaddir/$value'>";
    };
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_FILES['userfile']['error'] === UPLOAD_ERR_OK) {
        $uploadfile = $uploaddir . '/' . basename($_FILES['userfile']['name']);

        if (in_array(exif_imagetype($_FILES['userfile']['tmp_name']), array(1, 2, 3))) {
            move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);

            $images = scandir($uploaddir);
            $innerHTML = "";

            foreach ($images as $key => $value) {
                if ($key >= 2) {
                    $innerHTML .= "<br><a href='index.php?value=$value'>X</a>\n<span>$value</span>\n<img src='$uploaddir/$value'>";
                };
            }

        } else {
            echo 'На сайт разрешено загружать только изображения в формате JPG, PNG, GIF';
        }
    }
}

echo $innerHTML;

?>