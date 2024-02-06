<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post" enctype="multipart/form-data">
    <input type="password" name="pass"><br><br>
    <input type="file" name="file" id="file"><br><br>
    <input type="submit" name="submit">
    <?php
    if(isset($_POST['pass'])){
        if($_POST['pass'] == 'alamakotaadmin'){
            $filename = $_FILES['file']['name'];
            $location = "./".$filename;
            if($filename) {
                $serverPath = 'http://localhost/'.$filename;
                if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
                    echo "Plik został przesłany poprawnie<br>";
                } else {
                    echo "Plik nie został przesłany poprawnie<br>";
                    die;
                }
            }
        }
    }
    ?>
</form>
</body>
</html>